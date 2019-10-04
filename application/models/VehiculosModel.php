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



        if (!$this->db->field_exists('rto_venc', 'vechiculo_ficha_tecnica')){
            $fields = array(
                'rto_venc'      => array('type' => 'VARCHAR','constraint' => '200','DEFAULT' =>'','AFTER'=>'seguro_venc'),            
                'codigo_radio'  => array('type' => 'VARCHAR','constraint' => '200','DEFAULT' =>'','AFTER'=>'rto_venc'),            
            );
            $this->dbforge->add_column('vechiculo_ficha_tecnica', $fields); 
        }

        if (!$this->db->field_exists('matafuego_venc', 'vechiculo_ficha_tecnica')){
            $fields = array(
                'matafuego_venc'      => array('type' => 'VARCHAR','constraint' => '200','DEFAULT' =>'','AFTER'=>'rto_venc'),    
            );
            $this->dbforge->add_column('vechiculo_ficha_tecnica', $fields); 
        }

        if (!$this->db->field_exists('otro_arreglo_fecha', 'vechiculo_ficha_tecnica')){
            $fields = array(
                'otro_arreglo_fecha'        => array('type' => 'DATE','AFTER'=>'otros'),   
                'otro_arreglo_observacion'  => array('type' => 'TEXT','DEFAULT' =>'','AFTER'=>'otro_arreglo_fecha'),     
            );
            $this->dbforge->add_column('vechiculo_ficha_tecnica', $fields); 
        }

        

        
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
        $data=array(
        'id'             => $id,
        'categoria_id'   => $data['categoria_id'],
        'dominio'        => $data['dominio'],
        'marca'          => $data['marca'],
        'modelo'         => $data['modelo'],
        'anio'           => $data['anio'],
        'tipo'           => $data['tipo'],
        );
       
        $this->db->update('vehiculos', $data, array('id' => $id));
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
            $result['rto_venc']='';
            $result['matafuego_venc']='';
            
            $result['codigo_radio']='';
            
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
            $result['otro_arreglo_fecha']='';
            $result['otro_arreglo_observacion']='';
            return $result;
        }
      // var_dump($result);
        $result['cambio_aceite_filtro'] = ($result['cambio_aceite_filtro']!='null')?json_decode($result['cambio_aceite_filtro']):array();
        $result['aline_balance_cambio'] = ($result['aline_balance_cambio']!='null')?json_decode($result['aline_balance_cambio']):array();
        $result['otros'] = ($result['otros']!='')? json_decode($result['otros'],true):array();

        return $result;
    }


    public function ficha_add($vehiculo_id,$data){  
        
        
        $params=array();
        $params['vehiculo_id']=$vehiculo_id;
        $params['tarjeta_verde_venc']=$data['tarjeta_verde_venc'];
        $params['seguro']=$data['seguro'];
        $params['seguro_venc']=$data['seguro_venc'];
        $params['rto_venc']=$data['rto_venc'];
        $params['matafuego_venc']=$data['matafuego_venc'];
        $params['codigo_radio']=$data['codigo_radio'];
        $params['seguro_venc']=$data['seguro_venc'];
        $params['cambio_aceite_fecha']=$data['cambio_aceite_fecha'];
        $params['cambio_aceite_km']=$data['cambio_aceite_km'];
        if(isset($data['cambio_aceite_filtro'])){
            $params['cambio_aceite_filtro']=json_encode($data['cambio_aceite_filtro'],true);
        }
        $params['cambio_aceite_observacion']=$data['cambio_aceite_observacion'];
        $params['aline_balance_fecha']=$data['aline_balance_fecha'];
        $params['aline_balance_km']=$data['aline_balance_km'];

        if(isset($data['aline_balance_cambio'])){
            $params['aline_balance_cambio']=json_encode($data['aline_balance_cambio'],true);
        }
        $params['aline_balance_observacion']=$data['aline_balance_observacion'];
        $params['nivel_agua_fecha']=$data['nivel_agua_fecha'];
        $params['nivel_agua_observacion']=$data['nivel_agua_observacion'];
        if(isset($data['otro_item'])){
            $params['otros']=json_encode($data['otro_item'],    true);
        }

        $params['otro_arreglo_fecha']=$data['otro_arreglo_fecha'];
        $params['otro_arreglo_observacion']=$data['otro_arreglo_observacion'];        
       
      
        if(isset($data['id']) && $data['id']!=''){
           
            $this->db->select('*');
            $this->db->where(array('f.id'=>$data['id']));
            $query = $this->db->get('vechiculo_ficha_tecnica as f');
           
            $result = $query->row_array();
            $distinct=false;
            if(!empty($result)){
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
                
                
            }
            
            $this->db->update('vechiculo_ficha_tecnica', $params, array('id' => $data['id']));
        }else{


            $paras['estado']=1;
            $params['creada']=date('Y-m-d H:i:s');   
            
            $this->db->insert('vechiculo_ficha_tecnica', $params);
        }
      
        return true;

    }


    public function getByCategory($categoria_id){

        if(!$categoria_id){
            return false;
        }

        $query = $this->db->get_where('vehiculos',array('categoria_id'=>$categoria_id));
        $result = $query->result_array();
        
        return $result;
    }
}