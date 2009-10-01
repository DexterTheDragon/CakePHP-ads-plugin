<div class="ads form">
<?php echo $form->create('Ad', array('type' => 'file'));?>
	<fieldset>
 		<legend><?php __('Edit Ad');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('ad_position_id');
		echo $form->input('name');
		echo $form->input('image', array('type' => 'file'));
		echo $form->input('active');
		echo $form->input('url');
		echo $form->input('start_date');
		echo $form->input('end_date');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Ad.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Ad.id'))); ?></li>
		<li><?php echo $html->link(__('List Ads', true), array('action' => 'index'));?></li>
	</ul>
</div>
