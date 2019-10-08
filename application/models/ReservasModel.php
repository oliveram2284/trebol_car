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


        if (!$this->db->field_exists('telefono', 'reservas')){
            $fields = array(
                'telefono'      => array('type' => 'VARCHAR','constraint' => '150','DEFAULT' =>'','AFTER'=>'nombre'),        
            );
            $this->dbforge->add_column('reservas', $fields); 
        }
        if (!$this->db->field_exists('dominio', 'reservas')){
            $fields = array(
                'dominio'      => array('type' => 'VARCHAR','constraint' => '50','DEFAULT' =>'','AFTER'=>'vehiculo_id'),        
            );
            $this->dbforge->add_column('reservas', $fields); 
        }
    }

    public function get_list(){
        $this->db->select('reservas.*,categorias.nombre as categoria, vehiculos.dominio as "vehiculos_dominio",vehiculos.marca,vehiculos.modelo');
        $this->db->select("IF (  ( CONCAT(`reservas`.`entrega_fecha`,' ', `reservas`.`entrega_hora` ) <= NOW() )  ,1,0) AS curso");
        $this->db->select("IF (  ( CONCAT(`reservas`.`devolucion_fecha`,' ', `reservas`.`devolucion_hora` ) < NOW() )  ,1,0) AS terminado");
        $this->db->from('reservas');
        $this->db->join('categorias', 'categorias.id = reservas.categoria_id');
        $this->db->join('vehiculos' , 'vehiculos.id  = reservas.vehiculo_id' , 'left');
        $this->db->where("reservas.estado !=",'2');
        $this->db->where("reservas.devolucion_fecha>NOW()");
        $this->db->order_by("reservas.entrega_fecha",'ASC');
        $result= $this->db->get();
        //echo $this->db->last_query();
        //var_dump($result->result_array());
        return $result->result_array();
    }

    public function getById($id){
       
        $result= $this->db->get_where('reservas',array('id'=>$id));
        return $result->row_array();
    }

    public function insert($data){
        $param['categoria_id']= $data['categoria_id']; // please read the below note
        $param['vehiculo_id']= $data['vehiculo_id'];
        $param['dominio']= $data['dominio'];
        $param['entrega_fecha']= $data['entrega_fecha'];
        $param['entrega_hora']= $data['entrega_hora'];
        $param['entrega_lugar']= $data['entrega_lugar'];
        $param['devolucion_fecha']= $data['devolucion_fecha'];
        $param['devolucion_hora']= $data['devolucion_hora'];
        $param['devolucion_lugar']= $data['devolucion_lugar'];
        $param['nombre']= $data['nombre'];
        $param['telefono']= $data['telefono'];
        $param['adelanto']= $data['adelanto'];
        $param['monto']= 0;
        $param['observacion']= isset($data['observacion'])?$data['observacion']:'';
        $param['fecha_creacion']= date('Y-m-d H:i:s');
        $param['estado']= 1 ;  
        /*var_dump($param);
        die("asd");*/
        $this->db->insert('reservas', $param);

        return $this->db->insert_id();
    }


    public function update($id,$data){

        $last_reserva=$this->getById($id);
        $data=array(
            'id'      => $id, // please read the below note
            'categoria_id'      => $data['categoria_id'], // please read the below note
            'vehiculo_id'       => $data['vehiculo_id'],
            'dominio'           => $data['dominio'],
            'entrega_fecha'     => $data['entrega_fecha'],
            'entrega_hora'      => $data['entrega_hora'],
            'entrega_lugar'     => $data['entrega_lugar'],
            'devolucion_fecha'  => $data['devolucion_fecha'],
            'devolucion_hora'   => $data['devolucion_hora'],
            'devolucion_lugar'  => $data['devolucion_lugar'],
            'nombre'            => $data['nombre'],
            'telefono'          => $data['telefono'],
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

    public function setVehiculo($id,$vehiculo_id=0){

        $last_reserva=$this->getById($id);

        $this->db->update('reservas', array('vehiculo_id'=>$vehiculo_id,'estado'=>1), array('id' => $id));    
        
        $reserva_log= array(
            'reserva_id'=>$id,
            'reserva'=>json_encode($last_reserva),
            'fecha_creacion'=>date('Y-m-d H:i:s'),
            'estado'=>1,
        );

        $this->db->insert('reservas_log',$reserva_log); 

        return;
    }

    public function cambioEstado($id, $estado=0){

        $last_reserva=$this->getById($id);

        $this->db->update('reservas', array('estado'=>$estado), array('id' => $id));    
        
        $reserva_log= array(
            'reserva_id'=>$id,
            'reserva'=>json_encode($last_reserva),
            'fecha_creacion'=>date('Y-m-d H:i:s'),
            'estado'=>1,
        );
        $this->db->insert('reservas_log',$reserva_log); 

        return;
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


    public function Activar(){
        
        $sql="UPDATE reservas  SET estado=3 WHERE CONCAT(entrega_fecha,' ',entrega_hora) <=NOW()   AND estado=1;";
        $result= $this->db->query($sql);
        return;

    }


    public function Finalizar(){
        
        $sql="UPDATE reservas  SET estado=4 WHERE CONCAT(devolucion_fecha,' ',devolucion_hora) <=NOW()   AND estado=3;";
        $result= $this->db->query($sql);
        
        return;

    }


    public function consultar($date,$categoria_id=null){

        
        if($categoria_id==''){
            $this->db->select("id,nombre, (SELECT count(id) FROM vehiculos WHERE vehiculos.categoria_id=categorias.id) AS vehiculos");
            $query = $this->db->get('categorias');

            
            $reservas=array();
            foreach ($query->result_array() as $key => $category) {
               
                $temp=$category;

                $where_categoria=" AND reservas.categoria_id=".$category['id']." ";
                $sql=" SELECT
                       COUNT(*) AS reservas                   
                       FROM reservas 
                       where CONCAT(entrega_fecha,' ',entrega_hora)>='".$date."' $where_categoria
                       GROUP BY categoria_id 
                       order by categoria_id;";
                $result= $this->db->query($sql);
                $result= $result->row_array();
               
                $result= (!is_null($result))?(int)$result['reservas']:0;
                $temp['reservas']=$result;
                $reservas[]=$temp;
            }

            return $reservas;
        }else{

            $this->db->select("id,nombre, (SELECT count(id) FROM vehiculos WHERE vehiculos.categoria_id=categorias.id) AS vehiculos");
            $this->db->where('id',$categoria_id);
            $query = $this->db->get('categorias');

            
            $reservas=array();
            foreach ($query->result_array() as $key => $category) {
               
                $temp=$category;

                $where_categoria=" AND reservas.categoria_id=".$category['id']." ";
                $sql=" SELECT
                       COUNT(*) AS reservas                   
                       FROM reservas 
                       where CONCAT(entrega_fecha,' ',entrega_hora)>='".$date."' $where_categoria
                       GROUP BY categoria_id 
                       order by categoria_id;";
                $result= $this->db->query($sql);
                $result= $result->row_array();
               
                $result= (!is_null($result))?(int)$result['reservas']:0;
                $temp['reservas']=$result;
                $reservas[]=$temp;
            }

            return $reservas;
        }
    }



    public function calendario($params){
        /*var_dump($params);
        die("fin");*/
        $start=$params['start'];
        $end=$params['end'];
        $sql=" SELECT *                   
                FROM reservas 
                where entrega_fecha>='".$start."' AND devolucion_fecha<='".$end."'
                order by entrega_fecha;";
        $query= $this->db->query($sql);      
        $results= $query->result_array();

        return $results;
    }


    
}
