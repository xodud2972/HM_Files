<style>
	#firstTable{ text-align: center; };
</style>

<main>
	<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
		<div class="container-fluid">
			<div class="page-header-content">
				<div class="row align-items-center justify-content-between pt-3">
					<div class="mb-3" style='padding-left:24px;'>
						<h1 class="page-header-title"> Home > REPORT > 일일업무일지 </h1>
					</div>
				</div>
			</div>
		</div>
	</header>

  <!-- 조회 조건 설정 폼  -->
  <div class="container mt-4">
    <div class="row">
      <div class="card col-xl-12 shadow mt-4">
        <div class="card-body">
          <div class="row no-gutters">
            <div class="col-10 col-md-12">
                <div class="col-auto">
					
<!--
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<!-- 1. 관리자 코멘트 테이블  
							<h2>관리자 코멘트</h2>
							<table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="commentTable" style="font-size: 13px;">
								<thead>
									<tr>
										<th style="text-align:center">관리자명</th>
										<th style="text-align:center">내용</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>유정민 PM님</td>
										<td>RMS 접속이 안됩니다. 로 12행시 해보겠습니다.</td>
									</tr>
									<tr>
										<td>김민주 CM님</td>
										<td>저는 얼박사요</td>
									</tr>
									<tr>
										<td>신현준 PM님</td>
										<td>레몬에이드요</td>
									</tr>
								</tbody>
							</table>
-->


							<!-- 2. 일일 업무일지 테이블 -->
							<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover" id="firstTable">
								<a href="javascript:openWindowPop('./popup_dailyWork', 'popup');"><button id="insertBtn" class="btn btn-info">가망 광고주 등록</button></a>
								<br><br>
								<h2>일일 업무일지</h2>
								<thead>
									<tr>
										<th style="text-align:center">시간</th>
										<th style="text-align:center">업무구분</th>
										<th style="text-align:center">광고주명</th>
										<th style="text-align:center">내용 / 소요시간 (내용과 소요시간 사이에 '/를 꼭 입력해주세요)</th>
										<th style="text-align:center">삭제</th>
									</tr>
								</thead>

								<tbody >
									<tr>
										<td style="text-align:center">
											<input type="text" value="09:45" name="time" size="15" style="width:100%; border: 0; text-align:center;">
										</td>
										<td style="text-align:center">
											<select class="form-select" aria-label="Default select example">
												<option value="1">광고주 관리</option>
											</select>
										</td>
										<td style="text-align:center">
											<input type="text" value="" name="adName" size="15" style="width:100%; border: 0; text-align:center;">
										</td>
										<td style="text-align:center">
											<input type="text" value="광고주 DB수집 / 30분" id="content" name="content" size="15" style="width:100%; border: 0; text-align:center;">
										</td>
										<td style="text-align:center">
											<button class="btn btn-info" id="delBtn" name="delBtn">삭제</button>
										</td>
									</tr>

									<tr>
										<td style="text-align:center">
											<input type="text" value="09:50" name="time" size="15" style="width:100%; border: 0; text-align:center;">
										</td>
										<td style="text-align:center">
											<select class="form-select" aria-label="Default select example">
												<option value="2">인입</option>
											</select>
										</td>
										<td style="text-align:center">
											<input type="text" value="신세계" name="adName" size="15" style="width:100%; border: 0; text-align:center;">
										</td>
										<td style="text-align:center">
											<input type="text" value="11번가 매체 확장 제안 / 30분" name="content" size="15" style="width:100%; border: 0; text-align:center;">
										</td>
										<td style="text-align:center">
											<button class="btn btn-info" id="delBtn" name="delBtn">삭제</button>
										</td>
									</tr>

									<tr>
										<td style="text-align:center">
											<input type="text" value="10:15" name="time" size="15" style="width:100%; border: 0; text-align:center;">
										</td>
										<td style="text-align:center">
											<select class="form-select" aria-label="Default select example">
												<option value="3">가망</option>
											</select>
										</td>
										<td style="text-align:center">
											<input type="text" value="(가망)퍼플오션" name="adName" size="15" style="width:100%; border: 0; text-align:center;">
										</td>
										<td style="text-align:center">
											<input type="text" value="영업컨택 / 30분" name="content" size="15" style="width:100%; border: 0; text-align:center;">
										</td>
										<td style="text-align:center">
											<button class="btn btn-info" id="delBtn" name="delBtn">삭제</button>
										</td>
									</tr>

									<?php for ($idx = 0; $idx < 3; $idx++) { ?>
										<tr>
											<td style="text-align:center">
												<input type="text" name="time" size="15" style="width:100%; border: 0; text-align:center;">
											</td>
											<td style="text-align:center">
												<select class="form-select" aria-label="Default select example">
													<option selected>업무구분</option>
													<option value="1">광고주 관리</option>
													<option value="2">세일즈 준비</option>
													<option value="3">컨택</option>
													<option value="4">가망</option>
													<option value="5">인입</option>
													<option value="6">이탈</option>
													<option value="7">기타</option>
												</select>
											</td>
											<td style="text-align:center">
												<input type="text" name="adName" size="15" style="width:100%; border: 0; text-align:center;">
											</td>
											<td style="text-align:center">
												<input type="text" name="content" size="15" style="width:100%; border: 0; text-align:center;">
											</td>
											<td style="text-align:center">
												<button class="btn btn-info" id="delBtn" name="delBtn">삭제</button>
											</td>
										</tr>
									<?php } ?>

								</tbody>
							</table>

							<!-- 행 추가 버튼 -->
							<div style="text-align:center; margin-bottom: 20px;">
								<button id="trAddBtn" class="fa fa-plus" style="height: 30px; width: 30px;" onclick="addRow();"></button>
							</div>

							<!-- 저장 버튼 -->
							<div style="text-align:center">
								<button id="saveBtn" class="btn btn-info">저장</button>
							</div>           
                </div>                
              </div>              
            </div>
          </div>
        </div>        
      </div>
    </div>


  <!-- 조회 조건 설정 폼  -->

  <div class="container mt-4">
    <div class="row">
      <div class="card col-xl-12 shadow mt-4">
        <div class="card-body">
          <div class="row no-gutters">
            <div class="col-10 col-md-12">
                <div class="col-auto">
					<div class="well" style="background-color: white;">
						<table style="width: 100%; font-size: 13px;" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="dataTables-example">
							<thead>
								<tr>
									<th style="text-align:center">일자</th>
									<th style="text-align:center">업무일지 건수(광고주 관리, 세일즈 준비, 컨택, 가망, 인입, 이탈, 기타)</th>
								</tr>
							</thead>
							<tbody>
								<?php for ($idx = 0; $idx < 100; $idx++) { ?>
									<tr>
										<td align="center">2021.07.15</td>
										<td align="center"><a href="./dailyWorkList">총 <?= $idx ?>건</a> (3/4/2/1/2/2/2)</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
                </div>                
              </div>              
            </div>
          </div>
        </div>        
      </div>
    </div>
	
</main>





	<!-- jQuery -->
	<script src="/bootstrap/vendor/jquery/jquery.min.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="/bootstrap/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!-- Metis Menu Plugin JavaScript -->
	<script src="/bootstrap/vendor/metisMenu/metisMenu.min.js"></script>
	<!-- DataTables JavaScript -->
	<script src="/bootstrap/vendor/datatables/js/jquery.dataTables.min.js"></script>
	<script src="/bootstrap/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
	<script src="/bootstrap/vendor/datatables-responsive/dataTables.responsive.js"></script>
	<!-- Custom Theme JavaScript -->
	<script src="/bootstrap/dist/js/sb-admin-2.js"></script>

	<script>
		$(document).ready(function() {
			$('#dataTables-example').DataTable({
				responsive: true
			});
		});

		$("#firstTable").on("click", "#delBtn", function() {
			$(this).closest("tr").remove();
		});

		function addRow() {

			let mytable = document.getElementById('firstTable'); //행을 추가할 테이블
			row = mytable.insertRow(mytable.rows.length); //추가할 행

			cell1 = row.insertCell(0); //실제 행 추가 여기서의 숫자는 컬럼 수
			cell2 = row.insertCell(1);
			cell3 = row.insertCell(2);
			cell4 = row.insertCell(3);
			cell5 = row.insertCell(4);

			cell1.innerHTML = '<input type="text" id="time" name="time" size="15" style="width:100%; border: 0; text-align:center;">'; //추가한 행에 원하는  요소추가
			cell2.innerHTML = '<select class="form-select" aria-label="Default select example"><option>업무구분</option><option value="1">광고주 관리</option><option value="2">세일즈 준비</option><option value="3">컨택</option><option value="4">가망</option><option value="5">인입</option><option value="6">이탈</option><option value="7">기타</option></select>';
			cell3.innerHTML = '<input type="text" id="adName" name="adName" size="15" style="width:100%; border: 0;">';
			cell4.innerHTML = '<input type="text" id="content" name="content" size="15" style="width:100%; border: 0; text-align:center;">';
			cell5.innerHTML = '<button class="btn btn-info" id="delBtn" name="delBtn">삭제</button>';
		}

		$("#saveBtn").on("click", function() {
			alert('저장 버튼');
			location.reload();
		});

	function openWindowPop(url, name){
		var options = 'top=10, left=10, width=1200, height=900, status=no, menubar=no, toolbar=no, resizable=no, location=no';
		window.open(url, name, options);
	}
	</script>
	
