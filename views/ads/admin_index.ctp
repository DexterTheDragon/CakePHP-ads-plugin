<div class="index">
<h2><?php __('Ads');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('ad_position_id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('image_file_name');?></th>
	<th><?php echo $paginator->sort('active');?></th>
	<th><?php echo $paginator->sort('url');?></th>
	<th><?php echo $paginator->sort('start_date');?></th>
	<th><?php echo $paginator->sort('end_date');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($this->data as $ad):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $ad['Ad']['id']; ?>
		</td>
		<td>
            <?php echo $ad['AdPosition']['name']; ?>
		</td>
		<td>
			<?php echo $ad['Ad']['name']; ?>
		</td>
		<td>
			<?php echo $ad['Ad']['image_file_name']; ?>
		</td>
		<td>
			<?php echo $ad['Ad']['active']; ?>
		</td>
		<td>
			<?php echo $ad['Ad']['url']; ?>
		</td>
		<td>
			<?php echo $ad['Ad']['start_date']; ?>
		</td>
		<td>
			<?php echo $ad['Ad']['end_date']; ?>
		</td>
		<td>
			<?php echo $ad['Ad']['created']; ?>
		</td>
		<td>
			<?php echo $ad['Ad']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $ad['Ad']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $ad['Ad']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $ad['Ad']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $ad['Ad']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Ad', true), array('action' => 'add')); ?></li>
	</ul>
</div>
