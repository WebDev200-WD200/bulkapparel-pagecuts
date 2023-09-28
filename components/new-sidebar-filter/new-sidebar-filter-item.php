<?php extract($data); ?>
<li class="side-filter__item">
	<label class="label" for="<?= $id ?>">
		<?php if ($isCheckbox) : ?>
			<?php template(
				'./components/new-sidebar-filter/checkbox.php',
				[
					"id" => $id,
					"name" => $name
				]
			); ?>
		<?php else : ?>
			<?php template('./components/new-sidebar-filter/radiobutton.php', [
				"id" => $id,
				"name" => $name
			]); ?>
		<?php endif ?>

		<p class="name"><?= $title ?></p>
		<p class="count">(<?= $count ?>)</p>
	</label>
</li>