var mockups = {
	custom: {
		id: 'custom',
		preview: '/assets/img/dtf/front.png',
		title: 'Custom',
		sizes: []
	},
	fullFront: {
		id: 'fullFront',
		preview: '/assets/img/dtf/front.png',
		title: 'Full Front',
		previews: {
			adult: 'https://jiffy.imgix.net/gen/preset-sizes/full-front/adult.png?ixlib=rb-0.3.5&h=400&dpr=2&q=60',
			youth: 'https://jiffy.imgix.net/gen/preset-sizes/full-front/youth.png?ixlib=rb-0.3.5&h=400&dpr=2&q=60',
			toddler: 'https://jiffy.imgix.net/gen/preset-sizes/full-front/toddler.png?ixlib=rb-0.3.5&h=400&dpr=2&q=60',
			infant: 'https://jiffy.imgix.net/gen/preset-sizes/full-front/infant.png?ixlib=rb-0.3.5&h=400&dpr=2&q=60'
		},
		sizes: [
			{ category: 'adult', name: 'Adult (M - L)', size: { width: 12.00, height: 8.55 }, price: 5.08 },
			{ category: 'toddler', name: 'Toddler (5T - 6T)', size: { width: 6.00, height: 4.28 }, price: 1.27 },
			{ category: 'toddler', name: 'Toddler (2T - 4T)', size: { width: 6.00, height: 4.28 }, price: 0.88 },
			{ category: 'infant', name: 'Infant', size: { width: 4.00, height: 2.85 }, price: 0.88 }
		],
	},
	fullBack: {
		id: 'fullBack',
		preview: '/assets/img/dtf/back.png',
		title: 'Full Back',
		previews: {
			adult: 'https://jiffy.imgix.net/gen/preset-sizes/full-back/adult.png?ixlib=rb-0.3.5&h=400&dpr=2&q=60',
			youth: 'https://jiffy.imgix.net/gen/preset-sizes/full-back/youth.png?ixlib=rb-0.3.5&h=400&dpr=2&q=60',
			toddler: 'https://jiffy.imgix.net/gen/preset-sizes/full-back/toddler.png?ixlib=rb-0.3.5&h=400&dpr=2&q=60',
			infant: 'https://jiffy.imgix.net/gen/preset-sizes/full-back/infant.png?ixlib=rb-0.3.5&h=400&dpr=2&q=60'
		},
		sizes: [
			{ category: 'adult', name: 'Adult (XS - M)', size: { width: 12.00, height: 8.55 }, price: 3.33 },
			{ category: 'adult', name: 'Adult (L+)', size: { width: 12.00, height: 8.55 }, price: 5.08 },
			{ category: 'youth', name: 'Youth (XS - S)', size: { width: 9.00, height: 6.41 }, price: 2.88 },
			{ category: 'youth', name: 'Youth (M+)', size: { width: 10.00, height: 7.13 }, price: 3.53 },
			{ category: 'toddler', name: 'Toddler', size: { width: 8.00, height: 5.70 }, price: 2.26 },
			{ category: 'infant', name: 'Infant', size: { width: 6.00, height: 4.28 }, price: 1.27 }
		]
	},
	leftChest: {
		id: 'leftChest',
		preview: '/assets/img/dtf/front.png',
		title: 'Left Chest',
		previews: {
			adult: 'https://jiffy.imgix.net/gen/preset-sizes/left-chest/adult.png?ixlib=rb-0.3.5&h=400&dpr=2&q=60',
			youth: 'https://jiffy.imgix.net/gen/preset-sizes/left-chest/youth.png?ixlib=rb-0.3.5&h=400&dpr=2&q=60',
			toddler: 'https://jiffy.imgix.net/gen/preset-sizes/left-chest/toddler.png?ixlib=rb-0.3.5&h=400&dpr=2&q=60',
			infant: 'https://jiffy.imgix.net/gen/preset-sizes/left-chest/infant.png?ixlib=rb-0.3.5&h=400&dpr=2&q=60'
		},
		sizes: [
			{ category: 'adult', name: 'Adult (XS - M)', size: { width: 3.00, height: 2.14 }, price: 0.32 },
			{ category: 'adult', name: 'Adult (L+)', size: { width: 3.50, height: 2.49 }, price: 0.43 },
			{ category: 'youth', name: 'Youth (XS - M)', size: { width: 2.75, height: 1.96 }, price: 0.32 },
			{ category: 'youth', name: 'Youth (L+)', size: { width: 3.00, height: 2.14 }, price: 0.32 },
			{ category: 'toddler', name: 'Toddler', size: { width: 2.00, height: 1.43 }, price: 0.14 },
			{ category: 'infant', name: 'Infant', size: { width: 1.50, height: 1.07 }, price: 0.08 }
		]
	},
	sleeve: {
		id: 'sleeve',
		preview: '/assets/img/dtf/side.png',
		title: 'Sleeve',
		previews: {
			adult: 'https://jiffy.imgix.net/gen/preset-sizes/sleeve/adult.png?ixlib=rb-0.3.5&h=400&dpr=2&q=60',
			youth: 'https://jiffy.imgix.net/gen/preset-sizes/sleeve/youth.png?ixlib=rb-0.3.5&h=400&dpr=2&q=60',
			toddler: 'https://jiffy.imgix.net/gen/preset-sizes/sleeve/toddler.png?ixlib=rb-0.3.5&h=400&dpr=2&q=60',
			infant: 'https://jiffy.imgix.net/gen/preset-sizes/sleeve/infant.png?ixlib=rb-0.3.5&h=400&dpr=2&q=60'
		},
		sizes: [
			{ category: 'adult', name: 'Adult (XS - S)', size: { width: 2.50, height: 1.78 }, price: 0.22 },
			{ category: 'adult', name: 'Adult (M - XL)', size: { width: 3.00, height: 2.14 }, price: 0.32 },
			{ category: 'adult', name: 'Adult (XXL+)', size: { width: 3.25, height: 2.32 }, price: 0.37 },
			{ category: 'youth', name: 'Youth (XS - S)', size: { width: 2.50, height: 1.78 }, price: 0.22 },
			{ category: 'toddler', name: 'Toddler', size: { width: 2.25, height: 1.60 }, price: 0.18 },
			{ category: 'infant', name: 'Infant', size: { width: 1.50, height: 1.07 }, price: 0.08 }
		]
	},
	backCollar: {
		id: 'backCollar',
		preview: '/assets/img/dtf/back.png',
		title: 'Back Collar',
		previews: {
			adult: 'https://jiffy.imgix.net/gen/preset-sizes/back-collar/adult.png?ixlib=rb-0.3.5&h=400&dpr=2&q=60',
			youth: 'https://jiffy.imgix.net/gen/preset-sizes/back-collar/youth.png?ixlib=rb-0.3.5&h=400&dpr=2&q=60',
			toddler: 'https://jiffy.imgix.net/gen/preset-sizes/back-collar/toddler.png?ixlib=rb-0.3.5&h=400&dpr=2&q=60',
			infant: 'https://jiffy.imgix.net/gen/preset-sizes/back-collar/infant.png?ixlib=rb-0.3.5&h=400&dpr=2&q=60'
		},
		sizes: [
			{ category: 'adult', name: 'Adult (XS - L)', size: { width: 3.00, height: 2.14 }, price: 0.32 },
			{ category: 'adult', name: 'Adult (L+)', size: { width: 3.50, height: 2.49 }, price: 0.43 },
			{ category: 'youth', name: 'Youth (XS - S)', size: { width: 2.50, height: 1.78 }, price: 0.22 },
			{ category: 'toddler', name: 'Toddler', size: { width: 2.00, height: 1.43 }, price: 0.14 },
			{ category: 'infant', name: 'Infant', size: { width: 1.75, height: 1.25 }, price: 0.11 }
		]
	},
};


window.values = {
	logo: '',
	customSizes: [
		{ width: 1, height: 1, quantity: 5, amount: .20 }
	]
}


window.selectedMockups = ['custom'];

const sampleOverlay = '/assets/img/dtf/sample-overlay.png';

function htmlShirtMockup({ id, preview, title, overlay = sampleOverlay, selected = false, className = 'selection-item', isCarousel = false }) {
	return `
		<div class="${className} ${id} ${selected ? 'selected' : ''} ${isCarousel ? 'swiper-slide' : ''}" data-type="${id}">
				<div class="${className}__preview">
					<img class="mockup-image" src="${preview}" alt="${title}">
					${id != 'custom' ? `<div class="mockup-image__overlay">
						<img src="${overlay}" alt="Front">
					</div>` : ''}
				</div>
				<h3 class="${className}__title">
					${title}
				</h3>
		</div>
	`
}

function updateSelectedMockups() {
	$('#shirtMockups .selection-item').each(function () {
		const mockup = $(this);
		const type = mockup.data('type');

		if (window.selectedMockups.includes(type)) {
			mockup.addClass('selected');
		} else {
			mockup.removeClass('selected');
		}
	});
}

var shirtMockupsSwiper = null;

function initShirtMockupsSwiper() {
	const container = $('#shirtMockups');
	if (shirtMockupsSwiper) {
		shirtMockupsSwiper.destroy();
	}

	shirtMockupsSwiper = new Swiper(container.get(0), {
		slidesPerView: 5,
		spaceBetween: 10,
		navigation: {
			nextEl: container.find('.dtf-selection__button.next').get(0),
			prevEl: container.find('.dtf-selection__button.prev').get(0),
		},
		breakpoints: {
			1200: {
				slidesPerView: 5,
			},
			1000: {
				slidesPerView: 4,
			},
			768: {
				slidesPerView: 3,
			},
			500: {
				slidesPerView: 4,
			},
			400: {
				slidesPerView: 3,
			},
			300: {
				slidesPerView: 2,
			},
			0: {
				slidesPerView: 2,
			}
		}
	});
}


function renderShirtMockups() {
	const shirtMockups = $('#shirtMockups .swiper-wrapper');
	var html = '';
	Object.values(mockups).forEach(mockup => {
		html += htmlShirtMockup({ ...mockup, selected: window.selectedMockups.includes(mockup.id), isCarousel: true, overlay: window.values.logo });
	});
	shirtMockups.html(html);
	initShirtMockupsSwiper();
}

function isCustomMockupExists() {
	return $('#sizes').find('.custom-sizes-container').length > 0;
}

function addMockupSizes(type) {
	window.selectedMockups.push(type);
	if (type === 'custom') {
		$('#sizes').append(htmlMockupCustomSizes());
		attachCustomSizeContainerEvents();
	} else {
		const html = htmlMockupSizes(type);
		if (isCustomMockupExists()) {
			$('#sizes .custom-sizes-container').before(html);
		} else {
			$('#sizes').append(html);
		}
		attachSizeContainerEvents();
		updateContainersRemoveBtnAppearance();
	}
}

function removeMockupSizes(type) {
	if (window.selectedMockups.length === 1) return false;

	window.selectedMockups = window.selectedMockups.filter(mockup => mockup !== type);
	if (type === 'custom') {
		$(document).find(`.custom-sizes-container[data-type="${type}"]`).remove();
	} else {
		$(document).find(`.sizes-container[data-type="${type}"]`).remove();
	}
	updateContainersRemoveBtnAppearance();

	return true;
}

$(document).on('click', '#shirtMockups .selection-item', function () {
	const mockup = $(this);
	const type = mockup.data('type');

	if (window.selectedMockups.includes(type)) {
		if (removeMockupSizes(type)) {
			mockup.removeClass('selected');
		}
	} else {
		addMockupSizes(type);
		mockup.addClass('selected');
	}
});

var dtfColors = [
	{
		id: 'black',
		hex: '#000000'
	},
	{
		id: 'white',
		hex: '#FFFFFF'
	},
	{
		id: 'red',
		hex: '#FF0000'
	},
	{
		id: 'blue',
		hex: '#0000FF'
	},
	{
		id: 'green',
		hex: '#00FF00'
	},
	{
		id: 'yellow',
		hex: '#FFFF00'
	},
	{
		id: 'purple',
		hex: '#800080'
	},
	{
		id: 'orange',
		hex: '#FFA500'
	},

]

function attachColorPickerEvents() {

	$(document).find('.custom-color-picker').off('click').on('click', function () {
		$(this).find('input').click();
	});

	$(document).find('.custom-color-picker input').off('change').on('change', function () {
		const color = $(this).val();
		$(this).parent().find('.custom-color-picker__icon').css('background-color', color);
		updateMockupColor(color);
	});
}


function htmlColorPicker({ hex = '#000000' }) {
	return `
	<div class="custom-color-picker">
			<input type="color" value="${hex}">
			<span class="custom-color-picker__icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Google Material Icons by Material Design Authors - https://github.com/material-icons/material-icons/blob/master/LICENSE -->
					<path fill="currentColor" d="M12 22C6.49 22 2 17.51 2 12S6.49 2 12 2s10 4.04 10 9c0 3.31-2.69 6-6 6h-1.77c-.28 0-.5.22-.5.5c0 .12.05.23.13.33c.41.47.64 1.06.64 1.67A2.5 2.5 0 0 1 12 22m0-18c-4.41 0-8 3.59-8 8s3.59 8 8 8c.28 0 .5-.22.5-.5a.54.54 0 0 0-.14-.35c-.41-.46-.63-1.05-.63-1.65a2.5 2.5 0 0 1 2.5-2.5H16c2.21 0 4-1.79 4-4c0-3.86-3.59-7-8-7" />
					<circle cx="6.5" cy="11.5" r="1.5" fill="currentColor" />
					<circle cx="9.5" cy="7.5" r="1.5" fill="currentColor" />
					<circle cx="14.5" cy="7.5" r="1.5" fill="currentColor" />
					<circle cx="17.5" cy="11.5" r="1.5" fill="currentColor" />
				</svg>
			</span>
		</div>
	`
}

function htmlColor({ id, hex }) {
	return `
		<div class="colors-item" data-type="${id}" style="background-color: ${hex};">
		</div>
	`
};

function updateMockupColor(hex) {
	const mockup = $(`.selection-item .selection-item__preview, .large-mockups__item .mockup-image`).css('background-color', hex);
}

$(document).on('click', '.dtf-card__colors-list .colors-item, .large-mockups__colors-list .colors-item', function () {
	const hex = $(this).css('background-color');
	$(document).find('.dtf-card__colors-list .colors-item, .large-mockups__colors-list .colors-item').removeClass('selected');
	$(this).addClass('selected');
	updateMockupColor(hex);
});

function renderColors(container = $('.dtf-card__colors-list')) {
	var html = '';
	dtfColors.forEach(color => {
		html += htmlColor(color);
	});


	html += htmlColorPicker({ hex: '#000000' });

	container.html(html);
	$(document).find('.dtf-card__colors').show();
	attachColorPickerEvents();
}



function displayLargeMockups() {
	var modal = $('#largeMockupsModal');
	var title = 'Large Mockups';

	var html = '';


	Object.values(mockups).forEach(mockup => {
		if (mockup.id === 'custom') return;
		html += htmlShirtMockup({ ...mockup, className: 'large-mockups__item' });
	});

	modal.find('.large-mockups__list').html(html);

	renderColors(modal.find('.large-mockups__colors-list'));

	modal.modal('show');
}

function htmlMockupSizeInput({ name, size, price }) {
	return `
		<div class="sizes-item swiper-slide">
			<div class="sizes-item__title">
				${name}
			</div>
			<div class="sizes-item__sizes">
				${size.width}" x ${size.height}"
			</div>

			<div class="sizes-item__input">
				<button class="btn minus-btn">-</button>
				<input min="0" data-price="${price}" type="number" value="0">
				<button class="btn plus-btn">+</button>
			</div>

			<div class="sizes-item__price">
				&nbsp;
			</div>
		</div>
	`
}

function htmlMockupSizes(type = 'fullFront') {
	const sizes = mockups[type].sizes;
	var html = '';
	sizes.forEach(size => {
		html += htmlMockupSizeInput(size);
	});

	return `
		<div class="sizes-container" data-type="${type}">
			<button class="remove-btn">
			<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="m12 13.4l-4.9 4.9q-.275.275-.7.275t-.7-.275t-.275-.7t.275-.7l4.9-4.9l-4.9-4.9q-.275-.275-.275-.7t.275-.7t.7-.275t.7.275l4.9 4.9l4.9-4.9q.275-.275.7-.275t.7.275t.275.7t-.275.7L13.4 12l4.9 4.9q.275.275.275.7t-.275.7t-.7.275t-.7-.275z"/></svg>
			</button>

			<div class="sizes-container__title">
				${mockups[type].title}
			</div>
			<div class="sizes-container__list swiper">
				<div class="swiper-wrapper">
					${html}
				</div>

				<button class="sizes-container__button next">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right"><path d="m9 18 6-6-6-6"/></svg>
				</button>
				<button class="sizes-container__button prev">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left"><path d="m15 18-6-6 6-6"/></svg>
				</button>
			</div>

			<div class="sizes-container__footer">
				<div class="sizes-container__summary">
					0 Transfer
				</div>
				<button class="sizing-guide-btn" data-type="${type}">Sizing Guide</button>
			</div>
		</div>
	`
}

function htmlMockupCustomSize({ width = 1.45, height = 1.00, quantity = 1, price = 0.05, initial = false }) {

	return `
	<div class="custom-size">
		<div class="custom-size__group">
			<div class="custom-size__field width">
				<label>Width (inch)</label>
				<input type="number" name="width" placeholder="Enter width" value="${width}" ${initial ? 'disabled="disabled"' : ''}>
			</div>
			<div class="x">x</div>
			<div class="custom-size__field height">
				<label for="height">Height (inch)</label>
				<input type="number" name="height" placeholder="Enter height" value="${height}" ${initial ? 'disabled="disabled"' : ''}>
			</div>
		</div>

		<div class="custom-size__field quantity">
			<label>Quantity</label>
			<div class="sizes-item__input">
				<button class="btn minus-btn" ${initial ? 'disabled="disabled"' : ''}>-</button>
				<input data-price="${price}" type="number" value="${quantity}" ${initial ? 'disabled="disabled"' : ''}>
				<button class="btn plus-btn" ${initial ? 'disabled="disabled"' : ''}>+</button>
			</div>
			<div class="amount">
				$${price}
			</div>

		</div>

		<button class="btn delete-btn" style="display: none;">
		<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zm2-4h2V8H9zm4 0h2V8h-2z"/></svg>
		</button>
	</div>
	`
}

function updateContainersRemoveBtnAppearance() {
	const containers = $(document).find('.sizes-container, .custom-sizes-container');
	containers.each(function () {
		const container = $(this);
		const removeBtn = container.find('.remove-btn');
		if (containers.length > 1) {
			removeBtn.show();
		} else {
			removeBtn.hide();
		}
	});
}

function htmlMockupCustomSizes(initial = false) {

	return `
		<div class="custom-sizes-container" data-type="custom">
		<button class="btn remove-btn" style="display: none;">
		<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="m12 13.4l-4.9 4.9q-.275.275-.7.275t-.7-.275t-.275-.7t.275-.7l4.9-4.9l-4.9-4.9q-.275-.275-.275-.7t.275-.7t.7-.275t.7.275l4.9 4.9l4.9-4.9q.275-.275.7-.275t.7.275t.275.7t-.275.7L13.4 12l4.9 4.9q.275.275.275.7t-.275.7t-.7.275t-.7-.275z"></path></svg>
		</button>

		<div class="custom-sizes-container__title">
			Custom Size
		</div>
		<div class="custom-sizes-container__field-list">
			${htmlMockupCustomSize({
		width: 1.45,
		height: 1.00,
		quantity: 1,
		price: 0.05,
		initial
	})}
		</div>

		${initial ? '' : '<div class="custom-sizes-container__summary"><p>0 Transfer</p></div>'}


		${initial ? '' : '<button class="add-size-btn">Add Another Size</button>'}
	</div>
	`
}


var swipers = {}


function initSizeContainerSwiper(type) {
	const container = $(document).find(`.sizes-container[data-type="${type}"]`);

	if (swipers[type]) {
		swipers[type].destroy();
	}

	swipers[type] = new Swiper(container.find('.swiper').get(0), {
		slidesPerView: 5.2,
		spaceBetween: 10,
		navigation: {
			nextEl: container.find('.sizes-container__button.next').get(0),
			prevEl: container.find('.sizes-container__button.prev').get(0),
		},
		breakpoints: {
			1200: {
				slidesPerView: 5.2,
			},
			1000: {
				slidesPerView: 4.2,
			},
			768: {
				slidesPerView: 3.2,
			},
			600: {
				slidesPerView: 4.2,
			},
			0: {
				slidesPerView: 2.2,
			}
		}
	});
}

function attachSizeContainerEvents() {
	$(document).find(`.sizes-container`).each(function () {
		const container = $(this);
		const type = container.data('type');

		function getTotalTransfer() {
			const inputs = container.find('.sizes-item__input input')


			let inputsArray = [];
			inputs.each(function (index, input) {
				const price = $(input).data('price');
				const quantity = parseInt($(input).val() || 0);
				inputsArray.push({
					price,
					quantity
				});
			});

			console.log(inputsArray);

			const totalAmount = inputsArray.reduce((acc, curr) => {
				return {
					total: acc.total + parseFloat(curr.price) * parseInt(curr.quantity),
					quantity: acc.quantity + parseInt(curr.quantity)
				}
			}, {
				total: 0,
				quantity: 0
			});

			return {
				total: totalAmount.total.toFixed(2),
				quantity: totalAmount.quantity
			}
		}

		function updateSummary() {
			const total = getTotalTransfer();
			console.log(total);
			if (total.quantity > 0) {
				container.find('.sizes-container__summary').text(`${total.quantity} Transfers - $${total.total}`);
			} else {
				container.find('.sizes-container__summary').text(`0 Transfers`);
			}
		}

		container.find('.sizes-item').each(function () {
			const plusBtn = $(this).find('.plus-btn');
			const minusBtn = $(this).find('.minus-btn');
			const input = $(this).find('input');
			const self = $(this);

			function displayPrice(quantity) {
				const price = input.data('price');
				const total = Number(parseFloat(price) * parseInt(quantity || 0)).toFixed(2);

				updateSummary();
				if (quantity > 0) {
					self.find('.sizes-item__price').text(`$${total}`);
				} else {
					self.find('.sizes-item__price').html(`&nbsp;`);
				}

			}

			plusBtn.off('click').on('click', function () {
				const input = $(this).siblings('input');
				const value = parseInt(input.val() || 0) + 1;

				if (value > 0) {
					input.val(value);
					displayPrice(value);
				}
			});

			minusBtn.off('click').on('click', function () {
				const input = $(this).siblings('input');
				const value = parseInt(input.val() || 0) - 1;

				if (value >= 0) {
					input.val(value);
					displayPrice(value);
				}
			});

			input.off('change').on('change', function () {
				const value = parseInt(input.val() || 0);
				displayPrice(value);
			});
		});

		container.find('.remove-btn').off('click').on('click', function () {
			if (removeMockupSizes(container.data('type'))) {
				updateSelectedMockups();
			}
		});

		container.find('.sizing-guide-btn').off('click').on('click', function () {
			displaySizingGuides(container.data('type'));
		});

		initSizeContainerSwiper(type);
	});
}

function attachCustomSizeContainerEvents() {

	$(document).find(`.custom-sizes-container`).each(function () {
		const container = $(this);
		const list = container.find('.custom-sizes-container__field-list');
		const addBtn = container.find('.add-size-btn');
		const type = 'custom';


		function getTotalTransfer() {
			const inputs = container.find('.custom-size__field.quantity input')


			let inputsArray = [];
			inputs.each(function (index, input) {
				const price = $(input).data('price');
				const quantity = parseInt($(input).val() || 0);
				inputsArray.push({
					price,
					quantity
				});
			});

			console.log(inputsArray);

			const totalAmount = inputsArray.reduce((acc, curr) => {
				return {
					total: acc.total + parseFloat(curr.price) * parseInt(curr.quantity),
					quantity: acc.quantity + parseInt(curr.quantity)
				}
			}, {
				total: 0,
				quantity: 0
			});

			return {
				total: totalAmount.total.toFixed(2),
				quantity: totalAmount.quantity
			}
		}


		function updateSummary() {
			const total = getTotalTransfer();
			console.log(total);
			if (total.quantity > 0) {
				container.find('.custom-sizes-container__summary').text(`${total.quantity} Transfers - $${total.total}`);
			} else {
				container.find('.custom-sizes-container__summary').text(`0 Transfers`);
			}
		}

		function updateDeleteBtnAppearance() {
			const list = container.find('.custom-sizes-container__field-list');
			const deleteBtn = container.find('.delete-btn');
			if (list.children().length > 1) {
				deleteBtn.show();
			} else {
				deleteBtn.hide();
			}
		}

		function customSizeEvents(item) {
			const self = $(item);
			const widthInput = self.find('.custom-size__field.width input');
			const heightInput = self.find('.custom-size__field.height input');
			const quantityInput = self.find('.custom-size__field.quantity');
			const plusBtn = quantityInput.find('.plus-btn');
			const minusBtn = quantityInput.find('.minus-btn');
			const input = quantityInput.find('input');
			const error = self.find('.custom-size__error');

			const removeBtn = self.find('.delete-btn');

			function displayPrice(quantity) {
				const price = input.data('price');
				const total = Number(parseFloat(price) * parseInt(quantity || 0)).toFixed(2);

				updateSummary();
				if (quantity > 0) {
					self.find('.amount').text(`$${total}`);
				} else {
					self.find('.amount').html(`&nbsp;`);
				}

			}

			plusBtn.off('click').on('click', function () {
				const value = parseInt(input.val() || 0) + 1;

				if (value > 0) {
					input.val(value);
					displayPrice(value);
				}
			});

			minusBtn.off('click').on('click', function () {
				const value = parseInt(input.val() || 0) - 1;

				if (value >= 1) {
					input.val(value);
					displayPrice(value);
				}
			});

			input.off('input').on('input', function () {
				const value = parseInt(input.val() || 0);
				displayPrice(value);
			});


			widthInput.off('input').on('input', function () {
				var value = widthInput.val();

				if (value < 1) {
					error.show().text('The minimum print size is 1" x 1"');
					widthInput.addClass('error');
				} else if (value > 22) {
					error.show().text('The maximum print size is 22" x 120"');
					widthInput.addClass('error');
				} else {
					error.hide();
					widthInput.removeClass('error');
				}

				heightInput.val(Number(value * 0.69).toFixed(2));
			})

			heightInput.off('input').on('input', function () {
				var value = heightInput.val();

				if (value < 1) {
					error.show().text('The minimum print size is 1" x 1"');
					heightInput.addClass('error');
				} else if (value > 120) {
					error.show().text('The maximum print size is 22" x 120"');
					heightInput.addClass('error');
				} else {
					error.hide();
					heightInput.removeClass('error');
				}

				widthInput.val(Number(value * 1.45).toFixed(2));
			})

			removeBtn.off('click').on('click', function () {
				self.remove();
				updateSummary();
				updateDeleteBtnAppearance()
			});
		}

		function attachCustomSizeEvents() {
			container.find('.custom-size').each(function (index) {
				customSizeEvents(this);
			});
		}

		container.find('.remove-btn').off('click').on('click', function () {
			if (removeMockupSizes(type)) {
				updateSelectedMockups();
			}
		});


		container.find('.add-size-btn').off('click').on('click', function () {
			list.append(htmlMockupCustomSize({
				width: 1.45,
				height: 1.00,
				quantity: 1,
				price: 0.12
			}));
			attachCustomSizeEvents()
			updateDeleteBtnAppearance()
			updateSummary();
		});

		attachCustomSizeEvents();
	});
}

function htmlSizingGuide({ title, preview, sizes }) {
	return `
	<div class="sizing-guide__item">
		<img src="${preview}" alt="">

		<h4>${title}</h4>

		<div class="sizing-guide__sizes">
			${sizes.map(size => `
				<div class="sizing-guide__size">
					<b>${size.name}</b>
					<span>${size.size.width}" × ${size.size.height}"</span>
				</div>

			`).join('')}
		</div>

	</div>
	`
}

function getSizingGuides(type) {
	const sizes = mockups[type].sizes;
	const previews = mockups[type].previews;

	const toDisplay = {};

	sizes.forEach(size => {
		const category = size.category;
		if (!toDisplay[category]) {
			toDisplay[category] = {
				title: size.category,
				preview: previews[category],
				sizes: []
			};
		}
		toDisplay[category].sizes.push(size);
	});

	return toDisplay;
}

function displaySizingGuides(type) {
	var modal = $('#sizingGuideModal2');
	var title = mockups[type].title;
	const sizingGuides = getSizingGuides(type);

	var html = '';

	Object.keys(sizingGuides).forEach(key => {
		html += htmlSizingGuide(sizingGuides[key]);
	});

	modal.find('.sizing-guide').html(html);
	modal.find('.modal-title').text(title);
	modal.modal('show');
}

function saveTimeTooltip() {
	var modal = $('#saveTimeTooltipModal');
	modal.modal('show');
}


function proceedToStepTwo({ logo }) {
	window.values.logo = logo;
	$(document).find('#dummyCustomSize').hide();
	renderShirtMockups();
	renderColors();
	$('#sizes').html(htmlMockupCustomSizes());
	attachCustomSizeContainerEvents();

	// $('#sizes').append(htmlMockupCustomSizes(true));
	// $('#sizes').append(htmlMockupSizes('fullFront'));
	// $('#sizes').append(htmlMockupSizes('fullBack'));
	// $('#sizes').append(htmlMockupSizes('leftChest'));
	// $('#sizes').append(htmlMockupSizes('sleeve'));
	// $('#sizes').append(htmlMockupSizes('backCollar'));
	// attachSizeContainerEvents();
}


function resetStepTwo() {
	$(document).find('#dummyCustomSize').show();
	$(document).find('.dtf-card__colors, .dtf-card__browse, .dtf-card__note, .dtf-card__save-time').hide();
}

// Start - transfer by size DTF - CL - 942025
function initSwitches() {
	// Handle Remove Background switch
	$('#removeBackground').off('change').on('change', function () {
		const isEnabled = $(this).is(':checked');
		console.log('Remove Background:', isEnabled ? 'enabled' : 'disabled');

		// Add your logic here for remove background functionality
		if (isEnabled) {
			// Enable remove background feature
			// Example: apply background removal to images
		} else {
			// Disable remove background feature
		}
	});

	// Handle Super Resolution switch
	$('#superResolution').off('change').on('change', function () {
		const isEnabled = $(this).is(':checked');
		console.log('Super Resolution:', isEnabled ? 'enabled' : 'disabled');

		// Add your logic here for super resolution functionality
		if (isEnabled) {
			// Enable super resolution feature
			// Example: enhance image quality
		} else {
			// Disable super resolution feature
		}
	});
}
// End - transfer by size DTF - CL - 942025


$(document).ready(function () {

	// displayLargeMockups()
	// saveTimeTooltip();

	// Initialize switches
	initSwitches();

	proceedToStepTwo({ logo: sampleOverlay });

	$('#viewLargerMockupsBtn').off('click').on('click', function () {
		displayLargeMockups();
	});

	$('#saveTimeTooltipBtn').off('click').on('click', function () {
		saveTimeTooltip();
	});
});





