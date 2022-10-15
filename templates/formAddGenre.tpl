<h3>Agregar un genero</h3>
<form action="addGenre" method="POST" class="my-4" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Nombre del genero</label>
        <input name="name" type="text" class="form-control" aria-describedby="emailHelp">
    </div>

    <div class="form-group">
        <label>Descripcion</label>
        <textarea name="description" class="form-control" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Ingresar imagen</label>
        <input type="file" class="form-control" name="image">
    </div>
    {* <div class="mb-3">
        <label class="form-label">Genero</label> 
        <select name="genero">
            {foreach from=$genres  item=$genre}
                <option name="{$genre->id}">{$genre->nombre}</option>
            {/foreach}
        </select> 
    </div> *}
    <button type="submit" class="btn btn-primary">Agregar</button>
</form>