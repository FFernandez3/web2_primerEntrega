<h3>Editar este genero</h3>
<form action="editGenre/{$genre->id_genero}" method="POST" class="my-4" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Nombre del genero</label>
         <input name="name" type="text" class="form-control" aria-describedby="emailHelp" value="{$genre->nombre}"> 
    </div>

    <div class="form-group">
        <label>Descripcion</label>
        <input type="text" class="form-control" name="description" value="{$genre->descripcion}">
        {* <textarea name="description" class="form-control" rows="3"></textarea> *}
    </div>
    <div class="mb-3">
        <label class="form-label">Ingresar imagen</label>
        <input type="file" class="form-control" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Editar</button>
</form>