{include file="header.tpl"}

<div class="containerCards">
    {foreach from=$mangas item=$manga}
        <div class="card" style="width: 18rem;">
            {if isset($manga->portada)}
                <img src={$manga->portada} class="card-img-top manga" alt="">
            {/if}
            <div class="card-body">
                <h5 class="card-title">{$manga->titulo}</h5>
                <p class="card-text">{$manga->sinopsis|truncate:60}</p>
                <a href="show/{$manga->id}" class="btn btn-primary">Ver</a>
                {if isset($smarty.session.USER_ID)}
                    <a href="delete/{$manga->id}" type="button" class="btn btn-danger">Borrar</a>
                {/if}
            </div>
        </div>
    {/foreach}
</div>
{if !empty($smarty.session.USER_ID)}
    {include file="formAddManga.tpl"}
{/if}

{include file="footer.tpl"}