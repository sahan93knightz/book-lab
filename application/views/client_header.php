<!-- ##### Header Area Start ##### -->
<header class="header_area">
	<div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
		<!-- Classy Menu -->
		<nav class="classy-navbar" id="essenceNav">
			<!-- Logo -->
			<a class="nav-brand" href="/"><h1>Book<span class="text-muted">Lab</span></h1></a>
			<!-- Navbar Toggler -->
			<div class="classy-navbar-toggler">
				<span class="navbarToggler"><span></span><span></span><span></span></span>
			</div>
			<!-- Menu -->
			<div class="classy-menu">
				<!-- close btn -->
				<div class="classycloseIcon">
					<div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
				</div>
				<!-- Nav Start -->
				<div class="classynav">
					<ul>
						<li><a href="#">Categories</a>
							<div class="megamenu">
								<?php
								$count = 0;
								foreach ($categories as $category) {
									if ($count % 5 == 0) {
										echo '<ul class="single-mega cn-col-4">';
									}
									echo '<li><a href="/category/' . $category->id . '">' . $category->category_name . '</a></li>';
									if ($count % 5 == 4) {
										echo '</ul>';
									}
									$count++;
								}
								?>
							</div>
						</li>
						<li><a href="<?php echo base_url() . 'admin' ?>">Admin</a></li>
					</ul>
				</div>
				<!-- Nav End -->
			</div>
		</nav>

		<!-- Header Meta Data -->
		<div class="header-meta d-flex clearfix justify-content-end">
			<!-- Cart Area -->
			<div class="cart-area">
				<a href="#" id="essenceCartBtn"><img src="/client/img/core-img/bag.svg" alt="">
					<span><?php echo $this->cart->total_items() ?></span></a>
			</div>
		</div>

	</div>
</header>
<!-- ##### Header Area End ##### -->

<!-- ##### Right Side Cart Area ##### -->
<div class="cart-bg-overlay"></div>

<div class="right-side-cart-area">

	<!-- Cart Button -->
	<div class="cart-button">
		<a href="#" id="rightSideCart"><img src="/client/img/core-img/bag.svg" alt="">
			<span><?php echo $this->cart->total_items() ?></span></a>
	</div>

	<div class="cart-content d-flex">

		<!-- Cart List Area -->
		<div class="cart-list">
			<?php foreach ($this->cart->contents() as $item): ?>
				<?php $cartBook = $item['options']['book'] ?>
				<!-- Single Cart Item -->
				<div class="single-cart-item">
					<a href="#" class="product-image">
						<img src="/uploads/<?php echo $cartBook->image_name ?>" class="cart-thumb" alt="">
						<!-- Cart Item Desc -->
						<div class="cart-item-desc">
							<span class="product-remove" onclick="removeItem('<?php echo $item['rowid'] ?>')"><i
									class="fa fa-close" aria-hidden="true"></i></span>
							<span class="badge"><?php echo $cartBook->author ?></span>
							<h6><?php echo $cartBook->title ?></h6>
							<p class="size">Quantity: <?php echo $item['qty'] ?></p>
							<p class="size">Unit
								Price: <?php echo 'Rs. ' . number_format($item['price'], 2, '.', ',') ?></p>
							<p class="price"><?php echo 'Rs. ' . number_format($item['subtotal'], 2, '.', ',') ?></p>
						</div>
					</a>
				</div>
			<?php endforeach; ?>
		</div>

		<!-- Cart Summary -->
		<div class="cart-amount-summary">

			<h2>Summary</h2>
			<ul class="summary-table">
				<li><span>subtotal:</span>
					<span><?php echo 'Rs. ' . number_format($this->cart->total(), 2, '.', ',') ?></span></li>
				<li><span>delivery:</span> <span>Free</span></li>
				<li><span>discount:</span> <span>0%</span></li>
				<li><span>total:</span>
					<span><?php echo 'Rs. ' . number_format($this->cart->total(), 2, '.', ',') ?></span></li>
			</ul>
			<div class="checkout-btn mt-100">
				<a href="checkout.html" class="btn essence-btn">check out</a>
			</div>
		</div>
	</div>
</div>
<!-- ##### Right Side Cart End ##### -->
