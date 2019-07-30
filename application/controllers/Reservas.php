<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reservas extends CI_Controller {
    public $permisos;
    function __construct(){
		parent::__construct();
		$this->load->model('ReservasModel','Reservas');
		$this->load->model('VehiculosModel','Vehiculos');
		$this->load->model('CategoriasModel','Categorias');
       
		
    }

    public function index(){
        $permisos=$this->auth->permisos();	
        $this->load->view('layout/header',array('permisos'=>$permisos));
        $data=array();
        
        //$data['vehiculos'] = $this->Vehiculos->get_list();
        $data['reservas'] = $this->Reservas->get_list();
        $data['categorias'] = $this->Categorias->get_list();
		$this->load->view('reservas/index',$data);
		$this->load->view('layout/footer');
    }

    public function add(){

      $this->form_validation->set_rules('categoria_id', 'Categoría', 'required',
        array(
          'required'      => 'Debe seleccionar una %s.'
        )
      );	  
            
      $this->form_validation->set_rules('vehiculo_id', 'Vehículo', 'required',
        array(
          'required'      => 'Debe seleccionar una %s.'
        )
      );	     
        
      $this->form_validation->set_rules('entrega_fecha', 'Fecha De Entrega', 'required',
        array(
          'required'      => 'Debe ingresar %s.'
        )
      );
        
      $this->form_validation->set_rules('entrega_hora', 'Hora De Entrega', 'required',
        array(
          'required'      => 'Debe ingresar %s.'
        )
      );

      $this->form_validation->set_rules('entrega_lugar', 'Hora De Entrega', 'required',
        array(
          'required'      => 'Debe ingresar %s.'
        )
      );

      $this->form_validation->set_rules('devolucion_fecha', 'Fecha De Devolucion', 'required',
        array(
          'required'      => 'Debe ingresar %s.'
        )
      );
        
      $this->form_validation->set_rules('devolucion_hora', 'Hora De Devolucion', 'required',
        array(
          'required'      => 'Debe ingresar %s.'
        )
      );

      $this->form_validation->set_rules('devolucion_lugar', 'Hora De Devolucion', 'required',
        array(
          'required'      => 'Debe ingresar %s.'
        )
      );

      $this->form_validation->set_rules('nombre', 'Nombre y Apellido', 'required',
        array(
          'required'      => 'Debe ingresar %s.'
        )
      );

      $this->form_validation->set_rules('adelanto', 'Seña', 'required',
        array(
          'required'      => 'Debe ingresar %s.'
        )
      );
      /*
      $this->form_validation->set_rules('observacion', 'Seña', 'required',
        array(
          'required'      => 'Debe ingresar %s.'
        )
      );*/

      

      if ($this->form_validation->run()){
        $result= $this->Reservas->insert($this->input->post());
        $this->session->set_flashdata('msg', 'Nueva Rerseva fue Creada');
        redirect('reservas');

      }else{
        $permisos=$this->auth->permisos();	
        $this->load->view('layout/header',array('permisos'=>$permisos));
        $data=array();
        $data['reserva']=null;
        $data['categorias'] = $this->Categorias->get_list();
        $data['action'] = "reservas/add";
        $this->load->view('reservas/form',$data);
        $data['scripts'][]='js_library/reservas/form.js';
        $this->load->view('layout/footer',$data);
      }
        
    }

  public function edit($id){

    $this->form_validation->set_rules('categoria_id', 'Categoría', 'required',
      array(
        'required'      => 'Debe seleccionar una %s.'
      )
    );	  
          
    $this->form_validation->set_rules('vehiculo_id', 'Vehículo', 'required',
      array(
        'required'      => 'Debe seleccionar una %s.'
      )
    );	     
      
    $this->form_validation->set_rules('entrega_fecha', 'Fecha De Entrega', 'required',
      array(
        'required'      => 'Debe ingresar %s.'
      )
    );
      
    $this->form_validation->set_rules('entrega_hora', 'Hora De Entrega', 'required',
      array(
        'required'      => 'Debe ingresar %s.'
      )
    );

    $this->form_validation->set_rules('entrega_lugar', 'Hora De Entrega', 'required',
      array(
        'required'      => 'Debe ingresar %s.'
      )
    );

    $this->form_validation->set_rules('devolucion_fecha', 'Fecha De Devolucion', 'required',
      array(
        'required'      => 'Debe ingresar %s.'
      )
    );
      
    $this->form_validation->set_rules('devolucion_hora', 'Hora De Devolucion', 'required',
      array(
        'required'      => 'Debe ingresar %s.'
      )
    );

    $this->form_validation->set_rules('devolucion_lugar', 'Hora De Devolucion', 'required',
      array(
        'required'      => 'Debe ingresar %s.'
      )
    );

    $this->form_validation->set_rules('nombre', 'Nombre y Apellido', 'required',
      array(
        'required'      => 'Debe ingresar %s.'
      )
    );

    $this->form_validation->set_rules('adelanto', 'Seña', 'required',
      array(
        'required'      => 'Debe ingresar %s.'
      )
    );

    /*
    $this->form_validation->set_rules('observacion', 'Seña', 'required',
      array(
        'required'      => 'Debe ingresar %s.'
      )
    );*/

    

    if ($this->form_validation->run()){

      $result= $this->Reservas->update($id,$this->input->post());
      $this->session->set_flashdata('msg', 'La Rerseva '.$id.' fue Modificada');
      redirect('reservas');

    }else{

      $permisos=$this->auth->permisos();	
      $this->load->view('layout/header',array('permisos'=>$permisos));
      $data=array();
      $data['reserva']=$this->Reservas->getById($id);
      $data['categorias'] = $this->Categorias->get_list();
      $data['action'] = "reservas/edit/".$id;
      $this->load->view('reservas/form',$data);
      $data['scripts'][]='js_library/reservas/form.js';
      $this->load->view('layout/footer',$data);

    }
      
  }


  public function delete($id=0){

    $this->Reservas->delete($id);
    $this->session->set_flashdata('msg', 'Reserva Eliminada');
    redirect('reservas');
}
}