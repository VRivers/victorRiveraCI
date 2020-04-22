<?php

class Anonymous extends CI_Controller
{

    public function init()
    {
        $data['vacia'] = true;
        $this->load->model('persona_model');
        if (sizeof(R::inspect()) != 0) {
            $data['vacia'] = false;
        }
        frame($this, '_hdu/anonymous/init', $data);
    }

    public function initPost()
    {
        $pwd = isset($_POST['pwd']) ? $_POST['pwd'] : null;
        $data['msg'] = 'Password incorrecta';
        if ($pwd == null || password_verify($pwd, password_hash("admin", PASSWORD_DEFAULT))) {
            R::nuke();
            $this->load->model('persona_model');
            $this->persona_model->cAdmin('admin', 'admin');
            
            $data['msg'] = "BD recreada";
        }
        frame($this, '_hdu/anonymous/initPost', $data);
    }
    

    public function registrar()
    {
        $this->load->model('pais_model');
        $datos['paises'] = $this->pais_model->getPaises();
        frame($this, '_hdu/anonymous/registrar', $datos);
    }
    
    public function registrarPost()
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
            PRG($e->getMessage(), 'hdu/anonymous/registrar');
        }
    }

    public function login()
    {
        frame($this, '_hdu/anonymous/login');
    }

    public function loginPost()
    {
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;
        $this->load->model('persona_model');
        try {
            $persona = $this->persona_model->verificarLogin($nombre, $password);
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['persona'] = $persona;
            redirect(base_url());
        } catch (Exception $e) {
            PRG($e->getMessage());
        }
    }
    
    public function logout() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['persona'])) {
            unset($_SESSION['persona']);
        }
        session_destroy();
        redirect(base_url());
        
    }
}

?>