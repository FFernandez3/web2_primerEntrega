<?php
class AuthHelper
{

    function  checkLoggedIn()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (!isset($_SESSION['IS_LOGGED'])) {
            header("Location: " . BASE_URL . "login");
            die();
        }
    }

    function open_session()
    {
        if (session_status() != PHP_SESSION_ACTIVE) { //si la sesion no esta activa, iniciala. Evito problemas x querer iniciar sesion sobre sesion iniciada
            session_start();
        }
    }
}
