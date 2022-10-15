<h3>Editar este manga</h3>
<form action="editManga/{$manga->id}" method="POST" class="my-4" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Titulo</label>
        <input value="{$manga->titulo}"type="text" class="form-control" aria-describedby="emailHelp" name="title">
    </div>
    <div class="mb-3">
        <label class="form-label">Autor</label>
        <input value="{$manga->autor}" type="text" class="form-control" name="author">
    </div>
    <div class="form-group">
        <label>Sinopsis</label>
        <input value="{$manga->sinopsis}" type="text" class="form-control"  name="synopsis">
        {* <textarea name="synopsis" class="form-control" rows="3" placeholder="{$manga->sinopsis}"></textarea> *}
    </div>
    <div class="mb-3">
        <label class="form-label">Editorial</label>
        <input value="{$manga->editorial}"type="text" class="form-control" name="publishingHouse">
    </div>
    <div class="mb-3">
        <label class="form-label">Ingresar portada</label>
        <input value="{$manga->imagen}"type="file" class="form-control" name="coverPage" >
    </div> 
    <div class="mb-3">
        <label class="form-label">Genero</label> 
        <select value="{$manga->nombre}"name="genre">
            {* <option selected>Seleccione genero</option> *}
            {foreach from=$genres  item=$genre}
                <option value="{$genre->id_genero}">{$genre->nombre}</option>
            {/foreach}
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Editar</button>
</form>