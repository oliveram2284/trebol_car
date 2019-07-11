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

    public function insert($data){

        $this->nombre       = $data['title']; // please read the below note
        $this->descripcion  = $data['content'];
        $this->categoria_padre =0;
        $this->fecha_alta   = time();
        $this->estado       = 0 ;  

        $this->db->insert('categorias', $this);
    }

    public function update($id,$data){

        $this->title        = $data['title'];
        $this->descripcion  = $data['content'];
        $this->fecha_alta   = time();

        $this->db->update('categorias', $this, array('id' => $_id));
    }
}