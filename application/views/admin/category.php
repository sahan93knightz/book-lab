<?php
/**
 * Created by IntelliJ IDEA.
 * User: sahan
 * Date: 10/17/18
 * Time: 12:29 PM
 */

include_once APPPATH . "views/common/header.php";

$notification = isset($errmsg) ? $errmsg : (isset($msg) ? $msg : '');
$notification_type = isset($errmsg) ? 'danger' : 'success';
$show_notification = $notification != '';

?>

<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>Category Dashboard</h2>

		</div>

		<div class="row clearfix">
			<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>
							Create Category
						</h2>
					</div>
					<div class="body">
						<form method="post">
							<div class="row clearfix">
								<div class="col-sm-12">
									<div class="form-group form-float">
										<div class="form-line">
											<input type="text" class="form-control" name="category_name"
												   value="<?php echo $category_name ?>">
											<input type="hidden" name="category_id"
												   value="<?php echo $category_id ?>">
											<label class="form-label">Category Name</label>
										</div>
									</div>
								</div>
							</div>
							<div class="row clearfix">
								<div class="col-sm-6">
									<input type="submit" class="btn btn-primary waves-effect" value="Save">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
		</div>
		<div class="row clearfix">
			<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>
							Category List
						</h2>
					</div>
					<div class="body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover dataTable"
								   id="category-list-table">
								<thead>
								<tr>
									<th>ID</th>
									<th>Category Name</th>
									<th>Created On</th>
									<th>Actions</th>
								</tr>
								</thead>
								<tfoot>
								<tr>
									<th>ID</th>
									<th>Category Name</th>
									<th>Created On</th>
									<th>Actions</th>
								</tr>
								</tfoot>
								<tbody>
								<?php

								foreach ($categories as $category) {
									echo '<tr>
											<td>' . $category->id . '</td>
											<td>' . $category->category_name . '</td>
											<td>' . $category->created_on . '</td>
											<td class="text-center">
												<a href="/admin/category?id=' . $category->id . '" class="btn btn-xs btn-default waves-effect"><i class="material-icons">edit</i></a>
											</td>
										</tr>';
								}
								?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
		</div>

	</div>
</section>
<?php

include_once APPPATH . "views/common/js.php";

?>

<script>

	$(document).ready(function () {

		$('#category-list-table').DataTable({
			responsive: true
		});

		<? if ($show_notification) { ?>
		$.notify({
			// options
			icon: 'glyphicon glyphicon-success-sign',
			message: '<? echo $notification ?>'
		}, {
			// settings
			element: '.content',
			position: null,
			type: '<? echo $notification_type ?>',
			allow_dismiss: true,
			newest_on_top: false,
			showProgressbar: false,
			placement: {
				from: "top",
				align: "right"
			},
			z_index: 1031,
			delay: 5000,
			timer: 1000,
			url_target: '_blank',
			animate: {
				enter: 'animated fadeInDown',
				exit: 'animated fadeOutUp'
			},
			icon_type: 'class'
		});
		<? } ?>
	})
</script>

<?php
include_once APPPATH . "views/common/footer.php";

?>
