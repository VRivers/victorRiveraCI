<?php
class Categoria_model extends CI_Model {
    
    public function c($nombre) {
        
        if (R::findOne('categoria','nombre=?',[$nombre]) != null) {
            throw new Exception('Categoría ya existente');            
        }
        
        $categoria = R::dispense('categoria');
        $categoria->nombre = $nombre;
        R::store($categoria);
    }
    
    public function r() {
        return  R::findAll('categoria');
    }
    
}
?>