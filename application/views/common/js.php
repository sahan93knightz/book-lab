<?php
/**
 * Created by IntelliJ IDEA.
 * User: sahan
 * Date: 10/17/18
 * Time: 4:06 PM
 */
?>


<!-- Jquery Core Js -->
<script src="/admin_resources/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="/admin_resources/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="/admin_resources/plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="/admin_resources/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="/admin_resources/plugins/node-waves/waves.js"></script>

<!-- Bootstrap Notify Plugin Js -->
<script src="/admin_resources/plugins/bootstrap-notify/bootstrap-notify.js"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="/admin_resources/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="/admin_resources/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="/admin_resources/plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Input Mask Plugin Js -->
<script src="/admin_resources/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

<!-- Chart JS-->
<script src="/admin_resources/plugins/chartjs/Chart.bundle.min.js"></script>

<!-- Custom Js -->
<script src="/admin_resources/js/admin.js"></script>

<script>
	$(document).ready(function () {
		var pathNameParts = document.location.pathname.split('/');
		var item = pathNameParts[pathNameParts.length - 1];
		$('#' + item + '_menu').addClass('active');
	})
</script>
