<?php
class AdRule extends AdsAppModel {

	var $name = 'AdRule';
	var $validate = array(
		'name' => array('notempty'),
		'width' => array('numeric'),
		'height' => array('numeric')
	);

    var $hasMany = array(
        'Ads.AdPosition',
    );

}
?>
