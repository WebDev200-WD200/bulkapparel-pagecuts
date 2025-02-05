<div class="promo-grid">
	<?php
	$promos = [
		[
			'discount' => '5% Off',
			'code' => '995JP',
			'expiry' => '2025-06-17',
			'image' => 'https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-EstrNiULIkRBHl8k4qko2hqiRlfXMM.png',
			'button_text' => 'Use Code: 995JP',
			'href' => 'https://google.com'
		],
		[
			'discount' => '$5 Off',
			'code' => '5OFF2025',
			'expiry' => '2025-06-17',
			'image' => 'https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-EstrNiULIkRBHl8k4qko2hqiRlfXMM.png',
			'button_text' => 'Use Code: 5OFF2025',
			'href' => 'https://google.com'
		],
		[
			'discount' => 'Save $10',
			'code' => 'Save10NOW',
			'expiry' => '2025-06-17',
			'image' => 'https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-EstrNiULIkRBHl8k4qko2hqiRlfXMM.png',
			'button_text' => 'Use Code: Save10NOW',
						'href' => 'https://google.com'
		],
		[
			'discount' => '5% Off Any Order',
			'code' => '',
			'expiry' => '2025-06-17',
			'image' => 'https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-EstrNiULIkRBHl8k4qko2hqiRlfXMM.png',
			'button_text' => 'Shop Now',
						'href' => 'https://google.com'
		],
		[
			'discount' => 'On Sale & Clearance',
			'code' => '995JP',
			'expiry' => '2025-06-17',
			'image' => 'https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-EstrNiULIkRBHl8k4qko2hqiRlfXMM.png',
			'button_text' => 'Use Code: 995JP',
						'href' => 'https://google.com'
		],
		[
			'discount' => 'Free Shipping on $100 purchase',
			'code' => '',
			'expiry' => '2025-06-17',
			'image' => 'https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-EstrNiULIkRBHl8k4qko2hqiRlfXMM.png',
			'button_text' => 'Add to Cart Now!',
						'href' => 'https://google.com'
		],
		[
			'discount' => 'FREE Fast SHIPPING starting only at $79',
			'code' => '',
			'expiry' => '2025-06-17',
			'image' => 'https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-EstrNiULIkRBHl8k4qko2hqiRlfXMM.png',
			'button_text' => 'Shop Now',
						'href' => 'https://google.com'
		],
		[
			'discount' => '5% Off Any Order',
			'code' => '',
			'expiry' => '2025-06-17',
			'image' => 'https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-EstrNiULIkRBHl8k4qko2hqiRlfXMM.png',
			'button_text' => 'Shop Now',
						'href' => 'https://google.com'
		]
	];

	// foreach ($promos as $promo) {
	// 	echo '<div class="promo-card">';
	// 	echo '<div class="promo-image" style="background-image: url(' . $promo['image'] . ')">';
	// 	echo '<div class="promo-content">';
	// 	echo '<h2>' . $promo['discount'] . '</h2>';
	// 	echo '<p>exp: ' . $promo['expiry'] . '</p>';
	// 	echo '<button>' . $promo['button_text'] . '</button>';
	// 	echo '</div>';
	// 	echo '</div>';
	// 	echo '</div>';
	// }
	?>
<?php foreach($promos as $promo): ?>
<div class="promo-card">
	<div class="promo-image" style="background-image: url(<?= $promo['image'] ?>)">
		<div class="promo-content">
			<h2><?= $promo['discount'] ?></h2>
			<p>exp: <?= $promo['expiry'] ?></p>
			<a href="<?=$promo['href']?>"><?= $promo['button_text'] ?></a>
		</div>
	</div>
</div>	
<?php endforeach ?>
</div>