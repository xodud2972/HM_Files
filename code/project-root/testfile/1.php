<? php
$highestRow = $activesheet -> getHighestRow();             
$highestColumnAlpa = $activesheet -> getHighestColumn();    
$highestColumn = $activesheet -> getHighestColumn();   // 변환되는 col



$k = 1;
for($row = 1; $row <= $highestRow; $row++) {
	$rowData = $activesheet -> rangeToArray("A" . $row . ":" . $highestColumnAlpa . $row, NULL, TRUE, FALSE);
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
	else if($highestColumn == 'AA') { $highestColumn = 27;}
	else if($highestColumn == 'AB') { $highestColumn = 28;}
	else if($highestColumn == 'AC') { $highestColumn = 29;}
	else if($highestColumn == 'AD') { $highestColumn = 30;}
	else if($highestColumn == 'AE') { $highestColumn = 31;}
	else if($highestColumn == 'AF') { $highestColumn = 32;}
	else if($highestColumn == 'AG') { $highestColumn = 33;}
	else if($highestColumn == 'AH') { $highestColumn = 34;}
	else if($highestColumn == 'AI') { $highestColumn = 35;}
	else if($highestColumn == 'AJ') { $highestColumn = 36;}
	else if($highestColumn == 'AK') { $highestColumn = 37;}
	else if($highestColumn == 'AL') { $highestColumn = 38;}
	else if($highestColumn == 'AM') { $highestColumn = 39;}
	else if($highestColumn == 'AN') { $highestColumn = 40;}
	else if($highestColumn == 'AO') { $highestColumn = 41;}
	else if($highestColumn == 'AP') { $highestColumn = 42;}
	else if($highestColumn == 'AQ') { $highestColumn = 43;}
	else if($highestColumn == 'AR') { $highestColumn = 44;}
	else if($highestColumn == 'AS') { $highestColumn = 45;}
	else if($highestColumn == 'AT') { $highestColumn = 46;}
	else if($highestColumn == 'AU') { $highestColumn = 47;}
	else if($highestColumn == 'AV') { $highestColumn = 48;}
	else if($highestColumn == 'AW') { $highestColumn = 49;}
	else if($highestColumn == 'AX') { $highestColumn = 50;}
	else if($highestColumn == 'AY') { $highestColumn = 51;}
	else if($highestColumn == 'AZ') { $highestColumn = 52;}
	else if($highestColumn == 'BA') { $highestColumn = 53;}
	else if($highestColumn == 'BB') { $highestColumn = 54;}
	else if($highestColumn == 'BC') { $highestColumn = 55;}
	else if($highestColumn == 'BD') { $highestColumn = 56;}
	else if($highestColumn == 'BE') { $highestColumn = 57;}
	else if($highestColumn == 'BF') { $highestColumn = 58;}
	else if($highestColumn == 'BG') { $highestColumn = 59;}
	else if($highestColumn == 'BH') { $highestColumn = 60;}
	else if($highestColumn == 'BI') { $highestColumn = 61;}

	for($j = 0; $j < $highestColumn; $j++){
		 $temp[$row][$k] = $rowData[0][$j]; 
		 $k++;
	}
$alpa[] = 4;

    for( $i=0, $A='A'; $i <= $highestRow; $i++,$A++ ) {  // title 개수 많큼 반복 
        $alpa[] = $A; // AA AB 와 같은 행 배열 생성
         $lastAlpha = $A;
    }
    echo $alpa['highestRow'];