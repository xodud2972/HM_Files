<?php 
include_once('../db/db.php');
include_once('../PHPExcel_2022/PHPExcel.php');
include_once('../process/process_All.php');
$resultData = selectOne();
/**
echo '<pre>';
print_r($resultData);
echo '</pre>';
**/
// /setlocale(LC_CTYPE, "ko_KR.utf8");
$objPHPExcel = new PHPExcel(); 

$objPHPExcel = PHPExcel_IOFactory::load('../file/example.xls');

/**
$objPHPExcel->setActiveSheetIndex(0);			// 첫번째 시트 선택
$sheet = $objPHPExcel->getActiveSheet();		// 시트 지정
$highestRow = $sheet->getHighestRow();          // 마지막 행
$highestColumn = $sheet->getHighestColumn();    // 마지막 컬럼

$sheetIndex = $objPHPExcel->setActiveSheetIndex(0); // 값을 넣을 시트 활성화.

if(isset($resultData[0])){
    $sheetIndex ->setCellValue('B1', iconv('euc-kr', 'utf-8', $resultData[0]['reg_year'])) // 연 
                ->setCellValue('D1', iconv('euc-kr', 'utf-8', $resultData[0]['reg_month'])) //월
                ->setCellValue('F1', iconv('euc-kr', 'utf-8', $resultData[0]['reg_day'])) //일
                ->setCellValue('A4', $resultData[0]['car_num']) //차량번호
                ->setCellValue('K6', iconv('euc-kr', 'utf-8', $resultData[0]['total_won'])) //합계금액
                ->setCellValue('J24', iconv('euc-kr','utf-8', $resultData[0]['total_won'])); //최종합계액 하단
}
$colNum = 8;
for($i=1; $i<11; $i++){
    $sheetIndex ->setCellValue('A'.$colNum, $resultData[$i]['p_type']) //내역1
                ->setCellValue('F'.$colNum, $resultData[$i]['size']) // 규격1
                ->setCellValue('H'.$colNum, iconv('euc-kr', 'utf-8', $resultData[$i]['cnt'])) // 수량1
                ->setCellValue('I'.$colNum, iconv('euc-kr', 'utf-8', $resultData[$i]['unit_price'])) //단가 1
                ->setCellValue('J'.$colNum, iconv('euc-kr', 'utf-8', $resultData[$i]['price'])) //금액1
                ->setCellValue('L'.$colNum, iconv('euc-kr', 'utf-8', $resultData[$i]['tax'])); //세액1
    $colNum++;         
}

 */
header('Content-Disposition: attachment;fileName='.date('Ymd').'_default_data.xls');
header('Content-type: application/vnd.ms-excel;charset=EUC-KR');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0,pre-check=0');
header('Pragma: public');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); // Excel 2016 버전의 xlsx 확장자인 경우 2007로 설정

ob_end_clean();

$objWriter->save('php://output');


exit;

?>