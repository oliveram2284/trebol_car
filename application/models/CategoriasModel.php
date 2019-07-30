<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CategoriasModel extends CI_Model {
    public $id;
    public $nombre;
    public $descripcion;
    public $categoria_padre;
    public $fecha_alta;
    public $estado;

    public function __construct(){
        
        $this->create_tables();
        
    }

    public function create_tables(){
        $this->load->dbforge();    
        $this->dbforge->add_field('id');
        $this->dbforge->add_field(array(           
            'nombre' => array(
                'type' => 'VARCHAR',
                'constraint' => '250',
                'DEFAULT' =>''
            ),
            'descripcion' => array(
                'type' => 'TEXT',
                'DEFAULT' =>NULL
            ),    
            'categoria_padre' => array(
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
        
        $this->dbforge->create_table('categorias',true);
    }

    public function get_list(){
        $result= $this->db->get('categorias');
        return $result->result_array();
    }


    public function getById($id=null){
        if(!$id){
            return false;
        }

        $query = $this->db->get_where('categorias',array('id'=>$id));
        $result = $query->row_array();
        
        return $result;
    }

    public function insert($data){

        $this->nombre       = $data['nombre']; // please read the below note
        $this->descripcion  = (isset($data['descripcion']))?$data['descripcion']:'';
        $this->categoria_padre =0;
        $this->fecha_alta   = date('Y-m-d H:i:s');;
        $this->estado       = 1 ;  

        $this->db->insert('categorias', $this);
    }

    public function update($id,$data){
        $data= array(
            'id'       => $id,
            'nombre'       => $data['nombre'],
            'descripcion'  => (isset($data['descripcion']))?$data['descripcion']:'',            
        );
        
        $this->db->update('categorias', $data, array('id' => $id));
        
    }

    public function delete($id=false){
        return $this->db->delete('categorias',array('id'=>$id));
    }
}