<?php
class GenreModel
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_mangas;charset=utf8', 'root', '');
    }

    function getAll()
    {
        //pido todos los generos
        $query = $this->db->prepare("SELECT * FROM genero");
        $query->execute();

        $genres = $query->fetchAll(PDO::FETCH_OBJ);

        return $genres;
    }
    function getGenre($id)
    {
        //pido un manga
        $query = $this->db->prepare("SELECT * FROM genero WHERE id_genero=?");
        $query->execute([$id]);

        $genre = $query->fetch(PDO::FETCH_OBJ);

        return $genre;
    }
    function getAllMangasFromGenre($id)
    { //le paso el id del genero 
        //selecciono el nombre del manga y su id
        $query = $this->db->prepare("SELECT manga.titulo, manga.id, manga.id_genero_fk  FROM `genero` INNER JOIN `manga` ON genero.id_genero=manga.id_genero_fk WHERE genero.id_genero=?");
        $query->execute([$id]);

        $mangasFromGenre = $query->fetchAll(PDO::FETCH_OBJ);

        return $mangasFromGenre;
    }


    function insertGenre($name, $description, $image = null)
    {
        $pathImg = null;
        if ($image)
            $pathImg = $this->uploadImage($image);

        $query = $this->db->prepare("INSERT INTO genero (nombre, descripcion, imagen) VALUES (?, ?, ?)");
        $query->execute([$name, $description, $pathImg]);

        return $this->db->lastInsertId();
    }

    function deleteGenreById($id)
    {
        
        $query = $this->db->prepare('DELETE FROM genero WHERE id_genero = ?');
        $query->execute([$id]);
      

    }
    function editGenre($name, $description, $image = null, $id)
    {
        $pathImg = null;

        if ($image)
            $pathImg = $this->uploadImage($image);


        $query = $this->db->prepare('UPDATE genero  SET nombre=?, descripcion=?, imagen=? WHERE id_genero = ?');
        $query->execute([$name, $description, $pathImg, $id]);
    }

    private function uploadImage($image)
    {

        $target = 'images/' . uniqid() . '.jpg';

        move_uploaded_file($image, $target);
        return $target;
    }
}
