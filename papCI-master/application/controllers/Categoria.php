<?php
class Categoria extends CI_Controller {
    
    public function c() {
        //VISTA
        frame($this,'categoria/c');
    }
    
    public function cPost() {
        //MODELO
        $nombre = $_POST['nombre'];
        $this->load->model('categoria_model');
        try {
            $this->categoria_model->c($nombre);
            //VISTA
            PRG('Categoría creada','categoria/c','success');
        }
        catch (Exception $e) {
            //VISTA
            PRG($e->getMessage(),'categoria/c','danger');
        }
     }
     
     public function r() {
         //MODELO
         $this->load->model('categoria_model');
         $data['categorias'] = $this->categoria_model->r();
         
         //VISTA
         frame($this,'categoria/r',$data);
     }
}
?>