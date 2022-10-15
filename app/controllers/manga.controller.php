<?php
require_once './app/models/manga.model.php';
require_once './app/views/manga.view.php';
require_once './app/models/genre.model.php';
require_once './app/helpers/auth.helper.php';

class MangaController
{
    private $view;
    private $model;
    private $genreModel;
    private $authHelper;


    function __construct()
    {
        $this->model = new MangaModel();
        $this->view = new MangaView();
        $this->genreModel = new GenreModel();

        $this->authHelper = new AuthHelper();
        //barrera que este loggeado, si lo pongo aca todo seria privado
        // $this->authHelper->checkLoggedIn();
    }

    public function showMangas()
    {

        $this->authHelper->open_session();
        $mangas = $this->model->getAll();
        $genres = $this->genreModel->getAll();
        $this->view->showMangas($mangas, $genres);
    }
    public function showManga($id)
    {
        $this->authHelper->open_session();
        $manga = $this->model->getManga($id);
        $genres = $this->genreModel->getAll();

        $this->view->showManga($manga, $genres);
    }
    function addManga()
    {
        $this->authHelper->checkLoggedIn();

        $title = $_POST['title'];
        $author = $_POST['author'];
        $synopsis = $_POST['synopsis'];
        $publishingHouse = $_POST['publishingHouse'];
        $coverPage = $_FILES['coverPage']['tmp_name'];
        $genre = $_POST['genre'];


        if (empty($title) || empty($author) || empty($synopsis) || empty($publishingHouse) || empty($genre)) {
            $this->view->showError(array("Hay campos vacios.", "Por favor complete los campos obligatorios para agregarlo.", "list"));
            die();
        }

        if (
            $_FILES['coverPage']['type'] == "images/jpg" || $_FILES['coverPage']['type'] == "images/jpeg"
            || $_FILES['coverPage']['type'] == "images/png" || $_FILES['coverPage']['type'] == "images/webp"
        ) {
            $this->model->insertManga($title, $author, $synopsis, $publishingHouse, $_FILES['coverPage']['tmp_name'], $genre);
        } else {
            $this->model->insertManga($title, $author, $synopsis, $publishingHouse, $coverPage, $genre);
        }


        header("Location: " . BASE_URL);
    }
    public function editManga($id)
    {
        $this->authHelper->checkLoggedIn();
        $title = $_POST['title'];
        $author = $_POST['author'];
        $synopsis = $_POST['synopsis'];
        $publishingHouse = $_POST['publishingHouse'];
        $coverPage = $_FILES['coverPage']['tmp_name'];
        $genre = $_POST['genre'];


        if (empty($title) || empty($author) || empty($synopsis) || empty($publishingHouse) || empty($genre)) {
            $this->view->showError(array("Hay campos vacios.", "Por favor complete todos los campos obligatorios para poder editarlo.", "show/" . $id));
            die();
        }
        if (
            $_FILES['coverPage']['type'] == "images/jpg" || $_FILES['coverPage']['type'] == "images/jpeg"
            || $_FILES['coverPage']['type'] == "images/png" || $_FILES['coverPage']['type'] == "images/webp"
        ) {
            $this->model->editManga($title, $author, $synopsis, $publishingHouse,  $_FILES['coverPage']['tmp_name'], $genre, $id);
        }
        $this->model->editManga($title, $author, $synopsis, $publishingHouse, $coverPage, $genre, $id);


        header("Location: " . BASE_URL . 'show/' . $id);
    }
    public function deleteManga($id)
    {
        $this->authHelper->checkLoggedIn();
        $manga = $this->model->getManga($id); //traigo el manga para obtener despues la ruta a la portada
        $this->model->deleteMangaById($id);
        unlink($manga->portada); // eliminar de mi directorio la imagen
        header("Location: " . BASE_URL);
    }
    function listMangasFromGenre($idGenre)
    {
        $this->authHelper->open_session();
        $mangas = $this->model->getAllMangasFromGenre($idGenre);
        $this->view->listMangasFromThisGenre($mangas);
    }
}
