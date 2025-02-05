 <div class="faq">
 	<h2>FAQ</h2>
 	<div class="accordion">
 		<?php
			$faq_items = [
				[
					'question' => 'Do I need to be a Bulk Apparel member to use a promo code?',
					'answer' => 'Only members can make purchases on the website. Therefore, to apply a coupon code to your order, you must have an account and be signed in.'
				],
				[
					'question' => 'Can I use the same coupon code twice?',
					'answer' => 'No, coupon codes are for one-time use only per customer account.'
				],
				[
					'question' => 'How do I use a coupon code?',
					'answer' => 'Enter the coupon code at checkout in the designated promotional code field.'
				],
				[
					'question' => 'Can I use a coupon code to save on shipping?',
					'answer' => 'Yes, some coupon codes may offer shipping discounts. Check the specific terms of each promotion.'
				]
			];

			?>
 		<?php foreach ($faq_items as $item): ?>
 			<div class="accordion-item">
 				<button class="accordion-header"><?= $item['question'] ?>
 					<span class="icon">
 						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="10" viewBox="0 0 16 10" fill="none">
 							<path fill-rule="evenodd" clip-rule="evenodd" d="M6.9401 0.80974C7.22135 0.528839 7.6026 0.371059 8.0001 0.371059C8.3976 0.371059 8.77885 0.528839 9.0601 0.80974L14.7181 6.46574C14.9994 6.74713 15.1573 7.12874 15.1572 7.52659C15.1571 7.92445 14.999 8.30598 14.7176 8.58724C14.4362 8.8685 14.0546 9.02646 13.6567 9.02637C13.2589 9.02627 12.8774 8.86813 12.5961 8.58674L8.0001 3.99074L3.4041 8.58674C3.12132 8.86011 2.74249 9.01149 2.34919 9.00825C1.9559 9.00502 1.5796 8.84745 1.30136 8.56947C1.02311 8.29148 0.86518 7.91534 0.861578 7.52204C0.857976 7.12875 1.00899 6.74977 1.2821 6.46674L6.9391 0.808739L6.9401 0.80974Z" fill="black" />
 						</svg>
 					</span>
 				</button>
 				<div class="accordion-content">
 					<p><?= $item['answer'] ?></p>
 				</div>
 			</div>
 		<?php endforeach ?>
 	</div>
 </div>

 <script>
 	document.addEventListener('DOMContentLoaded', function() {
		var activeClass = 'accordion-active';
 		// Get all accordion headers
 		const accordionHeaders = document.querySelectorAll('.accordion-header');

 		// Add click event listener to each header
 		accordionHeaders.forEach(header => {
 			header.addEventListener('click', function() {
 				// Toggle active class on header
 				this.classList.toggle(activeClass);

 				// Get the content panel
 				const content = this.nextElementSibling;

 				// Toggle active class on content
 				content.classList.toggle(activeClass);

 				// If panel is open, set max-height to content height
 				if (content.classList.contains(activeClass)) {
 					content.style.maxHeight = (content.scrollHeight + 32 + 16) + 'px';
 				} else {
 					content.style.maxHeight = 0;
 				}

 				// Close other panels
 				accordionHeaders.forEach(otherHeader => {
 					if (otherHeader !== this) {
 						otherHeader.classList.remove(activeClass);
 						const otherContent = otherHeader.nextElementSibling;
 						otherContent.classList.remove(activeClass);
 						otherContent.style.maxHeight = 0;
 					}
 				});
 			});
 		});
 	});
 </script>