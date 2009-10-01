<?php
class Ad extends AdsAppModel {

    var $name = 'Ad';
    var $validate = array(
        'name' => array('notempty'),
        'ad_position_id' => array('numeric'),
        'active' => array('numeric')
    );

    var $actsAs = array(
        'Image' => array(
            'fields' => array(
                'src' => array(
                    'resize' => false,
                ),
            ),
        ),
    );

    var $belongsTo = array(
        'Ads.AdPosition',
    );

    function pullAd($position_id) {
        $ad = $this->find('first', array(
            'conditions' => array(
                'ad_position_id' => $position_id,
                'active' => 1,
                'NOW() BETWEEN Ad.start_date AND Ad.end_date',
            ),
            'order' => 'created'
        ));
        return $ad;
    }

}
?>
