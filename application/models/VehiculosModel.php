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
}