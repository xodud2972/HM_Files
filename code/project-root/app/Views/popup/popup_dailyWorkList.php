<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AMS 업무일지통계 상세</title>

    <!-- Bootstrap Core CSS -->
    <link href="/bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="/bootstrap/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS, Fonts -->
    <link href="/bootstrap/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="/bootstrap/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- jQuery -->
    <script src="/bootstrap/vendor/jquery/jquery.min.js"></script>
    <!-- bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- moment -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.3/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.3/moment-with-locales.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.3/locale/ko.js"></script>
    <!-- bootstrap datetimepicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    
</head>

<body>
    <div class="panel-body">

        <h3><b>기간선택</b></h3>
        <span class='input-group date' style="width: 150px;">
            <input id='datetimepicker1' type='text' class="form-control" />
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </span>


        <h3><b>조회구분</b></h3>
        <div style="margin-bottom: 10px; ">
            <label style="margin-right: 10px;"><input type="checkbox" name="1" style="zoom: 1.5;" /> 광고주 관리</label>
            <label style="margin-right: 10px;"><input type="checkbox" name="2" style="zoom: 1.5;" /> 세일즈 준비</label>
            <label style="margin-right: 10px;"><input type="checkbox" name="3" style="zoom: 1.5;" /> 컨택</label>
            <label style="margin-right: 10px;"><input type="checkbox" name="4" style="zoom: 1.5;" /> 가망</label>
            <label style="margin-right: 10px;"><input type="checkbox" name="5" style="zoom: 1.5;" /> 인입</label>
            <label style="margin-right: 10px;"><input type="checkbox" name="6" style="zoom: 1.5;" /> 이탈</label>
            <label style="margin-right: 10px;"><input type="checkbox" name="7" style="zoom: 1.5;" /> 기타</label>
        </div>
        <div style="vertical-align: middle; display:flex;">
            <span>
                <select class="form-select" aria-label="Default select example" style="width: 180px;">
                    <option selected>본부</option>
                    <option value="1">광고주 관리</option>
                    <option value="2">세일즈 준비</option>
                </select>
            </span>&nbsp&nbsp
            <span>
                <select class="form-select" aria-label="Default select example" style="width: 180px;">
                    <option selected>팀</option>
                    <option value="1">광고주 관리</option>
                </select>
            </span> &nbsp&nbsp
            <span>
                <select class="form-select" aria-label="Default select example" style="width: 180px;">
                    <option selected>담당자</option>
                    <option value="1">광고주 관리</option>
                    <option value="2">세일즈 준비</option>
                </select>
            </span> &nbsp&nbsp
            <span>
                <select class="form-select" aria-label="Default select example" style="width: 180px;">
                    <option selected>광고주명</option>
                    <option value="1">광고주 관리</option>
                    <option value="2">세일즈 준비</option>
                </select>
            </span>
        </div>

        <!-- 업무 일지 통계 테이블 -->
        <h3><b>업무 일지 통계</b></h3>
        <div style="width:100%; height:650px; overflow:auto">
            <table width="100%" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="firstTable">
                <thead>
                    <tr>
                        <th style="text-align:center">부문</th>
                        <th style="text-align:center"> 팀</th>
                        <th style="text-align:center">담당자</th>
                        <th style="text-align:center">시간</th>
                        <th style="text-align:center">업무구분</th>
                        <th style="text-align:center">광고주명</th>
                        <th style="text-align:center">내용 / 소요시간</th>

                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < 10; $i++) {  ?>
                        <tr>
                            <!-- <td style="text-align:center">
                                <input type="text" value="광고사업3부문" name="division1" size="15" style="width:100%; border: 0; text-align:center;">
                            </td>
                            <td style="text-align:center">
                                <input type="text" value="마케팅팀"     name="division2" size="15" style="width:100%; border: 0; text-align:center;">
                            </td>
                            <td style="text-align:center">
                                <input type="text" value="김민주"       name="em_name" size="15" style="width:100%; border: 0; text-align:center;">
                            </td>
                            <td style="text-align:center">
                                <input type="text" value="09:45"        name="time" size="15" style="width:100%; border: 0; text-align:center;">
                            </td>
                            <td style="text-align:center">
                                <input type="text" value="기타"         name="type" size="15" style="width:100%; border: 0; text-align:center;">
                            </td>
                            <td style="text-align:center">
                                <input type="text" value="-"            name="adName" size="15" style="width:100%; border: 0; text-align:center;">
                            </td>
                            <td style="text-align:center">
                                <input type="text" value="광고주DB수집 / 30분" name="content" size="15" style="width:100%; border: 0; text-align:center;">
                            </td> -->
                            <td style="text-align:center">광고사업3부문</td>
                            <td style="text-align:center">마케팅팀</td>
                            <td style="text-align:center">김민주</td>
                            <td style="text-align:center">09:45</td>
                            <td style="text-align:center">기타</td>
                            <td style="text-align:center">-</td>
                            <td style="text-align:center">광고주DB수집 / 30분</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div style="vertical-align: middle; display: flex;">
                <input type="text" value="" name="feedback" size="15" placeholder="피드백을 입력해주세요" style="width:92%; height: 35px; text-align:center; ">&nbsp;
                <button id="registBtn" type="button" class="btn btn-info" style="width: 90px; height: 35px; float: right;">등록</button>
            </div>
            
        </div>
    </div>
</body>
<script type="text/javascript">
    $(function() {
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    });
</script>

</html>