<?php /* SVN FILE: $Id$ */
extract($data); ?>
<h1><?php echo $Ad['name'] ?></h1>
<div class="container">
<table>
<?php
	extract($data);

    $size = '';
    if (!empty($Ad['src']['path'])) {
        $pathBase = WWW_ROOT.'img'.DS;

        if (file_exists($pathBase.$Ad['src']['path'])) {
            list($width, $height) = @getimagesize($pathBase.$Ad['src']['path']);
            $size = "<br /><br /><b>Image Size:</b> ({$width}px &times; {$height}px)";
        }
    }
	echo $html->tableCells(array('id',$Ad['id']));
	echo $html->tableCells(array('Ad Position', $AdPosition?$AdPosition['name']:''));
	echo $html->tableCells(array('name',$Ad['name']));
	echo $html->tableCells(array('src', $html->image($Ad['src']['path']).$size));
	echo $html->tableCells(array('created',$Ad['created']));
	echo $html->tableCells(array('modified',$Ad['modified']));
	echo $html->tableCells(array('active',$Ad['active']));
	echo $html->tableCells(array('url',$Ad['url']));
	echo $html->tableCells(array('start_date',$Ad['start_date']));
	echo $html->tableCells(array('end_date',$Ad['end_date']));
?>
</table>
</div>
<?php
$menu->addm('View', array(
	array('title' => $AdPosition['name'], 'url' => array('controller' => 'ad_positions', 'action' => 'view', $Ad['ad_position_id'])),
));
