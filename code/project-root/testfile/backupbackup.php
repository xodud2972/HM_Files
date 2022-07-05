<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>AMS 업무일지통계</title>
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
	<div id="wrapper">
		<div id="wrapper">
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							Home -> Work Desk -> 업무일지통계
						</div>
						<div class="panel-body">


							<h3>기간선택</h3>
							<div>
								<span class='input-group date' id='datetimepicker1' style="width: 150px; margin: 15px; float: left;">
								<input type='text' class="form-control"/>
								<span class="input-group-addon" >
									<span class="glyphicon glyphicon-calendar" ></span>
								</span>
							</span>
							<span class='input-group date' id='datetimepicker2' style="width: 150px; margin: 15px; float: left;">
								<input type='text' class="form-control" />
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</span>
							</div>
							<br><br><br>


							<h3 >조회구분</h3>
							<div style="margin-bottom: 15px;">
								<label style="margin-right: 10px;"><input type="checkbox" name="1" style="zoom: 1.5;"/> 광고주 관리</label>
								<label style="margin-right: 10px;"><input type="checkbox" name="2" style="zoom: 1.5;"/> 세일즈 준비</label>
								<label style="margin-right: 10px;"><input type="checkbox" name="3" style="zoom: 1.5;"/> 컨택</label>
								<label style="margin-right: 10px;"><input type="checkbox" name="4" style="zoom: 1.5;"/> 가망</label>
								<label style="margin-right: 10px;"><input type="checkbox" name="5" style="zoom: 1.5;"/> 인입</label>
								<label style="margin-right: 10px;"><input type="checkbox" name="6" style="zoom: 1.5;"/> 이탈</label>
								<label style="margin-right: 10px;"><input type="checkbox" name="7" style="zoom: 1.5;"/> 기타</label>
							</div>
							<span style="margin-right: 10px;">
								<select class="form-select" aria-label="Default select example" style="width: 15%; height: 25px;">
									<option selected>본부</option>
									<option value="1">광고주 관리</option>
									<option value="2">세일즈 준비</option>
								</select>
							</span>
							<span style="margin: 10px;">
								<select class="form-select" aria-label="Default select example" style="width: 15%; height: 25px;">
									<option selected>팀</option>
									<option value="1">광고주 관리</option>
								</select>
							</span> <span style="margin: 10px;">
								<select class="form-select" aria-label="Default select example" style="width: 15%; height: 25px;">
									<option selected>담당자</option>
									<option value="1">광고주 관리</option>
									<option value="2">세일즈 준비</option>
								</select>
							</span> <span style="margin: 10px;">
								<select class="form-select" aria-label="Default select example" style="width: 15%; height: 25px;">
									<option selected>광고주명</option>
									<option value="1">광고주 관리</option>
									<option value="2">세일즈 준비</option>
								</select>
							</span>

							<!-- 우측 검색 버튼 -->
							<button id="btnSearch" type="button" class="btn btn-info" style="width: 80px; height: 50px; float: right; margin: 15px;">검색</button>


							<!-- 업무 일지 통계 테이블 표 -->
							<h3 style="margin-top: 25px;">업무 일지 통계</h3>
							<div style="width:100%; height:650px; overflow:auto">
								<table width="100%" class="table  table-bordered table-hover">
									<thead>
										<tr>
											<th style="text-align:center">본부</th>
											<th style="text-align:center">팀</th>
											<th style="text-align:center">담당자</th>
											<th style="text-align:center">업무구분</th>
											<th style="text-align:center">2021-07-16(금)</th>
											<th style="text-align:center">2021-07-15(목)</th>
											<th style="text-align:center">2021-07-14(수)</th>
											<th style="text-align:center">2021-07-13(화)</th>
											<th style="text-align:center">2021-07-12(월)</th>
											<th style="text-align:center">2021-07-11(일)</th>
											<th style="text-align:center">2021-07-10(토)</th>

										</tr>
									</thead>
									<tbody>
										<tr>
											<td rowspan="8" colspan="3" style="text-align:center; background-color: #c8c8c8; vertical-align:middle">총 합계</td>
											<td style="text-align:center; background-color: #c8c8c8;">합계</td>
											<td style="text-align:center; background-color: #c8c8c8; text-decoration: underline;">
												<a href="javascript:openWindowPop('./popup1', 'popup');">14</a>
											</td>
											<td style="text-align:center; background-color: #c8c8c8; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">28</a></td>
											<td style="text-align:center; background-color: #c8c8c8; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">42</a></td>
											<td style="text-align:center; background-color: #c8c8c8; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">56</a></td>
											<td style="text-align:center; background-color: #c8c8c8; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">70</a></td>
											<td style="text-align:center; background-color: #c8c8c8; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">84</a></td>
											<td style="text-align:center; background-color: #c8c8c8; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">98</a></td>
										</tr>
										<tr>
											<td style="text-align:center;">광고주관리</td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">14</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">28</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">42</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">56</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">70</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">84</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">98</a></td>
										</tr>
										<tr>
											<td style="text-align:center;">세일즈준비</td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">14</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">28</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">42</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">56</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">70</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">84</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">98</a></td>
										</tr>
										<tr>
											<td style="text-align:center;">컨택</td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">14</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">28</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">42</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">56</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">70</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">84</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">98</a></td>
										</tr>
										<tr>
											<td style="text-align:center;">가망</td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">14</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">28</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">42</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">56</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">70</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">84</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">98</a></td>
										</tr>
										<tr>
											<td style="text-align:center;">인입</td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">14</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">28</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">42</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">56</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">70</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">84</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">98</a></td>
										</tr>
										<tr>
											<td style="text-align:center;">이탈</td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">14</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">28</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">42</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">56</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">70</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">84</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">98</a></td>
										</tr>
										<tr>
											<td style="text-align:center;">기타</td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">14</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">28</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">42</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">56</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">70</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">84</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">98</a></td>
										</tr>
										<tr>
											<td rowspan="8" style="text-align:center; vertical-align:middle">광고사업3본부</td>
											<td rowspan="8" style="text-align:center; vertical-align:middle">마케팅팀</td>
											<td rowspan="8" style="text-align:center; vertical-align:middle">엄태영</td>
											<td style="text-align:center; background-color: #c8c8c8;">합계</td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">14</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">28</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">42</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">56</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">70</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">84</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">98</a></td>
										</tr>
										<tr>
											<td style="text-align:center;">광고주관리</td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">14</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">28</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">42</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">56</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">70</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">84</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">98</a></td>
										</tr>
										<tr>
											<td style="text-align:center;">세일즈준비</td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">14</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">28</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">42</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">56</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">70</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">84</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">98</a></td>
										</tr>
										<tr>
											<td style="text-align:center;">컨택</td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">14</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">28</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">42</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">56</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">70</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">84</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">98</a></td>
										</tr>
										<tr>
											<td style="text-align:center;">가망</td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">14</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">28</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">42</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">56</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">70</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">84</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">98</a></td>
										</tr>
										<tr>
											<td style="text-align:center;">인입</td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">14</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">28</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">42</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">56</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">70</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">84</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">98</a></td>
										</tr>
										<tr>
											<td style="text-align:center;">이탈</td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">14</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">28</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">42</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">56</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">70</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">84</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">98</a></td>
										</tr>
										<tr>
											<td style="text-align:center;">기타</td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">14</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">28</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">42</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">56</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">70</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">84</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">98</a></td>
										</tr>
										<tr>
											<td rowspan="8" style="text-align:center; vertical-align:middle">광고사업3본부</td>
											<td rowspan="8" style="text-align:center; vertical-align:middle">마케팅팀</td>
											<td rowspan="8" style="text-align:center; vertical-align:middle">유정민</td>
											<td style="text-align:center; background-color: #c8c8c8;">합계</td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">14</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">28</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">42</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">56</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">70</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">84</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">98</a></td>
										</tr>
										<tr>
											<td style="text-align:center;">광고주관리</td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">14</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">28</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">42</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">56</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">70</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">84</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">98</a></td>
										</tr>
										<tr>
											<td style="text-align:center;">세일즈준비</td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">14</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">28</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">42</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">56</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">70</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">84</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">98</a></td>
										</tr>
										<tr>
											<td style="text-align:center;">컨택</td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">14</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">28</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">42</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">56</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">70</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">84</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">98</a></td>
										</tr>
										<tr>
											<td style="text-align:center;">가망</td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">14</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">28</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">42</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">56</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">70</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">84</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">98</a></td>
										</tr>
										<tr>
											<td style="text-align:center;">인입</td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">14</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">28</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">42</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">56</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">70</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">84</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">98</a></td>
										</tr>
										<tr>
											<td style="text-align:center;">이탈</td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">14</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">28</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">42</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">56</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">70</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">84</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">98</a></td>
										</tr>
										<tr>
											<td style="text-align:center;">기타</td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">14</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">28</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">42</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">56</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">70</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">84</a></td>
											<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup1', 'popup');">98</a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
</body>
<script type="text/javascript">
	$(function() {
		$('#datetimepicker1').datetimepicker({
			format: 'YYYY-MM-DD'
		});
		$('#datetimepicker2').datetimepicker({
			format: 'YYYY-MM-DD',
			useCurrent: true
		});
	});

	function openWindowPop(url, name){
    var options = 'top=10, left=10, width=1200, height=800, status=no, menubar=no, toolbar=no, resizable=no, location=no';
    window.open(url, name, options);
	}	
</script>
</html>