



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
	
