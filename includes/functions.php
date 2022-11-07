<?php 
define('base_url_site', 'https://300dev.bulkapparel.com/');
define('SYMBOL', '$');

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
	$newImagePaths = [
		'thumbnail-m' => 'thumbnail-m',
		'thumbnail' => 'thumbnail',
		'search' => 'search',
		'popular-items' => 'popular-items',
		'bulk-blank-shirts' => 'bulk-blank-shirts',
		'fashion-wear-m' => 'fashion-wear-m',
		'fashion-wear' => 'fashion-wear',
		'high-reso' => 'high-reso',
		'alpha-thumbnail-m' => 'alpha-colors/thumbnail-m', // 'alpha-image/thumbnail-m',
		'alpha-thumbnail' => 'alpha-colors/thumbnail', //'alpha-image/thumbnail',
		'alpha-search' => 'alpha-colors/search', //'alpha-image/search',
		'alpha-wholesale' => 'alpha-colors/popular-items', //'alpha-image/wholesale',
		'alpha-bulk-blank-shirts' => 'alpha-colors/bulk-blank-shirts', //'alpha-image/bulk-blank-shirts',
		'alpha-blank-shirts-wholesale-m' => 'alpha-colors/fashion-wear-m', 
		'alpha-blank-shirts-wholesale' => 'alpha-colors/fashion-wear', 
		'alpha-high-reso' => 'alpha-colors/high-reso',
	];
	$filename = str_replace(['Images/Color/', 'Images/Style/'], '',  $image);
	return base_url_site . 'image/' . $newImagePaths[$type] . '/' . $filename;
}