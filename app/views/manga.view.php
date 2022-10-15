<?php
require_once 'libs/smarty-4.2.1/libs/Smarty.class.php';
class MangaView
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty(); // inicializo Smarty
    }
    function showMangas($mangas, $genres)
    {
        // asigno variables al tpl smarty
        $this->smarty->assign('mangas', $mangas);
        $this->smarty->assign('genres', $genres);
        // mostrar el tpl
        $this->smarty->display('mangaList.tpl');
    }

    function showManga($manga, $genres)
    {
        $this->smarty->assign('manga', $manga);
        $this->smarty->assign('genres', $genres); //esto es para el select del form

        $this->smarty->display('itemPage.tpl');
    }

    function showError($error)
    {
        $this->smarty->assign('error', $error);
        $this->smarty->display('error.tpl');
    }
    function listMangasFromThisGenre($mangas){    
        $this->smarty->assign('mangas', $mangas);
        $this->smarty->display('mangasFromGenre.tpl'); 

    }
}
