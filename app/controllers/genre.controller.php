<?php
require_once './app/models/genre.model.php';
require_once './app/views/genre.view.php';
require_once './app/helpers/auth.helper.php';

class GenreController
{
    private $model;
    private $view;
    private $authHelper;

    function __construct()
    {
        $this->model = new  GenreModel();
        $this->view = new GenreView();
        $this->authHelper = new AuthHelper();
    }
    public function showGenres()
    {
        $this->authHelper->open_session();
        $genres = $this->model->getAll();
        $this->view->showGenres($genres);
    }
    public function showGenre($id)
    {
        $this->authHelper->open_session();
        $genre = $this->model->getGenre($id);
        $this->view->showGenre($genre);
    }
    function addGenre()
    {
        $this->authHelper->checkLoggedIn();
        $name = $_POST['name'];
        $description = $_POST['description'];
        $image = $_FILES['image']['tmp_name'];

        if (empty($name) || empty($description)) {
            $this->view->showError(array("Hay campos vacios.", "Por favor complete los campos obligatorios para poder agregarlo.",  "showGenres"));
            die();
        }
        if (
            $_FILES['image']['type'] == "images/jpg" || $_FILES['image']['type'] == "images/jpeg"
            || $_FILES['image']['type'] == "images/png" || $_FILES['image']['type'] == "images/webp"
        ) {
            $this->model->insertGenre($name, $description, $_FILES['image']['tmp_name']);
        } else {
            $this->model->insertGenre($name, $description, $image);
        }


        header("Location: " . BASE_URL . 'showGenres');
    }
    public function editGenre($id)
    {
        $this->authHelper->checkLoggedIn();
        $name = $_POST['name'];
        $description = $_POST['description'];
        $image = $_FILES['image']['tmp_name'];



        if (empty($name) || empty($description)) {
            $this->view->showError(array("Hay campos vacios.", "Por favor complete todos los campos obligatorios para poder editarlo.", "showGenre/" . $id));
            die();
        }

        if (
            $_FILES['image']['type'] == "images/jpg" || $_FILES['image']['type'] == "images/jpeg"
            || $_FILES['image']['type'] == "images/png" || $_FILES['image']['type'] == "images/webp"
        ) {
            $this->model->editGenre($name, $description, $_FILES['image']['tmp_name'], $id);
        } else {
            $this->model->editGenre($name, $description, $image, $id);
        }
        header("Location: " . BASE_URL . 'showGenre/' . $id);
    }
    public function deleteGenre($id)
    {
        $this->authHelper->checkLoggedIn();
        $genre = $this->model->getGenre($id); //traigo el genero para obtener la ruta a la imagen
        $mangas = $this->model->getAllMangasFromGenre($id);  //aca tenia genreModel y me tiraba un error
        if (empty($mangas)) {
            $this->model->deleteGenreById($id);
            unlink($genre->imagen); //borro la imagen de mi carpeta images


            header("Location: " . BASE_URL . 'showGenres');
        } else {
            $this->view->showError(array("Error al borrar", "Existen mangas pertenecientes a este genero, no puede eliminarse.", "showGenres"));
        }
    }
    //listo los mangas de un determinado genero
    function listMangasFromGenre($id)
    {
        $this->authHelper->open_session();
        $mangas = $this->model->getAllMangasFromGenre($id);
        $this->view->listMangasFromThisGenre($mangas);
    }
}
