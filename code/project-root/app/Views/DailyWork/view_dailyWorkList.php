<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.3/locale/ko.js"></script>

<main>
	<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
		<div class="container-fluid">
			<div class="page-header-content">
				<div class="row align-items-center justify-content-between pt-3">
					<div class="mb-3" style='padding-left:24px;'>
						<h1 class="page-header-title"> Home > REPORT > 업무일지통계 </h1>
					</div>
				</div>
			</div>
		</div>
	</header>
	<div class="container mt-4">
		<div class="row">
			<div class="card col-xl-12 shadow mt-4">
				<div class="card-body">
					<div class="row no-gutters">
						<div class="col-10 col-md-12">
							<div class="col-auto">



								<div id="wrapper">
									<div class="row">
										<div class="col-lg-12">
											<div class="panel panel-default">

												<div class="panel-body">
													<h3>기간선택</h3>
													<div style="vertical-align: middle; float:left; display:flex; border:none; padding-top:13px">
														<div class="input-group date" id="datetimepicker1" data-target-input="nearest">
															<div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
																<input autocomplete="off" style="background-color: #F8F8F8; text-align: center; border:1px solid #cccccc" id="date1" name="startDate" type="text" class="datetimepicker-input" data-target="#datetimepicker1" placeholder="Start Date">
															</div>
														</div>
														<img src="../../image/ic_memo.gif" >
														&nbsp~
														<div class="input-group date" id="datetimepicker2" data-target-input="nearest">
															<div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
																<input autocomplete="off" style="background-color: #F8F8F8; text-align: center; border:1px solid #cccccc" id="date2" name="endDate" type="text" class="datetimepicker-input" data-target="#datetimepicker2" placeholder="End Date">
															</div>
														</div>
														<img src="../../image/ic_memo.gif" >
													</div>
													<br><br><br><br>

													<h3>조회구분</h3>
													<div style="margin-bottom: 15px; ">
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
													<!-- 우측 검색 버튼 -->
													<button id="btnSearch" type="button" class="btn btn-info" style="width: 80px; height: 50px; float: right; margin: 15px;">검색</button>
												</div>
											</div>
										</div>
									</div>



								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>








		<!-- 조회 조건 설정 폼  -->
			<div class="row">
				<div class="card col-xl-12 shadow mt-4">
					<div class="card-body">
						<div class="row no-gutters">
							<div class="col-10 col-md-12">
								<div class="col-auto">


									<!-- 업무 일지 통계 테이블 표 -->
									<h3 style="margin-top: 25px;">업무 일지 통계</h3>
									<div style="width:100%; height:850px; overflow:auto">
										<table style="width: 100%; font-size: 12px;" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline">
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
														<a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">14</a>
													</td>
													<td style="text-align:center; background-color: #c8c8c8; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">28</a></td>
													<td style="text-align:center; background-color: #c8c8c8; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">42</a></td>
													<td style="text-align:center; background-color: #c8c8c8; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">56</a></td>
													<td style="text-align:center; background-color: #c8c8c8; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">70</a></td>
													<td style="text-align:center; background-color: #c8c8c8; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">84</a></td>
													<td style="text-align:center; background-color: #c8c8c8; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">98</a></td>
												</tr>
												<tr>
													<td style="text-align:center;">광고주관리</td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">14</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">28</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">42</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">56</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">70</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">84</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">98</a></td>
												</tr>
												<tr>
													<td style="text-align:center;">세일즈준비</td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">14</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">28</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">42</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">56</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">70</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">84</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">98</a></td>
												</tr>
												<tr>
													<td style="text-align:center;">컨택</td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">14</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">28</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">42</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">56</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">70</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">84</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">98</a></td>
												</tr>
												<tr>
													<td style="text-align:center;">가망</td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">14</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">28</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">42</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">56</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">70</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">84</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">98</a></td>
												</tr>
												<tr>
													<td style="text-align:center;">인입</td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">14</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">28</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">42</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">56</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">70</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">84</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">98</a></td>
												</tr>
												<tr>
													<td style="text-align:center;">이탈</td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">14</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">28</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">42</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">56</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">70</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">84</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">98</a></td>
												</tr>
												<tr>
													<td style="text-align:center;">기타</td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">14</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">28</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">42</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">56</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">70</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">84</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">98</a></td>
												</tr>
												<tr>
													<td rowspan="8" style="text-align:center; vertical-align:middle">광고사업3본부</td>
													<td rowspan="8" style="text-align:center; vertical-align:middle">마케팅팀</td>
													<td rowspan="8" style="text-align:center; vertical-align:middle">엄태영</td>
													<td style="text-align:center; background-color: #c8c8c8;">합계</td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">14</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">28</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">42</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">56</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">70</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">84</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">98</a></td>
												</tr>
												<tr>
													<td style="text-align:center;">광고주관리</td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">14</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">28</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">42</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">56</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">70</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">84</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">98</a></td>
												</tr>
												<tr>
													<td style="text-align:center;">세일즈준비</td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">14</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">28</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">42</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">56</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">70</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">84</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">98</a></td>
												</tr>
												<tr>
													<td style="text-align:center;">컨택</td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">14</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">28</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">42</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">56</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">70</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">84</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">98</a></td>
												</tr>
												<tr>
													<td style="text-align:center;">가망</td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">14</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">28</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">42</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">56</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">70</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">84</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">98</a></td>
												</tr>
												<tr>
													<td style="text-align:center;">인입</td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">14</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">28</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">42</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">56</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">70</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">84</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">98</a></td>
												</tr>
												<tr>
													<td style="text-align:center;">이탈</td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">14</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">28</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">42</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">56</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">70</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">84</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">98</a></td>
												</tr>
												<tr>
													<td style="text-align:center;">기타</td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">14</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">28</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">42</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">56</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">70</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">84</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">98</a></td>
												</tr>
												<tr>
													<td rowspan="8" style="text-align:center; vertical-align:middle">광고사업3본부</td>
													<td rowspan="8" style="text-align:center; vertical-align:middle">마케팅팀</td>
													<td rowspan="8" style="text-align:center; vertical-align:middle">유정민</td>
													<td style="text-align:center; background-color: #c8c8c8;">합계</td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">14</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">28</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">42</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">56</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">70</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">84</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">98</a></td>
												</tr>
												<tr>
													<td style="text-align:center;">광고주관리</td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">14</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">28</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">42</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">56</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">70</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">84</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">98</a></td>
												</tr>
												<tr>
													<td style="text-align:center;">세일즈준비</td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">14</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">28</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">42</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">56</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">70</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">84</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">98</a></td>
												</tr>
												<tr>
													<td style="text-align:center;">컨택</td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">14</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">28</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">42</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">56</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">70</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">84</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">98</a></td>
												</tr>
												<tr>
													<td style="text-align:center;">가망</td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">14</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">28</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">42</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">56</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">70</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">84</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">98</a></td>
												</tr>
												<tr>
													<td style="text-align:center;">인입</td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">14</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">28</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">42</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">56</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">70</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">84</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">98</a></td>
												</tr>
												<tr>
													<td style="text-align:center;">이탈</td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">14</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">28</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">42</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">56</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">70</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">84</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">98</a></td>
												</tr>
												<tr>
													<td style="text-align:center;">기타</td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">14</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">28</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">42</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">56</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">70</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">84</a></td>
													<td style="text-align:center; text-decoration: underline;"><a href="javascript:openWindowPop('./popup_dailyWorkList', 'popup');">98</a></td>
												</tr>
											</tbody>
										</table>
									</div> <!-- 업무일지통계끝 -->
								</div> <!-- col-auto -->
							</div> <!-- col-10 col-md-12 -->
						</div> <!-- row no-gutters -->
					</div> <!-- card-body -->
				</div> <!-- card col-xl-12 shadow mt-4 -->
			</div> <!-- row -->
	</div>
</main>



<!-- datepicker 스크립트영역 -->
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


	function openWindowPop(url, name) {
		var options = 'top=10, left=10, width=1200, height=800, status=no, menubar=no, toolbar=no, resizable=no, location=no';
		window.open(url, name, options);
	}
</script>