<?php
class Home extends CI_Controller {
    public function index() {
        $persona= isset($_SESSION['persona']) ? $_SESSION['persona']: null;
        $data['rol']='anon';
        if ($persona != null){
            $data['rol'] = (($persona->nombre == "admin")? "admin": "auth");
        }
        frame($this,'home/index', $data);
    }
}
?>