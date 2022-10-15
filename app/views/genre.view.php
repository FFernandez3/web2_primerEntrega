<?php
require_once 'libs/smarty-4.2.1/libs/Smarty.class.php';
class GenreView{
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }
    function showGenres($genres){
        $this->smarty->assign('genres', $genres);
        $this->smarty->display('genreList.tpl');
      
       
    }
    function showGenre($genre){
        $this->smarty->assign('genre', $genre);
        $this->smarty->display('categoryPage.tpl');  
    }
    function listMangasFromThisGenre($mangas){    
        $this->smarty->assign('mangas', $mangas);
        $this->smarty->display('mangasFromGenre.tpl'); 

    }
    function showError($error){
        $this->smarty->assign('error', $error);
        $this->smarty->display('error.tpl'); 
    }
  

}