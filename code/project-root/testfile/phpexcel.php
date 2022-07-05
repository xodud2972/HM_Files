<!-- 
	작성자 : 엄태영
	작성일 : 2022.02.23
-->
<title>파일관리>퇴사자DB다운로드</title>
<style>
    #smoothmenu1 {
        padding: 6px;
    }
</style>
<!-- Bootstrap Core CSS -->
<link href="/thema/startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- font-awesome CSS -->
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css" />
<!-- datepicker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="../lib//bootstrap-datepicker.ko.js"></script>

<body style="margin: 8px;">
    <div class="well" style="background-color:#FFFFFF; padding:0px">
        <div>파일관리 > 퇴사자DB다운로드
            <?
            $title = '퇴사자 파일 다운로드';
            $pageIndex = '7';
            @include_once $_SERVER['DOCUMENT_ROOT'] . '/tool/initBookMark.php';
            ?>
        </div><br>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td style="background-color: #EFEFEF; width:10%">
                        <h5>양식 다운로드</h5>
                    </td>
                    <td>
                        <button id="formFile" class="btn" style="background-color:#657AD3"><a style="color:white;" href="../file/retiree/exampleFile.xlsx">양식 다운로드</a></button>
                    </td>
                </tr>
                <form id="frm1" name="frm1" role="form" method="POST" action="../cls/cls.file_retiree.php" enctype="multipart/form-data">
                    <tr>
                        <td style="background-color: #EFEFEF;">
                            <h5>업로드 파일 선택</h5>
                        </td>
                        <td>
                            <input class="btn btn-default" id="file" name="file" type="file" value="" style="border: none; vertical-align: middle; padding:0px">
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: middle; background-color: #EFEFEF;">
                            <h5>기간조회</h5>
                        </td>
                        <td style="vertical-align: middle; float:left; display:flex; border:none; padding-top:13px">
                            <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                    <input autocomplete="off" style="background-color: #F8F8F8; text-align: center; border:1px solid #cccccc" id="date1" name="startDate" type="text" class="datetimepicker-input" data-target="#datetimepicker1" placeholder="시작날짜">
                                    <img src="/images/common/ic_memo.gif" border=0 align="absmiddle">
                                </div>
                            </div>
                            &nbsp&nbsp ~ &nbsp&nbsp
                            <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                    <input autocomplete="off" style="background-color: #F8F8F8; text-align: center; border:1px solid #cccccc" id="date2" name="endDate" type="text" class="datetimepicker-input" data-target="#datetimepicker2" placeholder="끝 날짜">
                                    <img src="/images/common/ic_memo.gif" border=0 align="absmiddle">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #EFEFEF;">
                            <h5>나누기</h5>
                        </td>
                        <td style="text-align:left; vertical-align: middle;">
                            <input type="text" name="divide" value="" style="border:1px solid #cccccc; background-color: #F8F8F8; width: 100px;" placeholder="ex) 3">
                        </td>
                    </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td style="background-color: #EFEFEF; width:10%">
                        <h5>다운로드</h5>
                    </td>
                    <td>
                        <input type="submit" class="btn" style="color:white; background-color:#657AD3" value="다운로드" onclick="alert('확인 버튼을 누르고 길게는 30초에서 1분까지 기다려주세요')">
                    </td>
                </tr>
            </tbody>
        </table>
        </form>
		사용 방법<br>
		1. 가장 우선적으로 양식을 다운로드 받는다<br>
		2. 다운로드 받은 양식파일에서 데이터만 변경한다.<br>
		3. 데이터만 변경된 양식파일을 업로드하여 기간 설정 및 나누기 설정 후 다운로드 한다.<br><br>
		※ 매체와 계정ID 하나라도 없을시 불정확 할 수 있음.
		<?php echo preg_replace("-", "", "123-456-789"); ?>
    </div>

</body>

<!-- datepicker script -->
<script type="text/javascript">
    $(function() {
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD',
            locale: 'ko',
        });
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD',
            locale: 'ko',
            useCurrent: true
        });
        $("#datetimepicker1").on("change.datetimepicker", function(e) {
            $('#datetimepicker2').datetimepicker('minDate', e.date);

        });
        $("#datetimepicker2").on("change.datetimepicker", function(e) {
            $('#datetimepicker1').datetimepicker('maxDate', e.date);
        });
    });
</script>






<?php
$abc = 'A';
if($abc == 'A'){ $abc = 1; }
else if($abc == 'B') { $abc = 2;}
else if($abc == 'C') { $abc = 3;}
else if($abc == 'D') { $abc = 4;}
else if($abc == 'E') { $abc = 5;}
else if($abc == 'F') { $abc = 6;}
else if($abc == 'G') { $abc = 7;}
else if($abc == 'H') { $abc = 8;}
else if($abc == 'I') { $abc = 9;}
else if($abc == 'J') { $abc = 10;}
else if($abc == 'K') { $abc = 11;}
else if($abc == 'L') { $abc = 12;}
else if($abc == 'M') { $abc = 13;}
else if($abc == 'N') { $abc = 14;}
else if($abc == 'O') { $abc = 15;}
else if($abc == 'P') { $abc = 16;}
else if($abc == 'Q') { $abc = 17;}
else if($abc == 'R') { $abc = 18;}
else if($abc == 'S') { $abc = 19;}
else if($abc == 'T') { $abc = 20;}
else if($abc == 'U') { $abc = 21;}
else if($abc == 'V') { $abc = 22;}
else if($abc == 'W') { $abc = 23;}
else if($abc == 'X') { $abc = 24;}
else if($abc == 'Y') { $abc = 25;}
else if($abc == 'Z') { $abc = 26;}
?>