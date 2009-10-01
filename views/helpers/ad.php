<?php
class AdHelper extends AppHelper {

    var $helpers = array('Html');

    function show($id, $options = array()) {
        $options = array_merge(array(
            'cache' => true,
        ), $options);
        $options['id'] = $id;

		if (isset($options['cache'])) {
			$expires = '+1 day';

			if ($options['cache'] !== true) {
				$expires = $options['cache'];
			}

			if ($expires) {
				$cacheFile = 'ad_' . $id;
				$cache = cache('views' . DS . $cacheFile, null, $expires);

				if (is_string($cache)) {
					return $cache;
				}
			}
		}

        $data = $this->requestAction('/ads/get/'.$id);

        // $view = ClassRegistry::getObject('view');
        // echo $view->element('content_cached', $options);

        $out = '';
        if ( !empty($data['Ad']['src']['path']) ) {
            $out.= $this->Html->image($data['Ad']['src']['path'], array(
                'url' => $data['Ad']['url'],
            ));
        }

        if (isset($options['cache']) && isset($cacheFile) && isset($expires)) {
            cache('views' . DS . $cacheFile, $out, $expires);
        }
		return $out;
    }

}
?>
