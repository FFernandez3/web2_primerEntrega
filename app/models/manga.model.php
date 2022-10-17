<?php
class MangaModel
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_mangas;charset=utf8', 'root', '');
    }

    function getAll()
    {
        $query = $this->db->prepare("SELECT * FROM manga");
        $query->execute();

        $mangas = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos

        return $mangas;
    }

    function deleteMangaById($id)
    {

        $query = $this->db->prepare('DELETE FROM manga WHERE id = ?');
        $query->execute([$id]);
    }

    function insertManga($title, $author, $synopsis, $publishingHouse, $coverPage = null, $genre)
    {
        $pathImg = null;
        if ($coverPage)
            $pathImg = $this->uploadImage($coverPage);


        $query = $this->db->prepare("INSERT INTO manga (titulo, autor, sinopsis, editorial, portada, id_genero_fk) VALUES (?, ?, ?, ?, ?, ?)");
        $query->execute([$title, $author, $synopsis, $publishingHouse, $pathImg, $genre]);

        return $this->db->lastInsertId();
    }
    function getManga($id)
    {
        //pido un manga
        $query = $this->db->prepare("SELECT manga.*, genero.nombre, genero.id_genero FROM manga INNER JOIN genero ON manga.id_genero_fk=genero.id_genero WHERE manga.id=$id");
        $query->execute();


        $manga = $query->fetch(PDO::FETCH_OBJ);

        return $manga;
    }

    function editManga($title, $author, $synopsis, $publishingHouse, $coverPage = null, $genre, $id)
    {
        $query = $this->db->prepare('UPDATE manga  SET titulo=?, autor=?, sinopsis=?, editorial=?, portada=?, id_genero_fk=? WHERE id = ?');

        if ($coverPage)
            $pathImg = $this->uploadImage($coverPage);

        $query->execute([$title, $author, $synopsis, $publishingHouse, $pathImg, $genre, $id]);
        $manga = $query->fetch(PDO::FETCH_OBJ);



        return $manga;
    }
    private function uploadImage($coverPage)
    {
        $target = 'images/' . uniqid() . '.jpg';
        move_uploaded_file($coverPage, $target);
        return $target;
    }
}
