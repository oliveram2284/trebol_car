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
        
        //Activar REservas
        $this->Reservas->Activar();

        //Finalizar REservas
        $this->Reservas->Finalizar();

        $data['reservas'] = $this->Reservas->get_list();
        $data['categorias'] = $this->Categorias->get_list();
        $this->load->view('reservas/index',$data);
        $data['scripts'][]='js_library/reservas/index.js';
        $this->load->view('layout/footer',$data);
    }

    public function add(){

      $this->form_validation->set_rules('categoria_id', 'Categoría', 'required',
        array(
          'required'      => 'Debe seleccionar una %s.'
        )
      );	  
            
      /*$this->form_validation->set_rules('vehiculo_id', 'Vehículo', 'required',
        array(
          'required'      => 'Debe seleccionar una %s.'
        )
      );	 */    
        
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

      if ($this->form_validation->run()){

        if($this->Reservas->hayDisponibilidad($this->input->post())){
          
          $result= $this->Reservas->insert($this->input->post());
          $this->session->set_flashdata('msg', 'Nueva Rerseva fue Creada');
          redirect('reservas');

        }else{
          $this->session->set_flashdata('msg', 'La categoria Seleccionada no tiene Vehiculos Disponible para esas Fechas');
        }      

      }

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

  public function edit($id){

    $this->form_validation->set_rules('categoria_id', 'Categoría', 'required',
      array(
        'required'      => 'Debe seleccionar una %s.'
      )
    );	  
          
    /*$this->form_validation->set_rules('vehiculo_id', 'Vehículo', 'required',
      array(
        'required'      => 'Debe seleccionar una %s.'
      )
    );	*/     
      
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


  public function modal_vehiculo($reserva_id){
    $data=array();
    $reserva= $this->Reservas->getById($reserva_id);
    //var_dump($reserva);
    $data['category'] = $this->Categorias->getById($reserva['categoria_id']);
    $data['vehiculos'] = $this->Vehiculos->getByCategory($reserva['categoria_id']);
    $this->load->view('reservas/modal_vehiculo',$data);
  }

  public function setCar($reserva_id){
    
    $result=$this->Reservas->setVehiculo($reserva_id,$this->input->post('vehiculo_id'));
    $this->session->set_flashdata('msg', 'Reserva Confirmada');
    redirect('reservas');

    return false;
  }

  public function confirm($reserva_id){
    $result=$this->Reservas->cambioEstado($reserva_id,3);
    $this->session->set_flashdata('msg', 'Reserva Activa');
    redirect('reservas');
    return false;
  }

  public function stop($reserva_id){
    $result=$this->Reservas->cambioEstado($reserva_id,4);
    $this->session->set_flashdata('msg', 'Reserva Finalizada');
    redirect('reservas');
    return false;
  }


  public function delete($id=0){

    $this->Reservas->delete($id);
    $this->session->set_flashdata('msg', 'Reserva Eliminada');
    redirect('reservas');
  }


  public function consulta(){
    
    $date=str_replace('/','-',$this->input->post('fecha'));
    $date=date('Y-m-d H:i',strtotime($date));
    $categoria_id = (!is_null($this->input->post('categoria_id')))?$this->input->post('categoria_id'):null; //( isset()) ? $this->input->post('category_id') : null;
    
    $data=array();
    $data['result']=$this->Reservas->consultar($date, $categoria_id);

    //var_dump($result);
    //return false;
    $this->load->view('reservas/consulta',$data);
  }


  public function calendario(){

    $eventos=$this->Reservas->calendario($this->input->post());
    echo json_encode(array('status'=>'true','result'=>$eventos));
  }

  
}