{include file="header.tpl"}

<div class="containerCards">
    {foreach from=$genres item=$genre}
        <div class="card" style="width: 18rem;">
            {if isset($genre->imagen)}
                <img src={$genre->imagen} class="card-img-top genero" alt="">
            {/if}
            <div class="card-body">
                <h5 class="card-title">{$genre->nombre}</h5>
                <p class="card-text">{$genre->descripcion|truncate:60}</p>
                <a href="showGenre/{$genre->id_genero}" class="btn btn-primary">Ver</a>
                {if isset($smarty.session.USER_ID)}
                 <a href="deleteGenre/{$genre->id_genero}" type="button" class="btn btn-danger">Borrar</a>
                {/if}
            </div>
        </div>
    {/foreach}
</div>

{if !empty($smarty.session.USER_ID)}
    {include file="formAddGenre.tpl"}
{/if}

{include file="footer.tpl"}