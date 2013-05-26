<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once(APPPATH.'controllers/base_controller.php');

class Search extends Base_controller {
    
    public function index() {
        $this->load->view('view_header', $this->DATA);
        $this->load->view('view_product_search_result', $this->DATA);
        $this->load->view('view_footer', $this->DATA);
    }
    
}