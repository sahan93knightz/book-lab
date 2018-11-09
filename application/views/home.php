<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
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

</head>

<body>

<?php include_once 'client_header.php' ?>

<!-- ##### Welcome Area Start ##### -->
<section class="welcome_area bg-img background-overlay" style="background-image: url(/client/img/bg-img/bg-1.jpg);">
	<div class="container h-100">
		<div class="row h-100 align-items-center">
			<div class="col-12">
				<div class="hero-content">
					<h6>Best book collection</h6>
					<h2>Book<span class="text-muted">Lab</span></h2>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- ##### Welcome Area End ##### -->

<!-- ##### Top Catagory Area Start ##### -->
<div class="top_catagory_area section-padding-80 clearfix">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-heading text-center">
					<h2>Popular Categories</h2>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<!-- Single Catagory -->
			<?php $indexV = 2 ?>
			<?php foreach ($most_viewed_categories as $mvCategory): ?>
				<div class="col-12 col-sm-6 col-md-4">
					<div class="single_catagory_area d-flex align-items-center justify-content-center bg-img"
						 style="background-image: url(/client/img/bg-img/bg-<?php echo $indexV++ ?>.jpg);">
						<div class="catagory-content">
							<a href="/category/<?php echo $mvCategory->id ?>"><?php echo $mvCategory->category_name ?></a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<!-- ##### Top Catagory Area End ##### -->

<!-- ##### New Arrivals Area Start ##### -->
<section class="new_arrivals_area section-padding-80 clearfix">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-heading text-center">
					<h2>Popular Books</h2>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="popular-products-slides owl-carousel">

					<!-- Single Product -->
					<?php foreach ($most_viewed_books as $mvBook): ?>
						<div class="single-product-wrapper">
							<!-- Product Image -->
							<a href="<?php echo '/book/' . $mvBook->id ?>">
								<div class="product-img">
									<img src="<?php echo '/uploads/' . $mvBook->image_name ?>" alt="">
									<!-- Hover Thumb -->
									<img class="hover-img" src="<?php echo '/uploads/' . $mvBook->image_name ?>" alt="">

									<!-- Favourite -->
									<div class="product-favourite">
										<a href="#" class="favme fa fa-heart"></a>
									</div>
								</div>
							</a>

							<!-- Product Description -->
							<div class="product-description">
								<span><?php echo $mvBook->author ?></span>
								<a href="<?php echo '/book/' . $mvBook->id ?>">
									<h6><?php echo $mvBook->title ?></h6>
								</a>
								<p class="product-price">
									Rs. <?php echo number_format($mvBook->unit_price, 2, '.', ',') ?></p>
							</div>
						</div>
					<?php endforeach; ?>

				</div>
			</div>
		</div>
	</div>
</section>
<!-- ##### New Arrivals Area End ##### -->

<?php include_once 'client_footer.php' ?>

</body>

</html>
