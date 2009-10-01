<?php
class AdhelperHelper extends AppHelper {

    var $helpers = array('Html', 'UploadPack.Upload');

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
        if ( !empty($data['Ad']['image_file_name']) ) {
            $out.= $this->Upload->image($data, 'Ad.image', 'original', array(
                'url' => $data['Ad']['url'],
            ));
        }

        if (isset($options['cache']) && isset($cacheFile) && isset($expires)) {
            cache('views' . DS . $cacheFile, $out, $expires);
        }
		return $out;
    }

    function random($id, $options = array()) {
        $options = array_merge(array(
            'imageOptions' => array(),
        ), $options);
        $data = $this->requestAction('/ads/get/'.$id.'/random');

        $out = '';
        if ( !empty($data['Ad']['image_file_name']) ) {
            $out.= $this->Upload->image($data, 'Ad.image', 'original', array_merge(array(
                'url' => $data['Ad']['url'],
                ), $options['imageOptions'])
            );
        }
		return $out;
    }

}
?>
