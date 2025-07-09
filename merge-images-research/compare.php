<?php

$images = json_decode(file_get_contents('merge-images-research/ci_images.json'), true);

// check duplicates on array

function findDuplicatesManual($array)
{
	$seen = [];
	$duplicates = [];

	foreach ($array as $value) {
		if (isset($seen[$value])) {
			if (!in_array($value, $duplicates)) {
				$duplicates[] = $value;
			}
		} else {
			$seen[$value] = true;
		}
	}

	return $duplicates;
}


$duplicates = findDuplicatesManual($images);

file_put_contents('merge-images-research/duplicate.json', json_encode($duplicates));
