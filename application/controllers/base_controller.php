<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

abstract class Base_controller extends CI_Controller {

    protected $DATA;

    public function __construct() {
        parent::__construct();
        $this->load->config('config');
        $this->DATA = array();
        $this->DATA['base_url'] = $this->config->item('base_url');
        $this->DATA['assets_dir'] = $this->config->item('assets_dir');
        $this->DATA['title'] = $this->config->item('title');
        $this->DATA['css'] = '';
        $this->DATA['js'] = '';
        $this->set_assets();
    }
    
    abstract public function index();

    protected function set_assets() {
        $this->DATA['css'] .= '<link type="text/css" rel="stylesheet" href="'.$this->DATA['base_url'].$this->DATA['assets_dir'].'/global/css/all.css" />';
        $this->DATA['js'] .= '<script type="text/javascript" src="'.$this->DATA['base_url'].$this->DATA['assets_dir'].'/global/js/all.js"></script>';
    }
    
}