<?php
class AdsController extends AdsAppController {
    var $name = 'Ads';

    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('get');
    }

    function get($id) {
        $this->data = $this->Ad->pullAd($id);

        if (isset($this->params['requested'])) {
            return $this->data;
        }
    }

    function admin_add( ) {
        parent::admin_add( );
        $this->_setAdSizes( );
    }

    function admin_edit($id) {
        parent::admin_edit($id);
        $this->_setAdSizes($this->data['Ad']['ad_position_id']);
    }

    function _setAdSizes($position_id = null) {
        $options['contain'] = 'AdRule';
        if ($position_id) {
            $position = $this->Ad->AdPosition->read(null, $position_id);
            $options['conditions'] = array('AdRule.id' => $position['AdPosition']['ad_rule_id']);
        }
        $options['order'] = 'AdPosition.name';
        $adPositions = $this->Ad->AdPosition->find('all', $options);
        $sizes = Set::combine($adPositions, '/AdPosition/id', array('%s &times; %s', '/AdRule/width', '/AdRule/height'));
        $adPositions = Set::combine($adPositions, '/AdPosition/id', array('%s (%sx%s)', '/AdPosition/name', '/AdRule/width', '/AdRule/height'));
        $this->set(compact('sizes', 'adPositions'));
    }

}
?>
