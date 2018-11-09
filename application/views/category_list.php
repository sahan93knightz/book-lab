<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<!-- Title  -->
	<title>Essence - Fashion Ecommerce Template</title>

	<!-- Favicon  -->
	<link rel="icon" href="/client/img/core-img/favicon.png">

	<!-- Core Style CSS -->
	<link rel="stylesheet" href="/client/css/core-style.css">
	<link rel="stylesheet" href="/client/style.css">
	<style>
		.page-item.active .page-link {
			color: #fff !important;
		}
	</style>

</head>

<body>

<?php include_once 'client_header.php' ?>

<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(/client/img/bg-img/breadcumb.jpg);">
	<div class="container h-100">
		<div class="row h-100 align-items-center">
			<div class="col-12">
				<div class="page-title text-center">
					<h2><?php echo $selectedCategory->category_name ?></h2>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Shop Grid Area Start ##### -->
<section class="shop_grid_area section-padding-80">
	<div class="container">
		<div class="row">

			<div class="col-12">
				<div class="shop_grid_product_area">
					<div class="row">
						<div class="col-12">
							<div class="product-topbar d-flex align-items-center justify-content-between">
								<!-- Total Products -->
								<div class="total-products">
									<p><span><?php echo $books_count ?></span> book(s) found</p>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<?php

						foreach ($books as $book) {
							echo '<div class="col-12 col-sm-6 col-lg-4">
							<div class="single-product-wrapper">
								<!-- Product Image -->
								<a href="/book/' . $book->id . '"><div class="product-img">
									<img src="/uploads/' . $book->image_name . '" alt="">
									<!-- Hover Thumb -->
									<img class="hover-img" src="/uploads/' . $book->image_name . '" alt="">

									<!-- Favourite -->
									<div class="product-favourite">
										<a href="#" class="favme fa fa-heart"></a>
									</div>
								</div></a>

								<!-- Product Description -->
								<div class="product-description">
									<span>' . $book->author . '</span>
									<a href="/book/' . $book->id . '">
										<h6>' . $book->title . '</h6>
									</a>
									<p class="product-price">Rs. ' . number_format($book->unit_price, 2, '.', ',') . '</p>
								</div>
							</div>
						</div>';
						}
						?>
					</div>
				</div>
				<!-- Pagination -->


				<nav aria-label="navigation">
					<ul class="pagination mt-50 mb-70">
						<?php echo $pagination_links; ?>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</section>
<!-- ##### Shop Grid Area End ##### -->

<?php include_once 'client_footer.php' ?>

</body>

</html>
