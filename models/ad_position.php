<?php
class AdPosition extends AdsAppModel {

	var $name = 'AdPosition';
	var $validate = array(
		'name' => array('notempty'),
		'ad_rule_id' => array('numeric')
	);

	var $belongsTo = array(
        'Ads.AdRule'
    );

	var $hasMany = array(
        'Ads.Ad'
    );

}
?>
