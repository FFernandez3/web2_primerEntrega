<?php
require_once './app/views/auth.view.php';
require_once './app/models/user.model.php';
require_once './app/helpers/auth.helper.php';

class AuthController
{
    private $model;
    private $view;
    private $authHelper;


    function __construct()
    {
        $this->view = new  AuthView();
        $this->model = new UserModel();
        $this->authHelper = new AuthHelper();
    }
    function showLogin()
    {
        $this->view->showFormLogin();
    }
    function validateUser()
    {

        if (!empty($_POST['email'] && !empty($_POST['password']))) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->model->getUser($email);



            if ($user && password_verify($password, $user->password)) { //si el usuario existe y las contraseñas coinciden
                //inicio sesion
                $this->authHelper->open_session();

                //guardo estos datos
                $_SESSION['USER_ID'] = $user->id_usuario;
                $_SESSION['USER_EMAIL'] = $user->email;
                $_SESSION['IS_LOGGED'] = true;

                header("Location: " . BASE_URL);
            } else {

                $this->view->showFormLogin("Usuario o contraseña incorrecta");
            }
        } else {
            $this->view->showFormLogin("No se pueden dejar campos vacios");
        }
    }
    function logout()
    {
        $this->authHelper->open_session();
        session_destroy();
        header("Location: " . BASE_URL);
    }
}
