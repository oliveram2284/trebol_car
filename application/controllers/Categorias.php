<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {
    public $permisos;
    function __construct(){
		parent::__construct();
		$this->load->model('CategoriasModel','Categorias');
		//$this->load->model('Aportes');
        //$this->load->model('Asistencias');
       
		
    }

    public function index(){
        $permisos=$this->auth->permisos();	
        $this->load->view('layout/header',array('permisos'=>$permisos));
        $data=array();
        $data['categorias'] = $this->Categorias->get_list();
		$this->load->view('categorias/index',$data);
		$this->load->view('layout/footer');
    }
}