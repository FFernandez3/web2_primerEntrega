<h3>Agregar un item</h3>
<form action="addManga" method="POST" class="my-4" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Titulo</label>
        <input name="title" type="text" class="form-control" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label class="form-label">Autor</label>
        <input type="text" class="form-control" name="author">
    </div>
    <div class="form-group">
        <label>Sinopsis</label>
        <textarea name="synopsis" class="form-control" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Editorial</label>
        <input type="text" class="form-control" name="publishingHouse">
    </div>
    <div class="mb-3">
        <label class="form-label">Ingresar portada</label>
        <input type="file" class="form-control" name="coverPage" >
    </div> 
    <div class="mb-3">
        <label class="form-label">Genero</label> 
        <select name="genre">
            {foreach from=$genres  item=$genre}
                <option value="{$genre->id_genero}">{$genre->nombre}</option>
            {/foreach}
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Agregar</button>
</form>