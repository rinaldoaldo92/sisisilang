<?php 

Class MY_Router extends CI_Router
{
	Function MY_Router() {
	parent::CI_Router();
	}

	function _validate_request($segments) {
	if (file_exists(APPPATH.'controllers/'.$segments[0].EXT)) {
		return $segments;
	}

	if (is_dir(APPATH.'controllers/'.$segments[0])) {
		$this->set_directory($segments[0]);
		$segments = array_slice($segments, 1);

		while(count($segments) > 0 && is_dir(APPPATH.'controllers/'.$this->directory.$segments[0])) {
			$this->set_directory($this->directory.$segments[0]);
			$segments = array_slice($segments, 1);
		}

		if (count($segments) > 0) {
			if (!file_exists(APPPATH.'controllers/'.$this->fetch_directory().$segments[0].EXT)) {
				show_404();
			}
			else {
				$this->set_class($this->default_controller);
				$this->set_method('index');

				if (!file_exists(APPPATH.'controllers/'.$this->fetch_directory().$this->default_controller.EXT)) {
					$this->directory = '';
					return array();
				}
			}

			return $segments;
		}
		show_404($segments[0]);
	}
	}
}

?>