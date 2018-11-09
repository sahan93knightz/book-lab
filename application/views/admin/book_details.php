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
			<h2>Book Details</h2>

		</div>

		<div class="row clearfix">
			<div class="card">
				<div class="header bg-blue">
					<h2>
						<?php echo $book->title ?>
						<small>by <?php echo $book->author ?></small>
					</h2>
				</div>
				<div class="body">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<a href="javascript:void(0)" class="thumbnail">
								<img src="<?php echo base_url() . '/uploads/' . $book->image_name ?>" alt=""
									 class="img-responsive"></a>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
							<dl class="row">
								<dt class="col-sm-2">Description</dt>
								<dd class="col-sm-10"><?php echo $book->description ?></dd>
								<dt class="col-sm-2">Unit Price</dt>
								<dd class="col-sm-10">
									Rs. <?php echo number_format($book->unit_price, 2, '.', ',') ?></dd>
								<dt class="col-sm-2">All Time View Count</dt>
								<dd class="col-sm-10">
									<?php echo number_format($stats['all'][0]->view_count, 0, '.', ',') ?></dd>
							</dl>
							<canvas id="book-stats"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>
<?php

include_once APPPATH . "views/common/js.php";
?>
<script>
	var ctx = document.getElementById("book-stats").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: [<?php

				foreach ($stats['month'] as $stat)
					echo '\'' . $stat->my_date . '\','
				?>],
			datasets: [{
				label: '# of Views',
				data: [<?php
					foreach ($stats['month'] as $stat1)
						echo '\'' . $stat1->count . '\','
					?>],
				backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)'
				],
				borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
				],
				borderWidth: 1
			}]
		},
		options: {
			title: {
				display: true,
				text: 'View Count for The Month <?php echo date('F') ?>'
			},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});

</script>
<?php
include_once APPPATH . "views/common/footer.php";

?>
