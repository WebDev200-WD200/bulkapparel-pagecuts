<div class="category-brand-skeleton">
	<?php foreach (range(1, 20) as $iteration) : ?>
		<div class="category-brand-skeleton__item">

			<!-- <div class="category-brand-skeleton__image skeleton">

			</div>

			<div class="category-brand-skeleton__text skeleton">

				Skeleton <?= $iteration; ?>
			</div> -->

			<?php include('./components/skeleton/card-question-answer.php') ?>


			<?php ?>

		</div>


	<?php endforeach ?>
</div>