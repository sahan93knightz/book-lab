<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<!-- Title  -->
	'<title>BookLab - The Best Book Collection</title>

	<!-- Favicon  -->
	<link rel="icon" href="/client/img/core-img/favicon.png">

	<!-- Core Style CSS -->
	<link rel="stylesheet" href="/client/css/core-style.css">
	<link rel="stylesheet" href="/client/style.css">
	<style>
		input[type="number"] {
			padding: 15px;
			font-size: 14px;
			font-weight: 600;
			width: 200px;
			color: #787878;
		}

		.recommendation {
			margin: 30px 5%;
		}
	</style>

</head>

<body>

<?php include_once 'client_header.php' ?>

<!-- ##### Single Product Details Area Start ##### -->
<section class="single_product_details_area d-flex align-items-center">

	<!-- Single Product Thumb -->
	<div class="single_product_thumb clearfix">
		<div class="product_thumbnail_slides owl-carousel">
			<img src="<? echo '/uploads/' . $book->image_name ?>" alt="">
			<img src="<? echo '/uploads/' . $book->image_name ?>" alt="">
			<img src="<? echo '/uploads/' . $book->image_name ?>" alt="">
		</div>
	</div>

	<!-- Single Product Description -->
	<div class="single_product_desc clearfix">
		<span><?php echo $book->author ?></span>

		<h2><?php echo $book->title ?></h2>

		<p class="product-price"><?php echo 'Rs. ' . number_format($book->unit_price, 2, '.', ',') ?></p>
		<p class="product-desc">
			<?php echo $book->description ?>
		</p>

		<!-- Form -->
		<form class="cart-form clearfix" method="post" action="/cart">
			<!-- Select Box -->
			<div class="select-box d-flex mt-50 mb-30">
				<input type="hidden" name="bookId" value="<?php echo $book->id ?>">
				<input type="number" max="10" min="1" name="qty" value="1">
			</div>
			<!-- Cart & Favourite Box -->
			<div class="cart-fav-box d-flex align-items-center">
				<!-- Cart -->
				<button type="submit" class="btn essence-btn">Add to cart</button>
				<!-- Favourite -->
				<div class="product-favourite ml-4">
					<a href="#" class="favme fa fa-heart"></a>
				</div>
			</div>
		</form>
	</div>
</section>
<!-- ##### Single Product Details Area End ##### -->

<section class="recommendation">
	<div class="row">
		<div class="col-1"></div>
		<?php

		foreach ($books as $book) {
			echo '<div class="col-6 col-sm-3 col-lg-2">
							<div class="single-product-wrapper">
								<!-- Product Image -->
								<div class="product-img">
									<img src="/uploads/' . $book->image_name . '" alt="">
									<!-- Hover Thumb -->
									<img class="hover-img" src="/uploads/' . $book->image_name . '" alt="">

									<!-- Favourite -->
									<div class="product-favourite">
										<a href="#" class="favme fa fa-heart"></a>
									</div>
								</div>

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
</section>

<?php include_once 'client_footer.php' ?>

</body>

</html>
