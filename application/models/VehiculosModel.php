<?php defined('BASEPATH') OR exit('No direct script access allowed');

class VehiculosModel extends CI_Model {
    public $id;
    public $dominio;
    public $tipo;
    public $marca;
    public $modelo;
    public $anio;
    public $estado;

    public function __construct(){
        
        $this->create_tables();
        
    }

    public function create_tables(){
        $this->load->dbforge();    
        $this->dbforge->add_field('id');
        $this->dbforge->add_field(array(  
            'dominio' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'DEFAULT' =>''
            ),         
            'marca' => array(
                'type' => 'VARCHAR',
                'constraint' => '250',
                'DEFAULT' =>''
            ),
            'modelo' => array(
                'type' => 'VARCHAR',
                'constraint' => '250',
                'DEFAULT' =>''
            ),
            'anio' => array(
                'type' => 'VARCHAR',
                'constraint' => '5',
                'DEFAULT' =>''
            ),
            'tipo' => array(
                'type'    => 'ENUM("auto","camioneta","otro")',
                'DEFAULT' => 'auto',
                'null'    => false
            ),
            'descripcion' => array(
                'type' => 'TEXT',
                'DEFAULT' =>NULL
            ),    
            'categoria_id' => array(
                'type' => 'INT',
                'DEFAULT' =>0
            ),
            'fecha_alta' => array(
                'type' => 'DATETIME',
            ),
            'estado' => array(
                'type' => 'INT',
                'constraint' => 2,
                'DEFAULT' =>1
            ),
        ));
        
        $this->dbforge->create_table('vehiculos',true);

        $this->dbforge->add_field('id');
        $this->dbforge->add_field(array(            
            'nombre' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'DEFAULT' =>''
            ),
            'description' => array(
                'type' => 'TEXT',
                'DEFAULT' =>NULL
            ),            
            'estado' => array(
                'type' => 'INT',
                'constraint' => 1,
                'DEFAULT' =>0
            )
        ));
        $this->dbforge->create_table('vechiculo_tipos',true);


        
        $this->dbforge->add_field('id');
        $this->dbforge->add_field(array(            
            'vehiculo_id' => array(
                'type' => 'INT',
                'DEFAULT' =>0,
            ),
            'tarjeta_verde_venc' => array(
                'type' => 'DATE',
            ),
            'seguro' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'DEFAULT' =>''
            ),
            'seguro_venc' => array(
                'type' => 'DATE',
            ), 
            'cambio_aceite_fecha'=>array(
                'type' => 'DATE',
            ),
            'cambio_aceite_km' => array(
                'type' => 'TEXT',
                'DEFAULT' =>''
            ),
            'cambio_aceite_filtro' => array(
                'type' => 'TEXT',
                'DEFAULT' =>''
            ), 
            'cambio_aceite_observacion' => array(
                'type' => 'TEXT',
                'DEFAULT' =>''
            ),             
            'aline_balance_fecha'=>array(
                'type' => 'DATE',
            ),
            'aline_balance_km' => array(
                'type' => 'TEXT',
                'DEFAULT' =>''
            ),
               
            'aline_balance_cambio' => array(
                'type' => 'TEXT',
                'DEFAULT' =>''
            ),
            'aline_balance_observacion' => array(
                'type' => 'TEXT',
                'DEFAULT' =>''
            ),  
            'nivel_agua_fecha' => array(
                'type' => 'TEXT',
                'DEFAULT' =>''
            ),  
            'nivel_agua_observacion' => array(
                'type' => 'TEXT',
                'DEFAULT' =>''
            ),  
            'otros' => array(
                'type' => 'TEXT',
                'DEFAULT' =>''
            ),
            'descripcion' => array(
                'type' => 'TEXT',
                'DEFAULT' =>NULL
            ),            
            'estado' => array(
                'type' => 'INT',
                'constraint' => 1,
                'DEFAULT' =>1
            ),
            'creada' => array(
                'type' => 'DATETIME',
            ),
            'estado' => array(
                'type' => 'INT',
                'constraint' => 2,
                'DEFAULT' =>1
            )
        ));
        $this->dbforge->create_table('vechiculo_ficha_tecnica',true);

        $this->dbforge->add_field('id');
        $this->dbforge->add_field(array(            
            'ficha_id' => array(
                'type' => 'INT',
                'DEFAULT' =>0,
            ),
            'ficha_data' =>  array(
                'type' => 'TEXT',
                'DEFAULT' =>''
            ),
            'creada' => array(
                'type' => 'DATETIME',
            ),
            'estado' => array(
                'type' => 'INT',
                'constraint' => 2,
                'DEFAULT' =>1
            )
        )); 
        $this->dbforge->create_table('vechiculo_ficha_tecnica_log',true);
    }

    public function get_list(){

        $result= $this->db->get('vehiculos');
        return $result->result_array();
    }

    
    public function getById($id=null){
        if(!$id){
            return false;
        }

        $query = $this->db->get_where('vehiculos',array('id'=>$id));
        $result = $query->row_array();
        
        return $result;
    }

    

    public function insert($data){

        $this->categoria_id   = $data['categoria_id']; // please read the below note
        $this->dominio        = $data['dominio'];
        $this->marca          = $data['marca'];
        $this->modelo         = $data['modelo'];
        $this->anio           = $data['anio'];
        $this->tipo           = $data['tipo'];
        $this->fecha_alta     = date('Y-m-d H:i:s');
        $this->estado         = 1 ;  

        $this->db->insert('vehiculos', $this);
    }

    public function update($id,$data){

        $this->categoria_id   = $data['categoria_id']; // please read the below note
        $this->dominio        = $data['dominio'];
        $this->marca          = $data['marca'];
        $this->modelo         = $data['modelo'];
        $this->anio           = $data['anio'];
        $this->tipo           = $data['tipo'];
        //$this->fecha_alta     = date('Y-m-d H:i:s');
        $this->estado         = 1 ;  

        $this->db->update('vehiculos', $this, array('id' => $id));
    }

    public function delete($id=false){
        return $this->db->delete('vehiculos',array('id'=>$id));
    }


    public function getFichaById($id=null){

        if(!$id){
            return false;
        }

        $this->db->select('*');
        $this->db->where(array('f.vehiculo_id'=>$id));
        $query = $this->db->get('vechiculo_ficha_tecnica as f');
        $result = $query->row_array();
        if(is_null($result)){
            $result=array();
            $result['tarjeta_verde_venc']='';
            $result['seguro']='';
            $result['seguro_venc']='';
            $result['cambio_aceite_fecha']='';
            $result['cambio_aceite_km']='';
            $result['cambio_aceite_filtro']=array();
            $result['cambio_aceite_observacion']='';
            $result['aline_balance_fecha']='';
            $result['aline_balance_km']='';
            $result['aline_balance_cambio']=array();
            $result['aline_balance_observacion']='';
            $result['nivel_agua_fecha']='';
            $result['nivel_agua_observacion']='';
            $result['otros']=array();
            return $result;
        }
        $result['cambio_aceite_filtro'] = json_decode($result['cambio_aceite_filtro']);
        $result['aline_balance_cambio'] = json_decode($result['aline_balance_cambio']);
        $result['otros'] = json_decode($result['otros'],true);

        return $result;
    }


    public function ficha_add($vehiculo_id,$data){  
        
        
        $params=array();
        $params['vehiculo_id']=$vehiculo_id;
        $params['tarjeta_verde_venc']=$data['tarjeta_verde_venc'];
        $params['seguro']=$data['seguro'];
        $params['seguro_venc']=$data['seguro_venc'];
        $params['cambio_aceite_fecha']=$data['cambio_aceite_fecha'];
        $params['cambio_aceite_km']=$data['cambio_aceite_km'];
        $params['cambio_aceite_filtro']=json_encode($data['cambio_aceite_filtro'],true);
        $params['cambio_aceite_observacion']=$data['cambio_aceite_observacion'];
        $params['aline_balance_fecha']=$data['aline_balance_fecha'];
        $params['aline_balance_km']=$data['aline_balance_km'];
        $params['aline_balance_cambio']=json_encode($data['aline_balance_cambio'],true);
        $params['aline_balance_observacion']=$data['aline_balance_observacion'];
        $params['nivel_agua_fecha']=$data['nivel_agua_fecha'];
        $params['nivel_agua_observacion']=$data['nivel_agua_observacion'];
        $params['otros']=json_encode($data['otro_item'],    true);


        if(isset($data['id'])){
            $this->db->select('*');
            $this->db->where(array('f.vehiculo_id'=>$data['id']));
            $query = $this->db->get('vechiculo_ficha_tecnica as f');
            $result = $query->row_array();
            $distinct=false;
            foreach ($result as $key => $value) {                
                if(array_key_exists($key,$data)){
                    if($data[$key]!=$value){
                        $distinct=true;
                        break;
                    }
                }
            }
            if($distinct){
                $ficha_data=json_encode($result,true);
                $this->db->insert('vechiculo_ficha_tecnica_log',array('ficha_id'=>$data['id'],'ficha_data'=>$ficha_data,'creada'=>date('Y-m-d H:i:s')));
            }         
            
            $this->db->update('vechiculo_ficha_tecnica', $params);
        }else{


            $paras['estado']=1;
            $params['creada']=date('Y-m-d H:i:s');   
          
            $this->db->update('vechiculo_ficha_tecnica', $paras, array('id' => $data['id']));
        }
      
        
       
        return true;

    }
}