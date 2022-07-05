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
    <div class="well" style="margin: 1%; background-color:#FFFFFF">
        <h5>파일관리 > 파일다운로드
            <?
            $title = '퇴사자 파일 다운로드';
            $pageIndex = '7';
            @include_once $_SERVER['DOCUMENT_ROOT'] . '/tool/initBookMark.php';
            ?>
        </h5>
        <div class="panel panel-default">
            <div class="panel-body" style="width:50%">
                <table width="100%" class="table table-bordered">
                    <tbody>
                        <tr>
                            <td style="text-align:center;">
                                <h5>양식 다운로드</h5>
                            </td>
                            <td>
                                <button id="formFile" class="btn btn-info"><a style="color:white;" href="../file/retiree/Form_File.xlsx">양식 다운로드</a></button>
                            </td>
                        </tr>
                        <form id="form1" role="form" method="POST">
                            <tr>
                                <td style="text-align:center;">
                                    <h5>업로드 파일 선택</h5>
                                </td>
                                <td>
                                    <input class="btn btn-default" id="file" name="file" type="file" value="" style="width: 100%; border: none; vertical-align: middle;">
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: middle; text-align:center;">
                                    <h5>기간조회</h5>
                                </td>
                                <td style="vertical-align: middle; float:left; display:flex; border:none; padding-top:13px">
                                    <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                            <input autocomplete="off" style="background-color: #F8F8F8; text-align: center; border:1px solid #cccccc" id="date1" name="startDate" type="text" class="datetimepicker-input" data-target="#datetimepicker1" placeholder="시작날짜">
                                        </div>
                                    </div>
                                    <i class="fa fa-calendar"></i>
                                    &nbsp ~ &nbsp
                                    <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                        <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                            <input autocomplete="off" style="background-color: #F8F8F8; text-align: center; border:1px solid #cccccc" id="date2" name="endDate" type="text" class="datetimepicker-input" data-target="#datetimepicker2" placeholder="끝 날짜">
                                        </div>
                                    </div>
                                    <i class="fa fa-calendar"></i>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center">
                                    <h5>나누기</h5>
                                </td>
                                <td style="text-align:left; vertical-align: middle;">
                                    <input type="text" name="divide" value="" style="border:1px solid #cccccc; background-color: #F8F8F8; width: 300px;" placeholder="ex)    3">
                                </td>
                            </tr>
                    </tbody>
                </table>
                <button id="ajaxBtn" class="btn btn-info" type="button" onclick="alert('확인 버튼을 누르고 5초 정도 기다려주세요')">다운로드</button>
                </form>
            </div>
        </div>
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

    $("#ajaxBtn").click(function() {
        var form = $('#form1')[0];
        var data = new FormData(form);
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: '../cls/cls.file_retiree.php',
            data: data,
            processData: false,
            contentType: false,
            timeout: 600000,
            success: function(data) {
                location = "../cls/cls.file_retiree.php";
            },
            error: function(e) {
                console.log("ERROR : ", e);
            }
        });
    });
</script>