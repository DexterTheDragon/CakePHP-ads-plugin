<?php /* SVN FILE: $Id$ */ ?>
<h1>Ads</h1>
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
	$paginator->sort('Ad Position', 'AdPosition.name'),
	$paginator->sort('Name', 'name'),
	$paginator->sort('Active', 'active'),
	$paginator->sort('Url', 'url'),
	$paginator->sort('Start Date', 'start_date'),
	$paginator->sort('End Date', 'end_date'),
);
echo $html->tableHeaders($th);
foreach ($data as $row) {
	extract($row);
	$tr = array(
		$html->link($Ad['id'], array('action' => 'view', $Ad['id'])),
		$AdPosition?$AdPosition['name']:'',
		$Ad['name'],
		$Ad['active'],
		$Ad['url'],
		$Ad['start_date'],
		$Ad['end_date'],
	);
	echo $html->tableCells($tr, array('class' => 'odd'), array('class' => 'even'));
}
?>
</table>
<?php echo $this->element('paging'); ?></div>
