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
        $data['categorias'] = $this->Categorias->get_list();
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

    public function ficha($id){
 

        
        $permisos=$this->auth->permisos();	
        $this->load->view('layout/header',array('permisos'=>$permisos));
        $data=array();
        $data['vehiculo_id'] = $id;
        $data['vehiculo'] = $this->Vehiculos->getById($id);
        $data['ficha']    = $this->Vehiculos->getFichaById($id);
        $data['action']   = "vehiculos/ficha_save/".$id;
        $this->load->view('vehiculos/ficha',$data);
        $data['scripts'][]='js_library/vehiculos/ficha.js';
        $this->load->view('layout/footer',$data);
       
    }

   

    public function ficha_save($id){
        $result = $this->Vehiculos->ficha_add($id,$this->input->post()); 
        $this->session->set_flashdata('msg', 'Se ha creado una nueva ficha Técnica');
        redirect('vehiculos');
    }


    public function getByCategory($categoria_id){        
        $data=array();
        $vehiculos = $this->Vehiculos->getByCategory($categoria_id);
        echo json_encode(array('status'=>'true','result'=>$vehiculos));
    }

    public function get_ficha_historial($ficha_id){
        $historial = $this->Vehiculos->getFichaHistorial($ficha_id);
        $result=array();
        $log_aceite=array();
        $log_alineacion=array();
        $log_agua=array();
        $log_otros=array();
        foreach ($historial as $key => $value) {           
           //var_dump($value);          

            if(isset($value['ficha']['cambio_aceite_fecha'])){
                $existe_item=$this->searchArrayKeyVal('fecha',$value['ficha']['cambio_aceite_fecha'],$log_aceite);
                if($existe_item==false){
                    $log_aceite[]=array(
                        'fecha'=>$value['ficha']['cambio_aceite_fecha'],
                        'km'=>$value['ficha']['cambio_aceite_km'],
                        'recambio'=>implode(',',$value['ficha']['cambio_aceite_filtro']),
                        'observacion'=>$value['ficha']['cambio_aceite_observacion'],
                    );      
                }
                       
            }

            if(isset($value['ficha']['aline_balance_fecha'])){
                $existe_item=$this->searchArrayKeyVal('fecha',$value['ficha']['aline_balance_fecha'],$log_alineacion);
                if($existe_item==false){
                    $log_alineacion[]=array(
                        'fecha'=>$value['ficha']['aline_balance_fecha'],
                        'km'=>$value['ficha']['aline_balance_km'],
                        'recambio'=>implode(',',$value['ficha']['aline_balance_cambio']),
                        'observacion'=>$value['ficha']['aline_balance_observacion'],
                    );      
                }
                       
            }

            if(isset($value['ficha']['nivel_agua_fecha'])){
                $existe_item=$this->searchArrayKeyVal('fecha',$value['ficha']['nivel_agua_fecha'],$log_agua);
                if($existe_item==false && $value['ficha']['nivel_agua_fecha']!='' ){
                    $log_agua[]=array(
                        'fecha'=>$value['ficha']['nivel_agua_fecha'],
                        'observacion'=>$value['ficha']['nivel_agua_observacion'],
                    );      
                }                       
            }
            if(isset($value['ficha']['otro_arreglo_fecha'])){
                $existe_item=$this->searchArrayKeyVal('fecha',$value['ficha']['otro_arreglo_fecha'],$log_otros);
                if($existe_item==false && $value['ficha']['otro_arreglo_fecha']!=''){
                    $log_otros[]=array(
                        'fecha'=>$value['ficha']['nivel_agua_fecha'],
                        'observacion'=>$value['ficha']['nivel_agua_observacion'],
                    );      
                }                       
            }
           

        }
        $historial_data=array(
            'log_aceite'=>$log_aceite,
            'log_alineacion'=>$log_alineacion,
            'log_agua'=>$log_agua,
            'log_otros'=>$log_otros,
        );
        //var_dump($historial_data);
        $output= $this->load->view('vehiculos/ficha_historial',array('historial'=>$historial_data));
        echo json_encode(array('status'=>'true','html'=>$output));
    }


    function searchArrayKeyVal($sKey, $id, $array) {
        foreach ($array as $key => $val) {
            if ($val[$sKey] == $id) {
               
                return true;
            }
        }
        return false;
     }
}