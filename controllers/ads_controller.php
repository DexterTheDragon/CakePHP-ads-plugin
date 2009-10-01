<?php
class AdsController extends AdsAppController {
    var $name = 'Ads';
    var $helpers = array('UploadPack.Upload');

    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('get');
    }

    function get($id, $random = false) {
        $random = (bool)$random;
        $this->data = $this->Ad->pullAd($id, $random);

        if (isset($this->params['requested'])) {
            return $this->data;
        }
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

    function admin_index() {
		$this->Ad->recursive = 0;
        $this->data = $this->paginate();
    }

    function admin_view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid Ad.', true));
            $this->redirect(array('action'=>'index'));
        }
        $this->set('ad', $this->Ad->read(null, $id));
    }

    function admin_add( ) {
		if (!empty($this->data)) {
			$this->Ad->create();
			if ($this->Ad->save($this->data)) {
				$this->Session->setFlash(__('The Ad has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Ad could not be saved. Please, try again.', true));
			}
		}
        $this->_setAdSizes( );
    }

    function admin_edit($id) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Ad', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Ad->save($this->data)) {
				$this->Session->setFlash(__('The Ad has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Ad could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Ad->read(null, $id);
		}
        $this->_setAdSizes($this->data['Ad']['ad_position_id']);
    }

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Ad', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Ad->del($id)) {
			$this->Session->setFlash(__('Ad deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
