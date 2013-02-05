<<<<<<< HEAD
<tr data-recId="<?= $recId?>" class="<?php echo $options['class_row'] ?> <?php echo $zebra; ?>">
=======
<tr class="<?php echo $options['class_row'] ?> <?php echo $zebra; ?>">
>>>>>>> 1a5c7ed9149c08364194c8ce0407aed85cb3e16f
	<?php foreach($rowColumns as $column): ?>
	<td>
		<?php echo $column ?>
	</td>
	<?php endforeach; ?>
</tr>