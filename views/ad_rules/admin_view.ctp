<?php /* SVN FILE: $Id$ */
extract($data); ?>
<h1><?php echo $AdRule['name'] ?></h1>
<div class="container">
<table>
<?php
	extract($data);
	echo $html->tableCells(array('id',$AdRule['id'])); 
	echo $html->tableCells(array('name',$AdRule['name'])); 
	echo $html->tableCells(array('width',$AdRule['width'])); 
	echo $html->tableCells(array('height',$AdRule['height'])); 
?>
</table>
</div>
<?php
$menu->addm('View', array(
));
