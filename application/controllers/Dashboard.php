<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct(){
		parent::__construct();
		$this->load->model('Users');
		$this->load->model('ReservasModel','Reservas');
		//$this->load->model('Asistencias');
		
		
    }
	public function index()
	{
		
		if(!$this->auth->is_logged()){
			redirect('login', 'refresh');
		}
		$permisos=$this->auth->permisos();

		/*$data['totals']=array(
			''=>0,
			'aporte'=>0,
			'asistencias'=>0,
		);
		$data['adherentes_ultimos']= array();
		$data['recent_activities']= array();*/

		$data=array();
		$data['reservas_confirmadas'] = 50;
		$data['reservas_pendientes'] = 50;
		$data['reservas_canceladas'] = 50;
		
		

		$this->load->view('layout/header',array('permisos'=>$permisos));
		$this->load->view('dashboard',$data);
		$this->load->view('layout/footer');
	}

	public function login(){
		
		if($this->input->post('username')!=null){
			$this->auth->login($this->input->post());
			redirect('/', 'refresh');
		}
		
		$this->load->view('login');
	}

	public function logout(){
		$this->auth->logout();
		redirect('/', 'refresh');
	}

	public function error(){
		
	}

	public function consulta()
	{
		$this->load->view('layout/headerCliente');
		$this->load->view('comercios/dash');
		$data['scripts'][]='js_library/comercio/dash.js';
        $this->load->view('layout/footer',$data);
		//$this->load->view('layout/footer');
	}

}
