<?
@session_start();

@include_once $_SERVER['DOCUMENT_ROOT']."/include/db.php";
@include_once $_SERVER['DOCUMENT_ROOT'].'/include/inc.common.php';
@include_once $_SERVER['DOCUMENT_ROOT'].'/include/inc.arrayvalues.php';
@include_once $_SERVER['DOCUMENT_ROOT'].'/function/func.sendmail.php';
@include_once $_SERVER['DOCUMENT_ROOT'].'/function/func.response.php';
db_open();



class clsWork {

//-----외근보고 인서트시작----------------------------

	

	//----매체공지.취합 히스토리 등록 시작----
	public function funcCheckForm(){

@include_once $_SERVER['DOCUMENT_ROOT'].'/PHPExcel_2022/PHPExcel.php';
		
ob_start(); 
$objPHPExcel = new PHPExcel();
$dir_path = $_SERVER['DOCUMENT_ROOT']."/data/work_project_file/";



		//require_once $_SERVER['DOCUMENT_ROOT'].'/phpExcelReader/Excel/reader.php';
		//$data = new Spreadsheet_Excel_Reader();
		//$data->setOutputEncoding('CP949');
		//$dir_path = $_SERVER['DOCUMENT_ROOT']."/data/work_project_file/";
		
		//print_R($_FILES);

		if($_FILES){		
			/*공지, 취합파일 업로드*/
			if( $_FILES['file_nm']){
				$files_upload_tmp	= $_FILES['file_nm']['tmp_name'];
				$files_upload_nm	= $_FILES['file_nm']['name'];				
				$files_upload_size	= $_FILES['file_nm']['size'];

				$file_info = pathinfo($files_upload_nm);

				$file_name_real = preg_replace( '/,/', '_', $file_info['basename']);
				$file_name_real = preg_replace( '/\s+/', '', $file_name_real);
				$file_name_real = $files_upload_nm;	
				$file_name_new	= strtotime("now").".".$file_info['extension'];
			
				if(move_uploaded_file($files_upload_tmp,$dir_path.$file_name_new)){
					$B_RETURNVAL = 1;

$objPHPExcel = PHPExcel_IOFactory::load($dir_path.$file_name_new);
$objPHPExcel -> setActiveSheetIndex(0);
$activesheet = $objPHPExcel -> getActiveSheet();
$highestRow = $activesheet -> getHighestRow();             // 마지막 행
$highestColumnAlpa = $activesheet -> getHighestColumn();    // 마지막 컬럼
$highestColumn = $activesheet -> getHighestColumn();    // 마지막 컬럼 알파벳 숫자변환

// $highestRow = 262   title을 포함한 모든 행의 갯수
// highestColumn = "X"  컬럼은 A부터 X 열까지 존재한다.
// echo count($highestColumn); = 1
$k = 1;
for($row = 1; $row <= $highestRow; $row++) {
	$rowData = $activesheet -> rangeToArray("A" . $row . ":" . $highestColumnAlpa . $row, NULL, TRUE, FALSE);
	// rowData가 한줄씩 읽어서 0번째 array 에 넣는데, 해당 배열이 0번쨰부터 '부문'이 시작하게끔 들어가서 문제가된다.
	// '부문'이 1번째부터 시작해야하고 0번째 항목은 없어야한다.
	// 그래서 1번째부터 들어가도록 바꿔주면 된다.
//	print_r($rowData);
	if($highestColumn == 'A'){ $highestColumn = 1; }
	else if($highestColumn == 'B') { $highestColumn = 2;}
	else if($highestColumn == 'C') { $highestColumn = 3;}
	else if($highestColumn == 'D') { $highestColumn = 4;}
	else if($highestColumn == 'E') { $highestColumn = 5;}
	else if($highestColumn == 'F') { $highestColumn = 6;}
	else if($highestColumn == 'G') { $highestColumn = 7;}
	else if($highestColumn == 'H') { $highestColumn = 8;}
	else if($highestColumn == 'I') { $highestColumn = 9;}
	else if($highestColumn == 'J') { $highestColumn = 10;}
	else if($highestColumn == 'K') { $highestColumn = 11;}
	else if($highestColumn == 'L') { $highestColumn = 12;}
	else if($highestColumn == 'M') { $highestColumn = 13;}
	else if($highestColumn == 'N') { $highestColumn = 14;}
	else if($highestColumn == 'O') { $highestColumn = 15;}
	else if($highestColumn == 'P') { $highestColumn = 16;}
	else if($highestColumn == 'Q') { $highestColumn = 17;}
	else if($highestColumn == 'R') { $highestColumn = 18;}
	else if($highestColumn == 'S') { $highestColumn = 19;}
	else if($highestColumn == 'T') { $highestColumn = 20;}
	else if($highestColumn == 'U') { $highestColumn = 21;}
	else if($highestColumn == 'V') { $highestColumn = 22;}
	else if($highestColumn == 'W') { $highestColumn = 23;}
	else if($highestColumn == 'X') { $highestColumn = 24;}
	else if($highestColumn == 'Y') { $highestColumn = 25;}
	else if($highestColumn == 'Z') { $highestColumn = 26;}
	for($j = 0; $j <= $highestColumn; $j++){
		 $temp[$row][$k] = $rowData[0][$j]; 
		 $k++;
	}
	// temp 번호로 인해 title이 0으로 시작한다
} 
print_r($temp);
				}else{
					$B_RETURNVAL = -1;
					exit();
				}
			}
			/*공지, 취합파일 업로드*/
			
			/*기타파일 업로드*/
			if( $_FILES['etc_file_nm']){
				$etc_files_upload_tmp	= $_FILES['etc_file_nm']['tmp_name'];
				$etc_files_upload_nm	= $_FILES['etc_file_nm']['name'];				
				$etc_files_upload_size	= $_FILES['etc_file_nm']['size'];

				$etc_file_info = pathinfo($etc_files_upload_nm);

				$etc_file_name_real = preg_replace( '/,/', '_', $etc_file_info['basename']);
				$etc_file_name_real = preg_replace( '/\s+/', '', $etc_file_name_real);
				$etc_file_name_real = $etc_files_upload_nm;
				//$etc_file_name_new	= rand().".".$etc_file_info['extension'];
				$etc_file_name_new	= strtotime("now").".".$etc_file_info['extension'];

				move_uploaded_file($etc_files_upload_tmp,$dir_path.$etc_file_name_new);
			
			/*기타파일 업로드*/	
			}
		}
		
		setlocale(LC_CTYPE, "ko_KR.eucKR");

		//t_project_history insert
		$Qry = "INSERT INTO t_project_history (
					project_nm,
					file_nm,
					file_nm_new,
					etc_file_nm,
					etc_file_nm_new,
					start_date,
					end_date,
					end_time,
					import_is,
					project_type,
					open_yn,
					project_memo,
					reg_date,
					reg_time,
					reg_emp
				) VALUES (
					'".$_POST['project_nm']."',
					'".$file_name_real."',	
					'".$file_name_new."',		
					'".$etc_file_name_real."',	
					'".$etc_file_name_new."',		
					'".$_POST['start_date']."',
					'".$_POST['end_date']."',
					'".$_POST['end_time']."',
					'".$_POST['import_is']."',
					'".$_POST['project_type']."',
					'".$_POST['open_yn']."',
					'".$_POST['project_memo']."',
					CURDATE(),
					CURTIME(),
					'".$_SESSION['s_em_seq']."')";	
		//echo $Qry;
		$Rst = que($Qry);
			
		$ph_seq = mysql_insert_id();

		
		//t_project_title_setting INSERT

		//PRINT_r($temp[1]);

		//exit();

		//1열을 제목으로 인서트
		foreach($temp[1]  as $k=>$v){
// utf-8 인것으로 확인 되었음
			$title_kr_name = $v;

			$Qry1 = "INSERT INTO t_project_title_setting (
						ph_seq,
						title,
						title_kr_name,
						open_yn,
						reg_date,
						reg_time,
						reg_emp
					) VALUES (
						'".$ph_seq."',
						'title$k',
						'$title_kr_name',
						'Y',
						CURDATE(),
						CURTIME(),
						'".$_SESSION['s_em_seq']."')";
			//echo $Qry1;
			$Rst1 = que($Qry1);

			$title_create .= "`title$k`  varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,";
			$title_value  .= "title$k,  ";					
		}
echo $title_value;		
		//추가항목 10개 만들기		
		for($i=($k+1);$i<=($k+10);$i++){
			$Qry1_3 = "INSERT INTO t_project_title_setting (
						ph_seq,
						title,
						open_yn,
						reg_date,
						reg_time,
						reg_emp
					) VALUES (
						'".$ph_seq."',
						'title$i',
						'N',
						CURDATE(),
						CURTIME(),
						'".$_SESSION['s_em_seq']."')";
			//echo $Qry3;
			$Qry1_3 = que($Qry1_3);

			$title_create .= "`title$i`  varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,";
			//$title_value  .= "title$i,  ";			
		}


		//t_project_content_(n) CREATE
		$Qry2 = "CREATE TABLE t_project_content_$ph_seq (
					`seq` int(11) NOT NULL AUTO_INCREMENT,
					`ph_seq` int(11) DEFAULT NULL,
					`pts_seq` int(11) DEFAULT NULL,
					 $title_create
					`overplus1`	char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'N' COMMENT 'Y:활성화,N:비활성화',
					`reg_date` date DEFAULT NULL,
					`reg_time` time DEFAULT NULL,
					`reg_emp` int(11) DEFAULT NULL,
					`upd_date` date DEFAULT NULL,
					`upd_time` time DEFAULT NULL,
					`upd_emp` int(11) DEFAULT NULL,
					PRIMARY KEY (`seq`))
				ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
		//echo $Qry2;
		if(que($Qry2)===TRUE){

			foreach($temp as $k=>$v){			
				foreach($v as $k1=>$v1){
					$value[$k] .= "'".$v1."',";

					//값이 날짜형태일 경우, 하루 증가된 상태로 변환되는 것을 하루 차감하여 원래 날짜로 바꿔줌
					/*
					if(strtotime($v1)){
						// it's in date format
						$timestamp = strtotime("-1 days",strtotime($v1));
						$v1 = date("Y-m-d",$timestamp);
						$value[$k] .= "'".iconv('euc-kr','utf-8',addslashes($v1))."',";
					}else{
						$value[$k] .= "'".iconv('euc-kr','utf-8',addslashes($v1))."',";
					}
					*/
	 			}
			}
			//t_project_content_(n) INSERT
			foreach($temp as $k=>$v){
				$Qry3 = "INSERT INTO t_project_content_$ph_seq (
							ph_seq,
							$title_value
							reg_date,
							reg_time,
							reg_emp
						) VALUES (
							'".$ph_seq."',
							".$value[$k+1]."
							CURDATE(),
							CURTIME(),
							'".$_SESSION['s_em_seq']."'
							)";
				que($Qry3);
			}

		}else{echo "F";}
		
	//**----------------------------------------------------------------------------------------------------------------------------

		if($Rst){
				$N_RETURNVAL = "1";
		}else{
			$N_RETURNVAL = "-1";
		}

		return $N_RETURNVAL;
 
		que_close();

	//**----------------------------------------------------------------------------------------------------------------------------
	}



	//----매체공지.취합 히스토리 수정 시작----
	public function funcUpdProjectHistory(){

		require_once $_SERVER['DOCUMENT_ROOT'].'/phpExcelReader/Excel/reader.php';
		$data = new Spreadsheet_Excel_Reader();
		$data->setOutputEncoding('CP949');
		$dir_path = $_SERVER['DOCUMENT_ROOT']."/data/work_project_file/";
		
		//print_R($_FILES);

		//print_R($_POST);

		if($_FILES){
			
			/*공지, 취합파일 업로드*/
			/*
			if( $_FILES['file_nm']){
				$files_upload_tmp	= $_FILES['file_nm']['tmp_name'];
				$files_upload_nm	= $_FILES['file_nm']['name'];				
				$files_upload_size	= $_FILES['file_nm']['size'];

				$file_info = pathinfo($files_upload_nm);

				$file_name_real = preg_replace( '/,/', '_', $file_info['basename']);
				$file_name_real = preg_replace( '/\s+/', '', $file_name_real);
				$file_name_new	= rand().".".$file_info['extension'];
			
				if(move_uploaded_file($files_upload_tmp,$dir_path.$file_name_new)){
					$B_RETURNVAL = 1;
					$data->read($dir_path.$file_name_new);
					error_reporting(E_ALL ^ E_NOTICE);

					for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {						
							//echo "\"".$data->sheets[0]['cells'][$i][$j]."\",";								
						for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
							$temp[$i][$j] = $data->sheets[0]['cells'][$i][$j];
						}
					}

				}else{
					$B_RETURNVAL = -1;
					exit();
				}
			}
			*/
			/*공지, 취합파일 업로드*/
			
			/*기타파일 업로드*/
			if( $_FILES['etc_file_nm']){
				$etc_files_upload_tmp	= $_FILES['etc_file_nm']['tmp_name'];
				$etc_files_upload_nm	= $_FILES['etc_file_nm']['name'];				
				$etc_files_upload_size	= $_FILES['etc_file_nm']['size'];

				$etc_file_info = pathinfo($etc_files_upload_nm);

				//$etc_file_name_real = preg_replace( '/,/', '_', $etc_file_info['basename']);
				//$etc_file_name_real = preg_replace( '/\s+/', '', $etc_file_name_real);
				$etc_file_name_real = $etc_files_upload_nm;
				$etc_file_name_new	= rand().".".$etc_file_info['extension'];

				move_uploaded_file($etc_files_upload_tmp,$dir_path.$etc_file_name_new);
			
			/*기타파일 업로드*/	
			}
		}




		if($file_name_real)		{$is_file_nm = "file_nm		= '".$file_name_real."', file_nm_new		= '".$file_name_new."',";}
		if($etc_file_name_real)	{$is_etc_file_nm = "etc_file_nm	= '".$etc_file_name_real."',					etc_file_nm_new	= '".$etc_file_name_new."',";}

		

		$Qry = "UPDATE t_project_history SET 
					project_nm		= '".$_POST['project_nm']."',
					$is_file_nm
					$is_etc_file_nm
					start_date		= '".$_POST['start_date']."',
					end_date		= '".$_POST['end_date']."',
					end_time		= '".$_POST['end_time']."',
					import_is		= '".$_POST['import_is']."',
					project_type	= '".$_POST['project_type']."',
					open_yn			= '".$_POST['open_yn']."',
					project_memo	= '".$_POST['project_memo']."',
					upd_date		= CURDATE(),
					upd_time		= CURTIME(),
					upd_emp			= '".$_SESSION['s_em_seq']."'
				WHERE seq='".$_POST['seq']."'";

		//echo $Qry;
		$Rst = que($Qry);
		
		if($Rst){
			$N_RETURNVAL = "1";
		}else{
			$N_RETURNVAL = "-1";
		}

		return $N_RETURNVAL;
		que_close();
	}
	//----매체공지.취합 히스토리 수정 끝----


?>