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
<style>
	div.form-control.bootstrap-select {
		margin-top: 10px;
	}

	tr {
		cursor: pointer;
	}
</style>
<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>Book Dashboard</h2>

		</div>

		<div class="row clearfix">
			<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
			<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>
							Create Book
						</h2>
					</div>
					<div class="body">
						<form method="post" enctype="multipart/form-data" id="frmBook">
							<div class="row clearfix">
								<div class="col-sm-12">
									<div class="form-group form-float">
										<div class="form-line">
											<input type="text" class="form-control" name="title"
												   value="<?php echo $title ?>">
											<input type="hidden" name="id"
												   value="<?php echo $id ?>">
											<label class="form-label">Title</label>
										</div>
									</div>
								</div>
							</div>
							<div class="row clearfix">
								<div class="col-sm-12">
									<div class="form-group form-float">
										<div class="form-line">
											<input type="text" class="form-control" name="author"
												   value="<?php echo $author ?>">
											<label class="form-label">Author</label>
										</div>
									</div>
								</div>
							</div>
							<div class="row clearfix">
								<div class="col-sm-12">
									<div class="form-group">
										<div class="form-line">
											<label class="form-label">Category</label>
											<select class="form-control show-tick"
													name="category_id">
												<option value="-1" disabled>-- Please Select --</option>
												<?php
												foreach ($categories as $category) {
													echo '<option value="' . $category->id . '">' . $category->category_name . '</option>';
												}

												?>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="row clearfix">
								<div class="col-sm-12">
									<label class="form-label">Unit Price</label>
									<div class="input-group">
                                            <span class="input-group-addon">
                                                Rs.
                                            </span>
										<div class="form-line">
											<input type="text" class="form-control" id="unit_price" name="unit_price"
												   placeholder="99.99">
										</div>
									</div>
								</div>
							</div>
							<div class="row clearfix">
								<div class="col-sm-12">
									<div class="form-group form-float">
										<div class="form-line">
											<textarea type="text" class="form-control" name="description"
													  value="<?php echo $description ?>"></textarea>
											<label class="form-label">Description</label>
										</div>
									</div>
								</div>
							</div>
							<div class="row clearfix">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
										<label class="form-label">Cover Image</label>
										<input type="file" class="form-control" name="cover_image"
											   id="cover_image_input" accept="image/*">
										<img src="https://via.placeholder.com/480x360?text=Your+Image+Goes+Here"
											 alt="YOUR IMAGE" id="cover_image_preview" width="480" height="360">
									</div>
								</div>
							</div>
							<div class="row clearfix">
								<div class="col-sm-6">
									<input type="submit" class="btn btn-primary waves-effect" value="Save" id="save">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
		</div>
		<div class="row clearfix">
			<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
			<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>
							Book List
						</h2>
					</div>
					<div class="body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover dataTable"
								   id="book-list-table">
								<thead>
								<tr>
									<th>ID</th>
									<th>Title</th>
									<th>Author</th>
									<th>Category</th>
									<th>Unit Price</th>
									<th>Created On</th>
								</tr>
								</thead>
								<tfoot>
								<tr>
									<th>ID</th>
									<th>Title</th>
									<th>Author</th>
									<th>Category</th>
									<th>Unit Price</th>
									<th>Created On</th>
								</tr>
								</tfoot>
								<tbody>
								<?php
								foreach ($books as $book) {
									echo '<tr onclick="window.location=\'' . base_url() . 'admin/book/' . $book->id . '\'">
																			<td>' . $book->id . '</td>
																			<td>' . $book->title . '</td>
																			<td>' . $book->author . '</td>
																			<td>' . $book->category_name . '</td>
																			<td>Rs. ' . number_format($book->unit_price, 2, '.', ',') . '</td>
																			<td>' . $book->created_on . '</td>
																		</tr>';
								}
								?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
		</div>

	</div>
</section>
<?php

include_once APPPATH . "views/common/js.php";

?>

<script>
	$(document).ready(function () {
		$('#book-list-table').DataTable({
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
		$('#unit_price').inputmask({mask: '9{1,4}.9{2}'})
	})

	function readURL(input) {

		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#cover_image_preview').attr('src', e.target.result);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#cover_image_input").change(function () {
		readURL(this);
	});
</script>

<?php
include_once APPPATH . "views/common/footer.php";

?>
