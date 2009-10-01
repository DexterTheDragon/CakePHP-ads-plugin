<?php /* SVN FILE: $Id$ */ ?>
<h1>Ad Positions</h1>
<div class="container">
<?php
$pass = $this->passedArgs;
$pass['action'] = str_replace(Configure::read('Routing.admin') . '_', '', $this->action); // temp
$paginator->options(array('url' => $pass));
?>
<table>
<?php
$th = array(
	$paginator->sort('Id', 'id'),
	$paginator->sort('Name', 'name'),
	$paginator->sort('Ad Rule', 'AdRule.name'),
);
echo $html->tableHeaders($th);
foreach ($data as $row) {
	extract($row);
	$tr = array(
		$html->link($AdPosition['id'], array('action' => 'view', $AdPosition['id'])),
		$AdPosition['name'],
		$AdRule?$AdRule['name']:'',
	);
	echo $html->tableCells($tr, array('class' => 'odd'), array('class' => 'even'));
}
?>
</table>
<?php echo $this->element('paging'); ?></div>