<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Reusable Dropdown Component</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300&display=swap" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="https://unpkg.com/@popperjs/core@2"></script>

	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		body {
			font-family: 'Roboto Condensed', sans-serif;
			background-color: #f5f5f5;
			padding: 20px;
		}

		.container {
			max-width: 1200px;
			margin: 0 auto;
		}

		.demo-section {
			background: white;
			border-radius: 8px;
			padding: 30px;
			margin-bottom: 30px;
			box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
		}

		.demo-section h2 {
			color: #333;
			margin-bottom: 20px;
			font-size: 24px;
			font-weight: 700;
		}

		.demo-grid {
			display: grid;
			grid-template-columns: 1fr 1fr;
			gap: 30px;
			margin-bottom: 30px;
		}

		.demo-item {
			border: 2px dashed #e0e0e0;
			padding: 20px;
			border-radius: 8px;
			background: #fafafa;
		}

		.demo-item h3 {
			color: #666;
			margin-bottom: 15px;
			font-size: 18px;
			font-weight: 600;
		}

		/* Dropdown Styles */
		.dropdown-container {
			position: relative;
			display: inline-block;
			width: 100%;
		}

		.dropdown-trigger {
			width: 100%;
			padding: 12px 16px;
			border: 2px solid #e0e0e0;
			border-radius: 6px;
			background: white;
			cursor: pointer;
			font-size: 16px;
			color: #333;
			display: flex;
			justify-content: space-between;
			align-items: center;
			transition: border-color 0.3s ease;
		}

		.dropdown-trigger:hover {
			/* border-color: #002868; */
		}

		.dropdown-trigger.dropdown-active {
			/* border-color: #002868; */
			border-bottom-left-radius: 0;
			border-bottom-right-radius: 0;
		}

		.dropdown-trigger .placeholder {
			color: #999;
		}

		.dropdown-trigger .arrow {
			transition: transform 0.3s ease;
			font-size: 14px;
			color: #666;
		}

		.dropdown-trigger .arrow svg {
			width: 16px;
			height: 16px;
			display: block;
		}

		.dropdown-trigger.dropdown-active .arrow {
			transform: rotate(180deg);
		}

		.dropdown-menu {
			position: fixed;
			background: white;
			border: 2px solid #002868;
			border-radius: 6px;
			box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
			z-index: 1000;
			max-height: 200px;
			overflow-y: auto;
			display: none;
			min-width: 200px;
		}

		.dropdown-menu.dropdown-open {
			display: block;
		}

		.dropdown-item {
			padding: 12px 16px;
			cursor: pointer;
			transition: background-color 0.2s ease;
			border-bottom: 1px solid #f0f0f0;
			font-size: 16px;
			color: #333;
		}

		.dropdown-item:last-child {
			border-bottom: none;
		}

		.dropdown-item:hover {
			background-color: #f8f9fa;
		}

		.dropdown-item.dropdown-selected {
			background-color: #002868;
			color: white;
		}

		/* Points Redemption Styles */
		.points-container {
			background: white;
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
		}

		.points-info {
			margin-bottom: 15px;
		}

		.points-info h4 {
			color: #333;
			font-size: 18px;
			font-weight: 600;
			margin-bottom: 5px;
		}

		.points-balance {
			color: #666;
			font-size: 16px;
		}

		.points-balance strong {
			color: #1e40af;
			font-weight: 700;
		}

		.points-form {
			display: flex;
			gap: 10px;
			align-items: flex-end;
		}

		.points-form .dropdown-container {
			flex: 1;
		}

		.apply-btn {
			background-color: #1e40af;
			color: white;
			border: none;
			padding: 12px 24px;
			border-radius: 6px;
			cursor: pointer;
			font-size: 16px;
			font-weight: 600;
			transition: background-color 0.3s ease;
			white-space: nowrap;
		}

		.apply-btn:hover {
			background-color: #1d4ed8;
		}

		.apply-btn:disabled {
			background-color: #9ca3af;
			cursor: not-allowed;
		}

		/* Responsive Design */
		@media (max-width: 768px) {
			.demo-grid {
				grid-template-columns: 1fr;
				gap: 20px;
			}

			.points-form {
				flex-direction: column;
				align-items: stretch;
			}

			.apply-btn {
				width: 100%;
			}
		}
	</style>
</head>

<body>
	<div class="container">
		<h1 style="text-align: center; margin-bottom: 30px; color: #333;">Reusable Dropdown Component Demo</h1>

		<!-- Demo Section 1: Basic Dropdown Items -->
		<div class="demo-section">
			<h2>Dropdown Items Component</h2>
			<div class="demo-grid">
				<div class="demo-item">
					<h3>Dropdownitems</h3>
					<?php
					// Sample data for dropdown items
					$dropdownItems = [
						['points' => 100, 'value' => 2.00],
						['points' => 100, 'value' => 2.00],
						['points' => 100, 'value' => 2.00]
					];
					?>
					<div class="dropdown-items-list">
						<?php foreach ($dropdownItems as $index => $item): ?>
							<div class="dropdown-item <?php echo $index === 1 ? 'dropdown-selected' : ''; ?>">
								<?php echo $item['points']; ?> Points - $<?php echo number_format($item['value'], 2); ?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>

				<div class="demo-item">
					<h3>Dropdown</h3>
					<?php
					// Sample data for dropdown options
					$dropdownOptions = [
						['points' => 100, 'value' => 1.00],
						['points' => 200, 'value' => 2.00],
						['points' => 300, 'value' => 3.00],
						['points' => 400, 'value' => 4.00],
						['points' => 500, 'value' => 5.00]
					];
					?>
					<div class="dropdown-container">
						<div class="dropdown-trigger" data-dropdown="dropdown1">
							<span class="selected-text">300 Points - $3.00</span>
							<span class="arrow"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M6 9l6 6 6-6" stroke="#666" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								</svg></span>
						</div>
						<div class="dropdown-menu" id="dropdown1">
							<?php foreach ($dropdownOptions as $index => $option): ?>
								<div class="dropdown-item <?php echo $index === 2 ? 'dropdown-selected' : ''; ?>"
									data-value="<?php echo $option['points']; ?>"
									data-display="<?php echo $option['points']; ?> Points - $<?php echo number_format($option['value'], 2); ?>">
									<?php echo $option['points']; ?> Points - $<?php echo number_format($option['value'], 2); ?>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Demo Section 2: Points Redemption -->
		<div class="demo-section">
			<h2>Select Component - Points Redemption</h2>
			<div class="demo-grid">
				<div class="demo-item">
					<h3>Redeem Points (Closed)</h3>
					<?php
					$userPoints = 1053;
					$pointsOptions = [
						['points' => 100, 'value' => 1.00],
						['points' => 200, 'value' => 2.00],
						['points' => 300, 'value' => 3.00],
						['points' => 400, 'value' => 4.00],
						['points' => 500, 'value' => 5.00]
					];
					?>
					<div class="points-container">
						<div class="points-info">
							<h4>You have <strong><?php echo $userPoints; ?></strong> Bulk Buck Points</h4>
						</div>
						<div class="points-form">
							<div class="dropdown-container">
								<div class="dropdown-trigger" data-dropdown="points1" data-placeholder="Select to redeem">
									<span class="placeholder">Select to redeem</span>
									<span class="arrow"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M6 9l6 6 6-6" stroke="#666" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
										</svg></span>
								</div>
								<div class="dropdown-menu" id="points1">
									<?php foreach ($pointsOptions as $option): ?>
										<div class="dropdown-item"
											data-value="<?php echo $option['points']; ?>"
											data-display="<?php echo $option['points']; ?> Points - $<?php echo number_format($option['value'], 2); ?>">
											<?php echo $option['points']; ?> Points - $<?php echo number_format($option['value'], 2); ?>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
							<button class="apply-btn" disabled>Apply</button>
						</div>
					</div>
				</div>

				<div class="demo-item">
					<h3>Redeem Points (Open)</h3>
					<div class="points-container">
						<div class="points-info">
							<h4>You have <strong><?php echo $userPoints; ?></strong> Bulk Buck Points</h4>
						</div>
						<div class="points-form">
							<div class="dropdown-container">
								<div class="dropdown-trigger dropdown-active" data-dropdown="points2" data-placeholder="Select to redeem">
									<span class="selected-text">300 Points - $3.00</span>
									<span class="arrow"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M6 9l6 6 6-6" stroke="#666" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
										</svg></span>
								</div>
								<div class="dropdown-menu dropdown-open" id="points2">
									<?php foreach ($pointsOptions as $index => $option): ?>
										<div class="dropdown-item <?php echo $index === 2 ? 'dropdown-selected' : ''; ?>"
											data-value="<?php echo $option['points']; ?>"
											data-display="<?php echo $option['points']; ?> Points - $<?php echo number_format($option['value'], 2); ?>">
											<?php echo $option['points']; ?> Points - $<?php echo number_format($option['value'], 2); ?>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
							<button class="apply-btn">Apply</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Reusable Component Examples -->
		<div class="demo-section">
			<h2>Reusable Component Examples</h2>

			<h3 style="margin-bottom: 15px; color: #333;">Custom Dropdown with PHP Data</h3>
			<?php
			// Example of how to use the reusable dropdown function
			function createReusableDropdown($id, $options, $placeholder = "Select an option", $selectedValue = null)
			{
				$selectedText = $placeholder;
				if ($selectedValue) {
					foreach ($options as $option) {
						if ($option['value'] == $selectedValue) {
							$selectedText = $option['display'];
							break;
						}
					}
				}

				echo '<div class="dropdown-container">';
				echo '<div class="dropdown-trigger" data-dropdown="' . $id . '" data-placeholder="' . htmlspecialchars($placeholder, ENT_QUOTES) . '">';
				echo '<span class="' . ($selectedValue ? 'selected-text' : 'placeholder') . '">' . $selectedText . '</span>';
				echo '<span class="arrow"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 9l6 6 6-6" stroke="#666" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>';
				echo '</div>';
				echo '<div class="dropdown-menu" id="' . $id . '">';

				foreach ($options as $option) {
					$isSelected = ($selectedValue == $option['value']) ? 'dropdown-selected' : '';
					echo '<div class="dropdown-item ' . $isSelected . '" data-value="' . $option['value'] . '" data-display="' . $option['display'] . '">';
					echo $option['display'];
					echo '</div>';
				}

				echo '</div>';
				echo '</div>';
			}

			// Example usage
			$customOptions = [
				['value' => 'small', 'display' => 'Small - $10.00'],
				['value' => 'medium', 'display' => 'Medium - $15.00'],
				['value' => 'large', 'display' => 'Large - $20.00'],
				['value' => 'xlarge', 'display' => 'X-Large - $25.00']
			];
			?>

			<div style="margin-bottom: 20px;">
				<label style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Size Selection:</label>
				<?php createReusableDropdown('size-dropdown', $customOptions, 'Choose a size', 'medium'); ?>
			</div>

			<div style="margin-bottom: 20px;">
				<label style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Color Selection:</label>
				<?php
				$colorOptions = [
					['value' => 'red', 'display' => 'Red'],
					['value' => 'blue', 'display' => 'Blue'],
					['value' => 'green', 'display' => 'Green'],
					['value' => 'yellow', 'display' => 'Yellow']
				];
				createReusableDropdown('color-dropdown', $colorOptions, 'Choose a color');
				?>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function() {
			// Store popper instances
			var popperInstances = {};

			// Dropdown functionality
			$('.dropdown-trigger').on('click', function(e) {
				e.stopPropagation();
				var dropdownId = $(this).data('dropdown');
				var $dropdown = $('#' + dropdownId);
				var $trigger = $(this);

				// Close all other dropdowns
				$('.dropdown-menu').not($dropdown).removeClass('dropdown-open');
				$('.dropdown-trigger').not($trigger).removeClass('dropdown-active');

				// Destroy other popper instances
				Object.keys(popperInstances).forEach(function(id) {
					if (id !== dropdownId && popperInstances[id]) {
						popperInstances[id].destroy();
						delete popperInstances[id];
					}
				});

				// Toggle current dropdown
				if ($dropdown.hasClass('dropdown-open')) {
					// Close dropdown
					$dropdown.removeClass('dropdown-open');
					$trigger.removeClass('dropdown-active');
					if (popperInstances[dropdownId]) {
						popperInstances[dropdownId].destroy();
						delete popperInstances[dropdownId];
					}
				} else {
					// Open dropdown
					$dropdown.addClass('dropdown-open');
					$trigger.addClass('dropdown-active');

					// Set dropdown width to match trigger width
					var triggerWidth = $trigger.outerWidth();
					$dropdown.css('width', triggerWidth + 'px');

					// Create or update popper instance
					if (popperInstances[dropdownId]) {
						popperInstances[dropdownId].destroy();
					}

					popperInstances[dropdownId] = Popper.createPopper($trigger[0], $dropdown[0], {
						placement: 'bottom-start',
						modifiers: [{
								name: 'preventOverflow',
								options: {
									boundary: 'viewport',
									padding: 8
								}
							},
							{
								name: 'flip',
								options: {
									fallbackPlacements: ['top-start', 'bottom-end', 'top-end']
								}
							},
							{
								name: 'offset',
								options: {
									offset: [0, 4]
								}
							}
						]
					});
				}
			});

			// Dropdown item selection with de	select when clicking same selected item
			$('.dropdown-item').on('click', function(e) {
				e.stopPropagation();
				var $item = $(this);
				var $dropdown = $item.closest('.dropdown-menu');
				var dropdownId = $dropdown.attr('id');
				var $trigger = $('[data-dropdown="' + dropdownId + '"]');
				var $selectedText = $trigger.find('.selected-text, .placeholder');
				var isAlreadySelected = $item.hasClass('dropdown-selected');

				if (isAlreadySelected) {
					// Deselect and reset to placeholder
					$dropdown.find('.dropdown-item').removeClass('dropdown-selected');
					$selectedText.removeClass('selected-text').addClass('placeholder').text($trigger.data('placeholder') || 'Select an option');
					var $applyBtnReset = $trigger.closest('.points-form').find('.apply-btn');
					if ($applyBtnReset.length) {
						$applyBtnReset.prop('disabled', true);
					}
				} else {
					// Update selected item
					$dropdown.find('.dropdown-item').removeClass('dropdown-selected');
					$item.addClass('dropdown-selected');

					// Update trigger text
					$selectedText.removeClass('placeholder').addClass('selected-text');
					$selectedText.text($item.data('display'));
				}

				// Close dropdown
				$dropdown.removeClass('dropdown-open');
				$trigger.removeClass('dropdown-active');

				// Destroy popper instance
				if (popperInstances[dropdownId]) {
					popperInstances[dropdownId].destroy();
					delete popperInstances[dropdownId];
				}

				// Enable/disable apply button if it exists
				var $applyBtn = $trigger.closest('.points-form').find('.apply-btn');
				if ($applyBtn.length) {
					$applyBtn.prop('disabled', !$item.hasClass('dropdown-selected'));
				}

				// Trigger custom event for external handling
				if (!isAlreadySelected) {
					// Selecting new item
					$trigger.trigger('dropdown:change', {
						value: $item.data('value'),
						display: $item.data('display')
					});
				} else {
					// Deselecting item
					$trigger.trigger('dropdown:change', {
						value: null,
						display: null
					});
				}
			});

			// Close dropdowns when clicking outside
			$(document).on('click', function(e) {
				if (!$(e.target).closest('.dropdown-container').length) {
					$('.dropdown-menu').removeClass('dropdown-open');
					$('.dropdown-trigger').removeClass('dropdown-active');

					// Destroy all popper instances
					Object.keys(popperInstances).forEach(function(id) {
						if (popperInstances[id]) {
							popperInstances[id].destroy();
							delete popperInstances[id];
						}
					});
				}
			});

			// Apply button functionality
			$('.apply-btn').on('click', function() {
				var $form = $(this).closest('.points-form');
				var $trigger = $form.find('.dropdown-trigger');
				var $selectedText = $trigger.find('.selected-text');

				if ($selectedText.length && !$selectedText.hasClass('placeholder')) {
					var selectedValue = $trigger.find('.dropdown-menu .dropdown-item.dropdown-selected').data('value');
					var selectedDisplay = $trigger.find('.dropdown-menu .dropdown-item.dropdown-selected').data('display');

					alert('Applied: ' + selectedDisplay + ' (Value: ' + selectedValue + ')');
				}
			});

			// Example of listening to dropdown changes
			$('[data-dropdown="size-dropdown"]').on('dropdown:change', function(e, data) {
				console.log('Size changed to:', data.value, data.display);
			});

			$('[data-dropdown="color-dropdown"]').on('dropdown:change', function(e, data) {
				console.log('Color changed to:', data.value, data.display);
			});

			// Redeem points dropdowns event listeners
			$('[data-dropdown="points1"]').on('dropdown:change', function(e, data) {
				console.log('Points1 changed to:', data.value, data.display);
			});

			$('[data-dropdown="points2"]').on('dropdown:change', function(e, data) {
				console.log('Points2 changed to:', data.value, data.display);
			});

			// Basic dropdown event listeners
			$('[data-dropdown="dropdown1"]').on('dropdown:change', function(e, data) {
				console.log('Dropdown1 changed to:', data.value, data.display);
			});

			// Update dropdown widths on window resize
			$(window).on('resize', function() {
				$('.dropdown-menu.dropdown-open').each(function() {
					var $dropdown = $(this);
					var dropdownId = $dropdown.attr('id');
					var $trigger = $('[data-dropdown="' + dropdownId + '"]');

					if ($trigger.length) {
						var triggerWidth = $trigger.outerWidth();
						$dropdown.css('width', triggerWidth + 'px');

						// Update popper instance if it exists
						if (popperInstances[dropdownId]) {
							popperInstances[dropdownId].update();
						}
					}
				});
			});

			// Cleanup popper instances on page unload
			$(window).on('beforeunload', function() {
				Object.keys(popperInstances).forEach(function(id) {
					if (popperInstances[id]) {
						popperInstances[id].destroy();
					}
				});
			});
		});
	</script>
</body>

</html>