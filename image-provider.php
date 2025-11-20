<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Image Preview Tool</title>
	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		body {
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
			background: #f5f5f5;
			min-height: 100vh;
			padding: 20px;
		}

		.container {
			max-width: 1200px;
			margin: 0 auto;
			background: white;
			border-radius: 8px;
			box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
			overflow: hidden;
		}

		.controls {
			padding: 30px;
			background: #f8f9fa;
			border-bottom: 1px solid #e9ecef;
		}

		.dropdowns {
			display: flex;
			gap: 20px;
			margin-bottom: 20px;
		}

		.dropdown-group {
			flex: 1;
		}

		.dropdown-group label {
			display: block;
			margin-bottom: 8px;
			font-weight: 600;
			color: #495057;
		}

		.dropdown-group select {
			width: 100%;
			padding: 12px 15px;
			border: 2px solid #e9ecef;
			border-radius: 8px;
			font-size: 16px;
			background: white;
			transition: border-color 0.3s ease;
		}

		.dropdown-group select:focus {
			outline: none;
			border-color: #667eea;
			box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
		}

		.image-grid {
			padding: 30px;
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
			gap: 25px;
		}

		.image-card {
			background: white;
			border-radius: 12px;
			box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
			overflow: hidden;
			transition: transform 0.3s ease, box-shadow 0.3s ease;
		}

		.image-card:hover {
			transform: translateY(-5px);
			box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
		}

		.image-header {
			padding: 20px;
			background: #f8f9fa;
			border-bottom: 1px solid #e9ecef;
			display: flex;
			justify-content: space-between;
			align-items: flex-start;
		}

		.image-info {
			flex: 1;
		}

		.image-title {
			font-size: 1.2rem;
			font-weight: 600;
			color: #495057;
			margin-bottom: 5px;
		}

		.image-dimensions {
			color: #6c757d;
			font-size: 0.9rem;
			display: flex;
			align-items: center;
			gap: 10px;
		}

		.image-size {
			color: #6c757d;
			font-size: 0.8rem;
			font-weight: 500;
		}

		.header-actions {
			display: flex;
			gap: 8px;
		}

		.image-container {
			position: relative;
			background: #f8f9fa;
			min-height: 200px;
			display: flex;
			align-items: center;
			justify-content: center;
		}

		.image-preview {
			max-width: 100%;
			max-height: 300px;
			object-fit: contain;
			border-radius: 8px;
			box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
		}

		.image-url {
			padding: 15px 20px;
			background: #f8f9fa;
			border-top: 1px solid #e9ecef;
		}

		.url-text {
			font-family: 'Courier New', monospace;
			font-size: 0.8rem;
			color: #495057;
			word-break: break-all;
			line-height: 1.4;
		}

		.loading {
			display: none;
			color: #6c757d;
			font-style: italic;
		}

		.error {
			color: #dc3545;
			font-size: 0.9rem;
			margin-top: 5px;
		}

		.copy-btn {
			background: #667eea;
			color: white;
			border: none;
			padding: 8px;
			border-radius: 5px;
			cursor: pointer;
			font-size: 0.8rem;
			transition: background 0.3s ease;
			width: 32px;
			height: 32px;
			display: flex;
			align-items: center;
			justify-content: center;
		}

		.copy-btn:hover {
			background: #5a6fd8;
		}

		.copy-btn:active {
			transform: scale(0.95);
		}

		.copy-icon {
			width: 14px;
			height: 14px;
		}

		.accordion-toggle {
			background: #667eea;
			color: white;
			border: none;
			padding: 8px;
			border-radius: 5px;
			cursor: pointer;
			font-size: 0.8rem;
			transition: background 0.3s ease;
			width: 32px;
			height: 32px;
			display: flex;
			align-items: center;
			justify-content: center;
		}

		.accordion-toggle:hover {
			background: #5a6fd8;
		}

		.accordion-toggle:active {
			transform: scale(0.95);
		}

		.accordion-icon {
			width: 14px;
			height: 14px;
			transition: transform 0.3s ease;
		}

		.accordion-toggle.active .accordion-icon {
			transform: rotate(180deg);
		}

		.accordion-content {
			max-height: 0;
			overflow: hidden;
			transition: max-height 0.3s ease;
			border-top: 1px solid #e9ecef;
		}

		.accordion-content.active {
			max-height: 200px;
		}

		.image-preview {
			max-width: 100%;
			max-height: 300px;
			object-fit: contain;
			border-radius: 8px;
			box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
			cursor: pointer;
			transition: transform 0.2s ease;
		}

		.image-preview:hover {
			transform: scale(1.05);
		}

		@media (max-width: 768px) {
			.dropdowns {
				flex-direction: column;
			}

			.image-grid {
				grid-template-columns: 1fr;
				padding: 20px;
			}
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="controls">
			<div class="dropdowns">
				<div class="dropdown-group">
					<label for="imageSelect">Select Image:</label>
					<select id="imageSelect">
						<option value="all">All</option>
						<option value="16_fm.jpg">16_fm.jpg</option>
						<option value="16813_b_fm.jpg">16813_b_fm.jpg</option>
						<option value="16813_f_fm.jpg">16813_f_fm.jpg</option>
						<option value="16813_fm.jpg">16813_fm.jpg</option>
						<option value="g500_00.jpg">g500_00.jpg</option>
						<option value="g500_bk_00.jpg">g500_bk_00.jpg</option>
						<option value="g500_sd_00.jpg">g500_sd_00.jpg</option>
					</select>
				</div>
				<div class="dropdown-group">
					<label for="providerSelect">Select Provider:</label>
					<select id="providerSelect">
						<option value="bulkapparel">Bulkapparel.com</option>
						<option value="bunny">Bunny.net</option>
					</select>
				</div>
			</div>
		</div>

		<div class="image-grid" id="imageGrid">
			<!-- Image cards will be generated here -->
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		$(document).ready(function() {
			const imageSizes = [{
					name: 'thumbnail-m',
					width: 56,
					height: 70
				},
				{
					name: 'thumbnail',
					width: 80,
					height: 100
				},
				{
					name: 'search',
					width: 116,
					height: 145
				},
				{
					name: 'popular-items',
					width: 200,
					height: 250
				},
				{
					name: 'bulk-blank-shirts',
					width: 238,
					height: 297
				},
				{
					name: 'fashion-wear-m',
					width: 328,
					height: 410
				},
				{
					name: 'fashion-wear',
					width: 480,
					height: 600
				},
				{
					name: 'fashion-wear-lg',
					width: 600,
					height: 750
				},
				{
					name: 'high-reso',
					width: null,
					height: null
				}
			];

			const providers = {
				bulkapparel: {
					name: 'Bulkapparel.com',
					baseUrl: 'https://www.bulkapparel.com/image/',
					alphaColorsBaseUrl: 'https://www.bulkapparel.com/image/alpha-colors/'
				},
				bunny: {
					name: 'Bunny.net',
					baseUrl: 'https://bulkdevtesting.b-cdn.net/',
					transformQuery: '?width=<width>&height=<height>&quality=90'
				}
			};

			function formatFileSize(bytes) {
				if (bytes === 0) return '0 Bytes';
				const k = 1024;
				const sizes = ['Bytes', 'KB', 'MB', 'GB'];
				const i = Math.floor(Math.log(bytes) / Math.log(k));
				return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
			}

			function getFileSize(url, callback) {
				// Fetch the actual image blob to get real file size
				fetch(url)
					.then(response => {
						if (!response.ok) {
							throw new Error('Network response was not ok');
						}
						return response.blob();
					})
					.then(blob => {
						const sizeInBytes = blob.size;
						callback(formatFileSize(sizeInBytes));
					})
					.catch(error => {
						console.error('Failed to get image size:', error);
						callback('Unknown');
					});
			}

			function generateImageCards() {
				const selectedImage = $('#imageSelect').val();
				const selectedProvider = $('#providerSelect').val();

				if (!selectedImage || !selectedProvider) {
					$('#imageGrid').html('<div style="grid-column: 1/-1; text-align: center; padding: 40px; color: #6c757d;">Please select both an image and a provider to see previews.</div>');
					return;
				}

				const provider = providers[selectedProvider];
				let html = '';

				// If "All" is selected, show all images
				if (selectedImage === 'all') {
					const allImages = ['16_fm.jpg', '16813_b_fm.jpg', '16813_f_fm.jpg', '16813_fm.jpg', 'g500_00.jpg', 'g500_bk_00.jpg', 'g500_sd_00.jpg'];

					allImages.forEach((imageName, imageIndex) => {
						imageSizes.forEach((size, sizeIndex) => {
							const index = imageIndex * imageSizes.length + sizeIndex;

							// Determine the correct URL based on provider and image
							let imageUrl;
							if (selectedProvider === 'bulkapparel') {
								// Check if it's a g500 image (needs alpha-colors path)
								const isG500Image = imageName.startsWith('g500_');
								const baseUrl = isG500Image ? provider.alphaColorsBaseUrl : provider.baseUrl;
								imageUrl = baseUrl + size.name + '/' + imageName;
							} else {
								// Bunny.net provider
								imageUrl = size.name === 'high-reso' ?
									provider.baseUrl + imageName :
									provider.baseUrl + imageName + provider.transformQuery
									.replace('<width>', size.width)
									.replace('<height>', size.height);
							}

							const dimensions = size.name === 'high-reso' ?
								'Original resolution' :
								`${size.width}×${size.height}`;

							html += `
								<div class="image-card">
									<div class="image-header">
										<div class="image-info">
											<div class="image-title">${imageName} - ${size.name}</div>
											<div class="image-dimensions">
												<span>${dimensions}</span>
												<span class="image-size" id="fileSize-${index}">Loading size...</span>
											</div>
										</div>
										<div class="header-actions">
											<button class="accordion-toggle" onclick="toggleAccordion(${index})" title="Show/Hide URL">
												<svg class="accordion-icon" fill="currentColor" viewBox="0 0 20 20">
													<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
												</svg>
											</button>
											<button class="copy-btn" onclick="copyToClipboard('${imageUrl}')" title="Copy URL">
												<svg class="copy-icon" fill="currentColor" viewBox="0 0 20 20">
													<path d="M8 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"></path>
													<path d="M6 3a2 2 0 00-2 2v11a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2 3 3 0 01-3 3H9a3 3 0 01-3-3z"></path>
												</svg>
											</button>
										</div>
									</div>
									<div class="accordion-content" id="accordion-${index}">
										<div class="image-url">
											<div class="url-text">${imageUrl}</div>
										</div>
									</div>
									<div class="image-container">
										<img src="${imageUrl}" alt="${imageName} - ${size.name}" class="image-preview" 
											 onload="$(this).siblings('.loading').hide()" 
											 onerror="$(this).siblings('.error').show().text('Failed to load image')"
											 onclick="window.open('${imageUrl}', '_blank')">
										<div class="loading">Loading...</div>
										<div class="error" style="display: none;"></div>
									</div>
								</div>
							`;
						});
					});

					$('#imageGrid').html(html);

					// Get file sizes for all images
					allImages.forEach((imageName, imageIndex) => {
						imageSizes.forEach((size, sizeIndex) => {
							const index = imageIndex * imageSizes.length + sizeIndex;

							// Determine the correct URL based on provider and image
							let imageUrl;
							if (selectedProvider === 'bulkapparel') {
								// Check if it's a g500 image (needs alpha-colors path)
								const isG500Image = imageName.startsWith('g500_');
								const baseUrl = isG500Image ? provider.alphaColorsBaseUrl : provider.baseUrl;
								imageUrl = baseUrl + size.name + '/' + imageName;
							} else {
								// Bunny.net provider
								imageUrl = size.name === 'high-reso' ?
									provider.baseUrl + imageName :
									provider.baseUrl + imageName + provider.transformQuery
									.replace('<width>', size.width)
									.replace('<height>', size.height);
							}

							getFileSize(imageUrl, (fileSize) => {
								$(`#fileSize-${index}`).text(fileSize);
							});
						});
					});
				} else {
					// Single image selected
					imageSizes.forEach((size, index) => {
						// Determine the correct URL based on provider and image
						let imageUrl;
						if (selectedProvider === 'bulkapparel') {
							// Check if it's a g500 image (needs alpha-colors path)
							const isG500Image = selectedImage.startsWith('g500_');
							const baseUrl = isG500Image ? provider.alphaColorsBaseUrl : provider.baseUrl;
							imageUrl = baseUrl + size.name + '/' + selectedImage;
						} else {
							// Bunny.net provider
							imageUrl = size.name === 'high-reso' ?
								provider.baseUrl + selectedImage :
								provider.baseUrl + selectedImage + provider.transformQuery
								.replace('<width>', size.width)
								.replace('<height>', size.height);
						}

						const dimensions = size.name === 'high-reso' ?
							'Original resolution' :
							`${size.width}×${size.height}`;

						html += `
							<div class="image-card">
								<div class="image-header">
									<div class="image-info">
										<div class="image-title">${size.name}</div>
										<div class="image-dimensions">
											<span>${dimensions}</span>
											<span class="image-size" id="fileSize-${index}">Loading size...</span>
										</div>
									</div>
									<div class="header-actions">
										<button class="accordion-toggle" onclick="toggleAccordion(${index})" title="Show/Hide URL">
											<svg class="accordion-icon" fill="currentColor" viewBox="0 0 20 20">
												<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
											</svg>
										</button>
										<button class="copy-btn" onclick="copyToClipboard('${imageUrl}')" title="Copy URL">
											<svg class="copy-icon" fill="currentColor" viewBox="0 0 20 20">
												<path d="M8 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"></path>
												<path d="M6 3a2 2 0 00-2 2v11a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2 3 3 0 01-3 3H9a3 3 0 01-3-3z"></path>
											</svg>
										</button>
									</div>
								</div>
								<div class="accordion-content" id="accordion-${index}">
									<div class="image-url">
										<div class="url-text">${imageUrl}</div>
									</div>
								</div>
								<div class="image-container">
									<img src="${imageUrl}" alt="${selectedImage} - ${size.name}" class="image-preview" 
										 onload="$(this).siblings('.loading').hide()" 
										 onerror="$(this).siblings('.error').show().text('Failed to load image')"
										 onclick="window.open('${imageUrl}', '_blank')">
									<div class="loading">Loading...</div>
									<div class="error" style="display: none;"></div>
								</div>
							</div>
						`;
					});

					$('#imageGrid').html(html);

					// Get file sizes for all images
					imageSizes.forEach((size, index) => {
						// Determine the correct URL based on provider and image
						let imageUrl;
						if (selectedProvider === 'bulkapparel') {
							// Check if it's a g500 image (needs alpha-colors path)
							const isG500Image = selectedImage.startsWith('g500_');
							const baseUrl = isG500Image ? provider.alphaColorsBaseUrl : provider.baseUrl;
							imageUrl = baseUrl + size.name + '/' + selectedImage;
						} else {
							// Bunny.net provider
							imageUrl = size.name === 'high-reso' ?
								provider.baseUrl + selectedImage :
								provider.baseUrl + selectedImage + provider.transformQuery
								.replace('<width>', size.width)
								.replace('<height>', size.height);
						}

						getFileSize(imageUrl, (fileSize) => {
							$(`#fileSize-${index}`).text(fileSize);
						});
					});
				}
			}

			function toggleAccordion(index) {
				const accordion = $(`#accordion-${index}`);
				const toggle = accordion.siblings('.image-header').find('.accordion-toggle');

				accordion.toggleClass('active');
				toggle.toggleClass('active');
			}

			// Event delegation for accordion toggles (in case elements are dynamically added)
			$(document).on('click', '.accordion-toggle', function() {
				const accordion = $(this).closest('.image-card').find('.accordion-content');
				accordion.toggleClass('active');
				$(this).toggleClass('active');
			});



			function copyToClipboard(text) {
				navigator.clipboard.writeText(text).then(function() {
					const btn = event.target.closest('.copy-btn');
					const originalHTML = btn.innerHTML;
					btn.innerHTML = '<svg class="copy-icon" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>';
					btn.style.background = '#28a745';

					setTimeout(() => {
						btn.innerHTML = originalHTML;
						btn.style.background = '#667eea';
					}, 2000);
				}).catch(function(err) {
					console.error('Could not copy text: ', err);
					alert('Failed to copy URL to clipboard');
				});
			}

			// Event listeners
			$('#imageSelect, #providerSelect').on('change', generateImageCards);

			// Initialize with empty state
			generateImageCards();
		});
	</script>
</body>

</html>