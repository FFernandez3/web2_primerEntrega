<?php
require_once './app/controllers/manga.controller.php';
require_once './app/controllers/genre.controller.php';
require_once './app/controllers/auth.controller.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'list'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

// instancio controladores
$mangaController = new MangaController();
$genreController=new GenreController();

// tabla de ruteo
switch ($params[0]) {
    case 'login':
        $authController = new AuthController();
        $authController->showLogin();
        break;
    case 'validate':
        $authController = new AuthController();
        $authController->validateUser();
        break;
    case 'logout':
        $authController=new AuthController();
        $authController->logout();
        break;
    case 'list':    
        $mangaController->showMangas();
        break;
    case 'show':   
        $id = $params[1];
        $mangaController->showManga($id);
        break;
    case 'addManga':
       
        $mangaController->addManga();
        break;
    case 'editManga':   
        $id=$params[1];
        $mangaController->editManga($id);
        break;
    case 'delete':
        $id = $params[1];
        $mangaController->deleteManga($id);
        break;
    case 'showGenres':     
        $genreController->showGenres();
        break;
    case 'showGenre':       
            $id = $params[1];
            $genreController->showGenre($id);
            break;
    case 'listMangasFormGenre':
       
        $id = $params[1];
        $mangaController->listMangasFromGenre($id);
        break;    
    case 'addGenre':
        
        $genreController->addGenre();
        break;
    case 'editGenre':       
        $id=$params[1];
        $genreController->editGenre($id);
        break;
    case'deleteGenre':  
        $id = $params[1];
        $genreController->deleteGenre($id);
        break;
   
    default:
        echo ('404 Page not found');
        break;
}
