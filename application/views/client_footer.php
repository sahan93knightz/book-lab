<!-- ##### Footer Area Start ##### -->
<footer class="footer_area clearfix">
	<div class="container">

		<div class="row mt-5">
			<div class="col-md-12 text-center">
				<p>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;<script>document.write(new Date().getFullYear());</script>
					All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by
					<a href="https://colorlib.com" target="_blank">Colorlib</a>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</p>
			</div>
		</div>

	</div>
</footer>
<!-- ##### Footer Area End ##### -->

<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src="/client/js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="/client/js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="/client/js/bootstrap.min.js"></script>
<!-- Plugins js -->
<script src="/client/js/plugins.js"></script>
<!-- Classy Nav js -->
<script src="/client/js/classy-nav.min.js"></script>
<!-- Active js -->
<script src="/client/js/active.js"></script>

<script>
	function removeItem(itemId) {
		$.ajax('/cart/' + itemId).success(function () {
			location.reload();
		})
	}
</script>
