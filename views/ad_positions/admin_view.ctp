<?php /* SVN FILE: $Id$ */
extract($data); ?>
<h1><?php echo $AdPosition['name'] ?></h1>
<div class="container">
<table>
<?php
	extract($data);
	echo $html->tableCells(array('id',$AdPosition['id'])); 
	echo $html->tableCells(array('name',$AdPosition['name'])); 
	echo $html->tableCells(array('Ad Rule', $AdRule?$AdRule['name']:'')); 
?>
</table>
</div>
<?php
$menu->addm('View', array(
	array('title' => $AdRule['name'], 'url' => array('controller' => 'ad_rules', 'action' => 'view', $AdPosition['ad_rule_id'])),
));
