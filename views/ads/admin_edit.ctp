<?php /* SVN FILE: $Id$ */
if ($data) {
	extract($data);
}
$image = null;
if ( !empty($this->data['Ad']['src']['path']) ) {
    $image = $html->image($this->data['Ad']['src']['path']);

    $pathBase = WWW_ROOT.'img'.DS;
    if (file_exists($pathBase.$this->data['Ad']['src']['path'])) {
        list($width, $height) = @getimagesize($pathBase.$this->data['Ad']['src']['path']);
        $image .= "<br /><br /><b>Image Size:</b> ({$width}px &times; {$height}px)";
    }
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
	'ad_position_id' => array('empty' => true),
	'name',
	'src' => array('type' => 'file', 'label' => 'Src<br />&nbsp;&nbsp;', 'after' => '<br/>'. $image),
	'active',
	'url',
	'start_date',
	'end_date',
));
echo $form->end('Submit');
?></div>
