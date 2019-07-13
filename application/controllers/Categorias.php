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
    public function add(){
        $permisos=$this->auth->permisos();	

        $this->form_validation->set_rules('nombre', 'Nombre',
        'required|is_unique[categorias.nombre]',
        array(
                'required'      => 'Debe Ingresar "nombre".',
                'is_unique'     => 'El nombre ya existe.'
        ));

		if ($this->form_validation->run()){
            
			$this->Categorias->insert($this->input->post());
			$this->session->set_flashdata('msg', 'Nueva Categoría Agregado');
			redirect('categorias');
		}else{

            $this->load->view('layout/header',array('permisos'=>$permisos));
            $data=array();
            $data['categoria']=null;
            $data['action'] = "categorias/add";
            $this->load->view('categorias/add',$data);
            $this->load->view('layout/footer');
            
        }
    }


    public function edit($id=0){
        
        $permisos=$this->auth->permisos();	

        $this->form_validation->set_rules('nombre', 'Nombre',
        'required',
        array(
            'required'      => 'Debe Ingresar "nombre".',
        ));

		if ($this->form_validation->run()){
            
			$this->Categorias->update($id,$this->input->post());
			$this->session->set_flashdata('msg', 'Categoría Modificado');
			redirect('categorias');
		}else{

            $this->load->view('layout/header',array('permisos'=>$permisos));
            $data=array();
            $data['categoria']=$this->Categorias->getById($id);
            $data['action'] = "categorias/edit/".$id;
            $this->load->view('categorias/add',$data);
            $this->load->view('layout/footer');
            
        }
        
    }

    public function delete($id=0){

        $this->Categorias->delete($id);
        $this->session->set_flashdata('msg', 'Categoría Elimnada');
        redirect('categorias');
    }
}