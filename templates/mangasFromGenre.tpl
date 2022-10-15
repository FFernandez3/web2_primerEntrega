{include file="header.tpl"}
{* <h1>>Mangas del genero {$genre->nombre}</h1> *}

{if !empty($mangas)}
    <ul class="list-group list-group-flush">
        {foreach from=$mangas item=$manga}
            <li class="list-group-item"><a href="show/{$manga->id}">{$manga->titulo}</a></li>
        {/foreach}
    </ul>
    <button><a href="showGenre/{$manga->id_genero_fk}">Volver</a></button>
    {else}
        <p>Este genero no tiene mangas por el momento</p>
           
{/if}


{include file="footer.tpl"}