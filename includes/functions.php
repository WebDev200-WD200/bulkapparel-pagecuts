<?php 
define('base_url_site', 'https://dev8888.bulkapparel.com/');
define('SYMBOL', '$');

define('PRODUCT_IMAGES_CONFIG', [
	'thumbnail-m' => [
		"path"=> "thumbnail-m",
		"width" => 56,
		"height" => 70
	],
	'thumbnail' => [
		"path"=> "thumbnail",
		"width" => 80,
		"height" => 100
	],
	'search' => [
		"path"=> "search",
		"width" => 116,
		"height" => 145
	],
	'popular-items' => [
		"path"=> "popular-items",
		"width" => 200,
		"height" => 250
	],
	'bulk-blank-shirts' => [
		"path"=> "bulk-blank-shirts",
		"width" => 238,
		"height" => 297
	],
	'fashion-wear-m' => [
		"path"=> "fashion-wear-m",
		"width" => 328,
		"height" => 410
	],
	'fashion-wear' => [
		"path"=> "fashion-wear",
		"width" => 480,
		"height" => 600
	],
	'fashion-wear-lg' => [
		"path"=> "fashion-wear-lg",
		"width" => 600,
		"height" => 750
	],
	'high-reso' => [
		"path"=> "high-reso",
		"width" => 1200,
		"height" => 1500
	],
	'alpha-thumbnail-m' => [
		"path"=> "alpha-colors/thumbnail-m",
		"width" => 56,
		"height" => 70
	],
	'alpha-thumbnail' => [
		"path"=> "alpha-colors/thumbnail",
		"width" => 80,
		"height" => 100
	],
	'alpha-search' => [
		"path"=> "alpha-colors/search",
		"width" => 116,
		"height" => 145
	],
	'alpha-wholesale' => [
		"path"=> "alpha-colors/popular-items",
		"width" => 200,
		"height" => 250
	],
	'alpha-bulk-blank-shirts' => [
		"path"=> "alpha-colors/bulk-blank-shirts",
		"width" => 238,
		"height" => 297
	],
	'alpha-blank-shirts-wholesale-m' => [
		"path"=> "alpha-colors/fashion-wear-m",
		"width" => 328,
		"height" => 410
	],
	'alpha-blank-shirts-wholesale' => [
		"path"=> "alpha-colors/fashion-wear",
		"width" => 480,
		"height" => 600
	],
	'alpha-blank-shirts-wholesale-lg' => [
		"path"=> "alpha-colors/fashion-wear-lg",
		"width" => 600,
		"height" => 750
	],
	'alpha-high-reso' => [
		"path"=> "alpha-colors/high-reso",
		"width" => 1200,
		"height" => 1500
	],
]);

function formatToMoney($value, $format = true){
    return '$' . ($format ? number_format($value, 2) : $value);
}

function template($filePath, $variables = array(), $print = true)
{
    $output = NULL;
    if(file_exists($filePath)){
        // Extract the variables to a local namespace
        extract($variables);

        // Start output buffering
        ob_start();

        // Include the template file
        include $filePath;

        // End buffering and return its contents
        $output = ob_get_clean();
    }
    if ($print) {
        print $output;
    }
    return $output;

};
function newProductImagePath($image, $type = 'bulk-blank-shirts')
{
	$filename = str_replace(['Images/Color/', 'Images/Style/'], '',  $image);
	return base_url_site . 'image/' . PRODUCT_IMAGES_CONFIG[$type]['path'] . '/' . $filename;
}

function productImageSize($type = 'bulk-blank-shirts') {
	$size = PRODUCT_IMAGES_CONFIG[$type];
	return [
		"width" => $size['width'],
		"height" => $size['height']
	];
}
