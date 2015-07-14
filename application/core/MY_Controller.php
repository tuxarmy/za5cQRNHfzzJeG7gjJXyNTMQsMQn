<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	protected $data = array();
	function __construct(){
		parent::__construct();
		$this->data['page_title'] = 'Accost';
	}

	protected function render($view = NULL, $template = 'master'){
		if ($template == 'json' || $this->input->is_ajax_request()) {
			header('Content-Type: application/json');
			echo json_encode($this->data);
		}else{
			$this->data['view_content'] = (is_null($view)) ? '' : $this->load->view($view, $this->data, TRUE);
			$this->load->view('templates/'. $template, $this->data);	
		}
	}
}

class Admin_Controller extends MY_Controller {
	function __construct(){
		parent::__construct();
		$this->data['page_title'] = 'Accost - Dashboard';
	}
	protected function render($view = NULL, $template = 'admin_master'){
		parent::render($view, $template);
	}
}

class Public_Controller extends MY_Controller {
	function __construct(){
		parent::__construct();
	}
}