<?php
/**
	작성자 : 엄태영
	작성일 : 2022.02.23
**/
session_start();
@include_once $_SERVER['DOCUMENT_ROOT'].'/include/db.php';
@include_once $_SERVER['DOCUMENT_ROOT'].'/include/inc.common.php';
@include_once $_SERVER['DOCUMENT_ROOT'].'/PHPExcel_2022/PHPExcel.php';

db_open();

if (isset($_POST['divide'])) {
    $divide = $_POST['divide'];
}
if (isset($_POST['startDate'])) {
    $sDate = $_POST['startDate'];
}
if (isset($_POST['endDate'])) {
    $eDate = $_POST['endDate'];
}
// 파일 업로드
if (isset($_FILES['file']['name'])) {
    $file = $_FILES['file']['name'];
    $tmpName = $_FILES['file']['tmp_name'];
    $filePath = '../file/retiree/';
    $fileName = iconv('UTF-8', 'EUC-KR', $_FILES['file']['name']);
    move_uploaded_file($tmpName, $filePath.$file);
}


// ------------- PHPExcel ----------------
ob_start(); 

$objPHPExcel = new PHPExcel(); 

if (isset($fileName)) {
    $objPHPExcel = PHPExcel_IOFactory::load('../file/retiree/'.$fileName);
}

$objPHPExcel->setActiveSheetIndex(0);			// 첫번째 시트 선택
$sheet = $objPHPExcel->getActiveSheet();		// 시트 지정
$highestRow = $sheet->getHighestRow();          // 마지막 행
$highestColumn = $sheet->getHighestColumn();    // 마지막 컬럼

$allData = array(); // 엑셀파일의 모든 데이터 저장
$colData = array(); // 엑셀 파일의 읽어들인 cs_m_id 와 m_nm를 저장.

for ($row = 2; $row <= $highestRow; $row++) {
    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE); // 시트의 모든 데이터 읽기
    $allData[$row] = $rowData[0];
    $tempList['col2'] = $allData[$row][2]; // 매체코드
    $tempList['col3'] = iconv('utf-8', 'euc-kr', $allData[$row][1]); // 광고주ID

    $colData[] = $tempList;   
}

$resultData = array(); // 쿼리 결과 데이터 저장
$cellNo = 2;
for($colIndex = 0; $colIndex < sizeof($colData); $colIndex++){
    if($colData[$colIndex]['col2'] !== ''){
		$querySelectDataList = sprintf(
		'SELECT DISTINCT
			t2.cs_num, getcomkrname(cs_type_new1)AS cs_type_new1, getcomkrname(cs_type_new2)AS cs_type_new2, 
			cs_nm, url AS url, mg_nm, mg_cell1, mg_cell2, mg_cell3,mg_tel1, mg_tel2, mg_tel3, mg_email, 
			IFNULL(round(sum(pay_price)/%d,0),0) AS pay_price, getcomkrname(t3.m_nm) as m_nm
		FROM t_customer_md t1
		INNER JOIN t_customer t2 ON t1.cs_seq = t2.cs_seq
		LEFT JOIN (
						SELECT cs_seq, SUM(pay_price)AS "pay_price", pay_date, if(m_nm="302",good_type2,m_nm) AS m_nm
						FROM t_contract 
						WHERE pay_date BETWEEN "%s" AND "%s"
						AND cs_m_id = "%s"
						AND if(m_nm="302",good_type2,m_nm) = %d
						AND del_date IS NULL
						AND sales_type IN ("1") 
						AND agree_state IN ("3")
					)t3 ON t2.cs_seq = t3.cs_seq
		WHERE cs_m_id = "%s"
		AND t1.md_seq = (SELECT MAX(md_seq) FROM t_customer_md WHERE cs_m_id="%s" AND if(m_nm="302",good_type2,m_nm) = "%s" )
		GROUP BY cs_m_id',
		$divide, $sDate, $eDate, $colData[$colIndex]['col3'], $colData[$colIndex]['col2'], $colData[$colIndex]['col3'], $colData[$colIndex]['col3'], $colData[$colIndex]['col2']);
		
        $result = que($querySelectDataList) or die(mysql_error());

		// 모든 row데이터를 인코딩
        while ($row = @mysql_fetch_assoc($result)) {
            $tempData['cs_num'] = iconv('utf-8', 'euc-kr', $row['cs_num']);
            $tempData['cs_type_new1'] = iconv('utf-8', 'euc-kr', $row['cs_type_new1']);
            $tempData['cs_type_new2'] = iconv('utf-8', 'euc-kr', $row['cs_type_new2']);
            $tempData['cs_nm'] = iconv('utf-8', 'euc-kr', $row['cs_nm']);
            $tempData['url'] = iconv('utf-8', 'euc-kr', $row['url']);
            $tempData['mg_nm'] = iconv('utf-8', 'euc-kr', $row['mg_nm']);
            $tempData['mg_cell'] = $row['mg_cell1'] .'-'. $row['mg_cell2'] .'-'. $row['mg_cell3'];
            $tempData['mg_tel'] = $row['mg_tel1'] .'-'. $row['mg_tel2'] .'-'. $row['mg_tel3'];
            $tempData['mg_email'] = iconv('utf-8', 'euc-kr', $row['mg_email']);
            $tempData['pay_price'] = iconv('utf-8', 'euc-kr', $row['pay_price']);
//			echo $tempData['cs_num'];
            $resultData[$colIndex] = $tempData;		

        }

        $sheetIndex = $objPHPExcel->setActiveSheetIndex(0); // 값을 넣을 시트 활성화.
    
        if(isset($resultData[$colIndex])){
            $sheetIndex ->setCellValue('C'.$cellNo, iconv('euc-kr', 'utf-8', $resultData[$colIndex]['cs_num']))
                        ->setCellValue('D'.$cellNo, iconv('euc-kr', 'utf-8', $resultData[$colIndex]['cs_type_new1']))
                        ->setCellValue('E'.$cellNo, iconv('euc-kr', 'utf-8', $resultData[$colIndex]['cs_type_new2']))
                        ->setCellValue('F'.$cellNo, iconv('euc-kr', 'utf-8', $resultData[$colIndex]['cs_nm']))
                        ->setCellValue('G'.$cellNo, iconv('euc-kr', 'utf-8', $resultData[$colIndex]['url']))
                        ->setCellValue('H'.$cellNo, iconv('euc-kr', 'utf-8', $resultData[$colIndex]['mg_nm']))
                        ->setCellValue('I'.$cellNo, iconv('euc-kr', 'utf-8', $resultData[$colIndex]['mg_tel']))
                        ->setCellValue('J'.$cellNo, iconv('euc-kr', 'utf-8', $resultData[$colIndex]['mg_cell']))
                        ->setCellValue('K'.$cellNo, iconv('euc-kr', 'utf-8', $resultData[$colIndex]['mg_email']))
                        ->setCellValue('L'.$cellNo, iconv('euc-kr', 'utf-8', $resultData[$colIndex]['pay_price']))
						->setCellValue('C1', iconv('euc-kr', 'utf-8', '사업자번호'))
						->setCellValue('D1', iconv('euc-kr', 'utf-8', '대카테고리'))
						->setCellValue('E1', iconv('euc-kr', 'utf-8', '소카테고리'))
						->setCellValue('F1', iconv('euc-kr', 'utf-8', '업체명'))
						->setCellValue('G1', iconv('euc-kr', 'utf-8', 'URL'))
						->setCellValue('H1', iconv('euc-kr', 'utf-8', '업체담당자명'))
						->setCellValue('I1', iconv('euc-kr', 'utf-8', '업체담당자 유선번호'))
						->setCellValue('J1', iconv('euc-kr', 'utf-8', '업체담당자 무선번호'))
						->setCellValue('K1', iconv('euc-kr', 'utf-8', '업체담당자 이메일'))
						->setCellValue('L1', iconv('euc-kr', 'utf-8', '매출평균'));


        }
        $cellNo++;
    }        
}

header('Content-Disposition: attachment;fileName='.date('Ymd').'_default_data.xlsx');
header('Content-type: application/vnd.ms-excel;charset=EUC-KR');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0,pre-check=0');
header('Pragma: public');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); // Excel 2016 버전의 xlsx 확장자인 경우 2007로 설정

ob_end_clean();

$objWriter->save('php://output');

que_close($db);

exit;
