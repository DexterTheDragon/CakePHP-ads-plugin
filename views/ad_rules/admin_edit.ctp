<?php /* SVN FILE: $Id$ */ 
if ($data) {
	extract($data);
}
$action = in_array($this->action, array('add', 'admin_add'))?'Add':'Edit';
$action = Inflector::humanize($action);
$name = isset($this->data[$modelClass]['name'])?$this->data[$modelClass]['name']:' new';
?>
<h1><?php echo $this->name . ' - ' . $action . ' ' . $name ?></h1>
<div class="form-container">
<?php
echo $form->create(null, array('type' => 'file'));
echo $form->inputs(array(
	'legend' => false,
	'id',
	'name',
	'width',
	'height',
));
echo $form->end('Submit');
?></div>