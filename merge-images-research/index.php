<?php

$products_images = json_decode(file_get_contents('merge-images-research/ci_products_images.json'), true);
$styles_images = json_decode(file_get_contents('merge-images-research/ci_styles_images.json'), true);


$products_images_array = $products_images['rows'];
$styles_images_array = $styles_images['rows'];



$images = [];


foreach ($products_images_array as $image) {
	$temp_image = [$image['colorFrontImage'], $image['colorBackImage'], $image['colorSideImage'], $image['alphaFrontImage'], $image['alphaBackImage'], $image['alphaSideImage']];

	array_merge($images, array_filter($temp_image));
}

foreach ($styles_images_array as $image) {
	if ($image['styleImage'] != '') {
		$images[] = $image['styleImage'];
	}
}


// export images array to json file
file_put_contents('merge-images-research/ci_images.json', json_encode($images));
