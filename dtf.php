<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/modal.css">
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="css/dtf.css">
	<!-- <link rel="stylesheet" href="./css/themes/themes.min.css"> -->
	<!-- Hallooween theme -->
	<!-- <link rel="stylesheet" href="./css/themes/halloween-theme.min.css"> -->

	<!-- Thanks giving theme-->
	<!-- <link id="theme" rel="stylesheet" href="./css/themes/christmas-theme.css"> -->

	<!-- New year theme-->
	<!-- <link id="theme" rel="stylesheet" href="./css/themes/new-year.theme.css"> -->
	<!-- New year theme-->

	<!-- <link id="theme" rel="stylesheet" href="./css/themes/valentines.theme.css"> -->
	<!-- <link id="theme" rel="stylesheet" href="./css/themes/independence-day.theme.css"> -->
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300&display=swap" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="/assets/js/bootstrap-modal.js"></script>
	<script src="/assets/js/dtf.js"></script>
</head>

<?php
$accordions = [
	[
		"title" => "See Linear Foot Pricing Chart",
		"content" => "
            <table class='pricing-table'>
                <thead>
                    <tr>
                        <th>Size</th>
                        <th>Per linear foot</th>
                        <th>Total price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>22\" × 24\" (2ft)</td><td>$11.50</td><td>$23.00</td></tr>
                    <tr><td>22\" × 36\" (3ft)</td><td>$11.33</td><td>$34.00 <span class='discount'>– 1% off</span></td></tr>
                    <tr><td>22\" × 48\" (4ft)</td><td>$10.38</td><td>$41.52 <span class='discount'>– 5% off</span></td></tr>
                    <tr><td>22\" × 60\" (5ft)</td><td>$9.90</td><td>$49.50 <span class='discount'>– 14% off</span></td></tr>
                    <tr><td>22\" × 72\" (6ft)</td><td>$9.48</td><td>$56.52 <span class='discount'>– 18% off</span></td></tr>
                    <tr><td>22\" × 84\" (7ft)</td><td>$9.14</td><td>$63.98 <span class='discount'>– 20% off</span></td></tr>
                    <tr><td>22\" × 96\" (8ft)</td><td>$8.89</td><td>$71.52 <span class='discount'>– 22% off</span></td></tr>
                    <tr><td>22\" × 108\" (9ft)</td><td>$8.71</td><td>$78.39 <span class='discount'>– 24% off</span></td></tr>
                    <tr><td>22\" × 120\" (10ft)</td><td>$8.40</td><td>$84.00 <span class='discount'>– 26% off</span></td></tr>
                    <tr><td>22\" × 132\" (11ft)</td><td>$8.14</td><td>$89.54 <span class='discount'>– 29% off</span></td></tr>
                    <tr><td>22\" × 144\" (12ft)</td><td>$7.83</td><td>$93.96 <span class='discount'>– 31% off</span></td></tr>
                    <tr><td>22\" × 156\" (13ft)</td><td>$7.62</td><td>$99.06 <span class='discount'>– 33% off</span></td></tr>
                    <tr><td>22\" × 168\" (14ft)</td><td>$7.42</td><td>$103.88 <span class='discount'>– 36% off</span></td></tr>
                    <tr><td>22\" × 180\" (15ft)</td><td>$7.10</td><td>$106.50 <span class='discount'>– 38% off</span></td></tr>
                    <tr><td>22\" × 192\" (16ft)</td><td>$6.95</td><td>$111.20 <span class='discount'>– 40% off</span></td></tr>
                    <tr><td>22\" × 204\" (17ft)</td><td>$6.71</td><td>$114.07 <span class='discount'>– 42% off</span></td></tr>
                    <tr><td>22\" × 216\" (18ft)</td><td>$6.52</td><td>$117.36 <span class='discount'>– 44% off</span></td></tr>
                    <tr><td>22\" × 228\" (19ft)</td><td>$5.95</td><td>$116.47 <span class='discount'>– 46% off</span></td></tr>
                    <tr><td>22\" × 240\" (20ft)</td><td>$5.95</td><td>$119.00 <span class='discount'>– 48% off</span></td></tr>
                </tbody>
            </table>
        "
	],
	[
		"title" => "Why Choose Our DTF Transfers?",
		"content" => '
            <ul style="list-style-type: disc; padding-left: 20px; line-height: 1.6;">
                <li>Unlimited colors with stunning, vivid designs</li>
                <li>Superior hand-feel compared to traditional vinyl</li>
                <li>Ultra-fine detail reproduction for crisp, clean results</li>
                <li>No weeding required – save valuable time</li>
                <li>Works on all fabric types, including cotton, polyester, nylon, rayon, and blends</li>
                <li>No pretreatment needed for colored garments</li>
                <li>Professional-grade adhesive already applied</li>
                <li>Includes a white base for optimal color accuracy</li>
                <li>Create retail-quality apparel from home or your studio</li>
            </ul>
        '
	],
	[
		"title" => "Easy Heat Application",
		"content" => "<p>Instructions for easy heat application.</p>"
	],
	[
		"title" => "Additional Benefits",
		"content" => "<p>Details about additional benefits.</p>"
	],
	[
		"title" => "100-Day Satisfaction Guarantee",
		"content" => "<p>Information about the guarantee policy.</p>"
	]
];
?>


<body>
	<?php // include('./components/layout/header.php') 
	?>
	<main class="container mt-5">
		<div class="row">
			<div class="col-md-5">
				<div class="accordion">
					<?php foreach ($accordions as $idx => $item): ?>
						<div class="accordion-item<?php echo $idx === 0 ? ' blue-accordion' : ''; ?>">
							<div class="accordion-title"><?php echo $item['title']; ?><span class="arrow"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M5 7L9 11L13 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
									</svg></span></div>
							<div class="accordion-content"><?php echo $item['content']; ?></div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="col-md-7">
				<div class="dtf-card">
					<h2>Set 2: Set Design Size</h2>

					<div class="dtf-card__content">
						<div class="dtf-card__selection" id="shirtMockups">

						</div>

						<div class="dtf-card__colors" id="colors">

						</div>

						<div class="dtf-card__browse">
							<p>T-shirt not included. Need one? <a href="https://www.bulkapparel.com/">Browse our selection!</a></p>
						</div>

						<div class="dtf-card__sizes" id="sizes">

						</div>

						<div class="dtf-card__note">
							<p>Padding for easy cutting is added for free</p>
						</div>

						<div class="dtf-card__save-time">
							<h3>Want to save time?</h3>
							<label for="save-time">
								<input type="checkbox" id="save-time">
								<span>Pre-cut transfers ($0.30 each)</span>
							</label>
							<p>This applies to all DTF Transfers by Size orders</p>
						</div>


					</div>
				</div>
			</div>
		</div>
	</main>
	<!-- show -->
	<div class="modal modal-sizing-guide" tabindex="-1" role="dialog" id="sizingGuideModal2" style="display: none !important;" aria-hidden="false">
		<div class="modal-dialog" role="document" style="width: 1000px;">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Sleeve</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="sizing-guide">
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal modal-large-mockups" tabindex="-1" role="dialog" id="largeMockupsModal" style="display: block !important;" aria-hidden="false">
		<div class="modal-dialog" role="document" style="width: 1000px;">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="large-mockups">
						<div class="large-mockups__list">
							Hello
						</div>

						<div class="large-mockups__colors">

						</div>

					</div>
				</div>
			</div>
		</div>
	</div>


	<script>
		// show modal
		$('#sizingGuideModal').modal('show');
		$(document).ready(function() {
			$('.accordion-title').click(function() {
				var parent = $(this).parent();
				if (parent.hasClass('accordion-active')) {
					parent.removeClass('accordion-active');
				} else {
					$('.accordion-item').removeClass('accordion-active');
					parent.addClass('accordion-active');
				}
			});
		});
	</script>


	<?php include('./components/layout/footer.php') ?>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js"></script> -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.4/jspdf.plugin.autotable.min.js"></script> -->
</body>


</html>