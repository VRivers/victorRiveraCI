<?php

class Persona extends CI_Controller
{

    public function u()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        $this->load->model('persona_model');
        $this->load->model('pais_model');
        $this->load->model('aficion_model');

        $data['persona'] = $this->persona_model->getPersonaById($id);
        $data['paises'] = $this->pais_model->getPaises();
        $data['aficiones'] = $this->aficion_model->getAficiones();

        frame($this, 'persona/u', $data);
    }

    public function uPost()
    {
        $this->load->model('persona_model');

        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
        $idPaisNace = isset($_POST['idPaisNace']) ? $_POST['idPaisNace'] : null;
        $idPaisReside = isset($_POST['idPaisReside']) ? $_POST['idPaisReside'] : null;
        $idsAficionGusta = isset($_POST['idsAficionGusta']) ? $_POST['idsAficionGusta'] : [];
        $idsAficionOdia = isset($_POST['idsAficionOdia']) ? $_POST['idsAficionOdia'] : [];

        try {
            $this->persona_model->actualizarPersona($id, $nombre, $idPaisNace, $idPaisReside, $idsAficionGusta, $idsAficionOdia);
            redirect(base_url() . 'persona/r');
        } catch (Exception $e) {
            session_start();
            $_SESSION['_msg']['texto'] = $e->getMessage();
            $_SESSION['_msg']['uri'] = 'persona/c';
            redirect(base_url() . 'msg');
        }
    }

    public function c()
    {
        frame($this, 'persona/c');
    }

    public function cPost()
    {
        $loginname = isset($_POST['loginname']) ? $_POST['loginname'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
        $altura = isset($_POST['altura']) ? $_POST['altura'] : null;
        $foto = isset($_FILES['foto']) ? ($_FILES['foto']) : null;
        $fechaNacimiento = isset($_POST['fechaNacimiento']) ? $_POST['fechaNacimiento'] : null;
        $pais = isset($_POST['pais']) ? $_POST['pais'] : null;
       
        try {
          
            $this->load->model('persona_model');
            $id = $this->persona_model->c($loginname, $password,$nombre, $altura, $fechaNacimiento, $pais);
            
            if ($foto != null && $foto['tmp_name']!=null) {
                $extension = explode('.', $foto['name'])[1];
                $carpeta = "assets/img/upload/";
                if (!copy($foto['tmp_name'], $carpeta . "persona-$id." . $extension)) {
                    throw new Exception("Error al copiar la foto ". $foto['name']. " a ". $carpeta . "persona-$id." . $extension);
                }
            }

            PRG('Usuario creado correctamente.', 'home', 'success');
        } catch (Exception $e) {
            PRG($e->getMessage(), 'persona/c');
        }
    }
    
    

    public function r()
    {
        $this->load->model('persona_model');
        $datos['personas'] = $this->persona_model->getPersonas();
        frame($this, 'persona/r', $datos);
    }
}
?>