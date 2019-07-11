<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Vehiculos extends CI_Controller {
    public $permisos;
    function __construct(){
		parent::__construct();
		$this->load->model('VehiculosModel','Vehiculos');
		$this->load->model('CategoriasModel','Categorias');
       
		
    }

    public function index(){
        $permisos=$this->auth->permisos();	
        $this->load->view('layout/header',array('permisos'=>$permisos));
        $data=array();
        $data['vehiculos'] = $this->Vehiculos->get_list();
		$this->load->view('vehiculos/index',$data);
		$this->load->view('layout/footer');
    }


    public function add(){
        
        $permisos=$this->auth->permisos();	

        $this->form_validation->set_rules('dominio', 'Dominio',
        'required|is_unique[vehiculos.dominio]',
        array(
                'required'      => 'Debe Ingresar "Dominio".',
                'is_unique'     => 'El Dominio ya existe.'
        ));
        $this->form_validation->set_rules('marca', 'Marca',
        'required',
        array(
            'required'      => 'Debe Ingresar "Marca".',
        ));
        $this->form_validation->set_rules('modelo', 'Nombre Modelo',
        'required',
            array(
                'required'      => 'Debe Ingresar "Nombre Modelo".',
            )
        );
        $this->form_validation->set_rules('anio', 'Año Modelo',
        'required',
            array(
                'required'      => 'Debe Ingresar "Año Modelo".',
            )
        );	
		$this->form_validation->set_rules('categoria_id', 'Categoría', 'required',
		array(
			'required'      => 'Debe seleccionar una %s.'
        ));	        
        $this->form_validation->set_rules('tipo', 'Tipo', 'required',
		array(
			'required'      => 'Debe seleccionar un %s.'
		));	


		if ($this->form_validation->run()){
            
			$this->Vehiculos->insert($this->input->post());
			$this->session->set_flashdata('msg', 'Nuevo Vehículo Agregado');
			redirect('vehiculos');
		}else{

            $this->load->view('layout/header',array('permisos'=>$permisos));
            $data=array();
            $data['vehiculo']=null;
            $data['categorias'] = $this->Categorias->get_list();
            $data['action'] = "vehiculos/add";
            $this->load->view('vehiculos/add',$data);
            $this->load->view('layout/footer');
            
        }
        
    }

    public function edit($id=0){
        
        $permisos=$this->auth->permisos();	

        $this->form_validation->set_rules('dominio', 'Dominio',
        'required',
        array(
            'required'      => 'Debe Ingresar "Dominio".',
        ));
        $this->form_validation->set_rules('marca', 'Marca',
        'required',
        array(
            'required'      => 'Debe Ingresar "Marca".',
        ));
        $this->form_validation->set_rules('modelo', 'Nombre Modelo',
        'required',
            array(
                'required'      => 'Debe Ingresar "Nombre Modelo".',
            )
        );
        $this->form_validation->set_rules('anio', 'Año Modelo',
        'required',
            array(
                'required'      => 'Debe Ingresar "Año Modelo".',
            )
        );	
		$this->form_validation->set_rules('categoria_id', 'Categoría', 'required',
		array(
			'required'      => 'Debe seleccionar una %s.'
        ));	        
        $this->form_validation->set_rules('tipo', 'Tipo', 'required',
		array(
			'required'      => 'Debe seleccionar un %s.'
		));	


		if ($this->form_validation->run()){
            
			$this->Vehiculos->update($id,$this->input->post());
			$this->session->set_flashdata('msg', 'Nuevo Vehículo Agregado');
			redirect('vehiculos');
		}else{

            $this->load->view('layout/header',array('permisos'=>$permisos));
            $data=array();
            $data['vehiculo']=$this->Vehiculos->getById($id);
            $data['categorias'] = $this->Categorias->get_list();
            $data['action'] = "vehiculos/edit/".$id;
            $this->load->view('vehiculos/add',$data);
            $this->load->view('layout/footer');
            
        }
        
    }

    public function delete($id=0){
        $this->Vehiculos->delete($id);
        $this->session->set_flashdata('msg', 'Vehículo Elimnado');
        redirect('vehiculos');
    }
}