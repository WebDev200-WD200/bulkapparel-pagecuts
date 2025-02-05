<?php

function template($filePath, $variables = array(), $print = true)
{
	$output = NULL;
	if (file_exists($filePath)) {
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
}

$filters = [
	[
		"name" => "Mens",
		"count" => 775,
		"param" => "mens",
		"selected" => false,
		"url" => "https://dev8888.bulkapparel.com/styles?sfid=mens",
		"type" => "shop-for"
	],
	[
		"name" => "Womens",
		"count" => 385,
		"param" => "womens",
		"selected" => false,
		"url" => "https://dev8888.bulkapparel.com/styles?sfid=womens",
		"type" => "shop-for"
	],
	[
		"name" => "Youth",
		"count" => 155,
		"param" => "youth",
		"selected" => false,
		"url" => "https://dev8888.bulkapparel.com/styles?sfid=youth",
		"type" => "shop-for"
	],
	[
		"name" => "Girls",
		"count" => 20,
		"param" => "girls",
		"selected" => false,
		"url" => "https://dev8888.bulkapparel.com/styles?sfid=girls",
		"type" => "shop-for"
	]
]; ?>


<div class="flex flex-column ">
	<?php
	// include('./components/new-sidebar-filter/radiobutton.php');
	?>

	<div class="side-filters">
		<div class="side-filter">
			<button class="side-filter__btn btn">
				Categories

				<span class="side-filter__arrow">
					<svg width="18" height="11" xmlns="http://www.w3.org/2000/svg">
						<path d="M2.498 10.83 9 4.344l6.502 6.488L17.5 8.833 9 .333l-8.5 8.5 1.998 1.998Z" />
					</svg>
				</span>
			</button>

			<ul class="side-filter__list">

				<?php foreach ($filters as $item) :

				?>
					<?php
					$data = [
						"isCheckbox" => false,
						"title" => $item['name'],
						"id" => $item['type'] . '_' . $item['param'],
						"name" => $item['type'],
						"count" => $item['count']
					];

					include('./components/new-sidebar-filter/new-sidebar-filter-item.php') ?>
				<?php endforeach ?>
			</ul>

			<button class="side-filter__more btn">See More</button>
		</div>

	</div>
</div>