<?php 
class ReservasModel extends CI_Model {
    public $id;
    public $categoria_id;
    public $vehiculo_id;
    public $entrega_fecha;
    public $entrega_hora;    
    public $entrega_lugar;
    public $devolucion_fecha;
    public $devolucion_hora;
    public $devolucion_lugar;
    public $nombre;
    public $adelanto;
    public $monto;
    public $fecha_creacion;
    public $estado; //estado numerico: 0:nada, 1:nuevo,2:eliminado, 3:confirmado 

    public function __construct(){
        
        $this->create_tables();
        
    }

    public function create_tables(){
        $this->load->dbforge();    

        $this->dbforge->add_field('id');
        $this->dbforge->add_field(array(  
            
            'categoria_id' => array(
                'type' => 'INT',
                'DEFAULT' =>0
            ),

            'vehiculo_id' => array(
                'type' => 'INT',
                'DEFAULT' =>0
            ),

            'entrega_fecha' => array(
                'type' => 'DATE',
                'DEFAULT' =>null
            ),
            'entrega_hora' => array(
                'type' => 'TIME',
                'DEFAULT' =>null
            ),

            'entrega_lugar' => array(
                'type' => 'VARCHAR',
                'constraint' => '250',
                'DEFAULT' =>''
            ),
            'entrega    _lugar' => array(
                'type' => 'VARCHAR',
                'constraint' => '250',
                'DEFAULT' =>''
            ),


            'devolucion_fecha' => array(
                'type' => 'DATE',
                'DEFAULT' =>null
            ),

            'devolucion_hora' => array(
                'type' => 'TIME',
                'DEFAULT' =>null
            ),

            'devolucion_lugar' => array(
                'type' => 'VARCHAR',
                'constraint' => '250',
                'DEFAULT' =>''
            ),

            'nombre' => array(
                'type' => 'VARCHAR',
                'constraint' => '350',
                'DEFAULT' =>''
            ),
            'adelanto' => array(
                'type' => 'DECIMAL',
                'constraint' => '15,4',
                'DEFAULT' =>'0'
            ),
            'monto' => array(
                'type' => 'DECIMAL',
                'constraint' => '15,4',
                'DEFAULT' =>'0'
            ),
            'observacion' => array(
                'type' => 'TEXT',
                'DEFAULT' =>NULL
            ),    
            'categoria_padre' => array(
                'type' => 'INT',
                'DEFAULT' =>0
            ),
            'fecha_creacion' => array(
                'type' => 'DATETIME',
            ),
            'estado' => array(
                'type' => 'INT',
                'constraint' => 2,
                'DEFAULT' =>1
            ),
        ));


        $this->dbforge->create_table('reservas',true);


        $this->dbforge->add_field('id');
        $this->dbforge->add_field(array(  
            
            'reserva_id' => array(
                'type' => 'INT',
                'DEFAULT' =>0
            ),
            'reserva' => array(
                'type' =>'TEXT',
                'DEFAULT' =>null
            ),
            'fecha_creacion' => array(
                'type' => 'DATETIME',
            ),
            'estado' => array(
                'type' => 'INT',
                'constraint' => 2,
                'DEFAULT' =>1
            ),
        ));


        $this->dbforge->create_table('reservas_log',true);
    }

    public function get_list(){
        $this->db->select('reservas.*,categorias.nombre as categoria, vehiculos.dominio,vehiculos.marca,vehiculos.modelo,');
        $this->db->from('reservas');
        $this->db->join('categorias', 'categorias.id = reservas.categoria_id');
        $this->db->join('vehiculos' , 'vehiculos.id  = reservas.vehiculo_id');
        $this->db->where("reservas.estado !=",'2');
        $result= $this->db->get();
        return $result->result_array();
    }

    public function getById($id){
       
        $result= $this->db->get_where('reservas',array('id'=>$id));
        return $result->row_array();
    }

    public function insert($data){
        $this->categoria_id      = $data['categoria_id']; // please read the below note
        $this->vehiculo_id       = $data['vehiculo_id'];
        $this->entrega_fecha     = $data['entrega_fecha'];
        $this->entrega_hora      = $data['entrega_hora'];
        $this->entrega_lugar     = $data['entrega_lugar'];
        $this->devolucion_fecha  = $data['devolucion_fecha'];
        $this->devolucion_hora   = $data['devolucion_hora'];
        $this->devolucion_lugar  = $data['devolucion_lugar'];
        $this->nombre            = $data['nombre'];
        $this->adelanto          = $data['adelanto'];
        $this->monto             = 0;
        $this->observacion       = isset($data['observacion'])?$data['observation']:'';
        $this->fecha_creacion    = date('Y-m-d H:i:s');
        $this->estado            = 1 ;  

        $this->db->insert('reservas', $this);

        return $this->db->insert_id();
    }


    public function update($id,$data){

        $last_reserva=$this->getById($id);
        $data=array(
            'id'      => $id, // please read the below note
            'categoria_id'      => $data['categoria_id'], // please read the below note
            'vehiculo_id'       => $data['vehiculo_id'],
            'entrega_fecha'     => $data['entrega_fecha'],
            'entrega_hora'      => $data['entrega_hora'],
            'entrega_lugar'     => $data['entrega_lugar'],
            'devolucion_fecha'  => $data['devolucion_fecha'],
            'devolucion_hora'   => $data['devolucion_hora'],
            'devolucion_lugar'  => $data['devolucion_lugar'],
            'nombre'            => $data['nombre'],
            'adelanto'          => $data['adelanto'],
            'observacion'       => isset($data['observacion'])?$data['observacion']:'',
        );

        $this->db->update('reservas', $data, array('id' => $id));
        
        $reserva_log= array(
            'reserva_id'=>$id,
            'reserva'=>json_encode($last_reserva),
            'fecha_creacion'=>date('Y-m-d H:i:s'),
            'estado'=>1,
        );
        $this->db->insert('reservas_log',$reserva_log);        
    }

    public function delete($id=false){
        $last_reserva=$this->getById($id);
        $data=array(
            'estado'      => 2,
        );
        return $this->db->update('reservas',$data,array('id'=>$id));
       
        $reserva_log= array(
            'reserva_id'=>$id,
            'reserva'=>json_encode($last_reserva),
            'fecha_creacion'=>date('Y-m-d H:i:s'),
            'estado'=>1,
        );
        $this->db->insert('reservas_log',$reserva_log);       
    }
}
