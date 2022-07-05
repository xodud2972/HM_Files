	<script type="text/javascript">
    $(function() {
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD'
        });

        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD',
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

	<script>
		$(document).ready(function() {
			$('#dataTables-example').DataTable({
				responsive: true
			});
		});
	</script>

</body>

</html>