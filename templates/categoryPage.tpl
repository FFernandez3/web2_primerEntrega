{include file="header.tpl"}
{if !empty($error)}
    <p>{$error}</p>
{/if}
<h1>{$genre->nombre}</h1>
<h2>Descripcion</h2>
<p>{$genre->descripcion}</p>
<p><a href="listMangasFormGenre/{$genre->id_genero}">Mangas pertenecientes a este género</a></p>

{if isset($smarty.session.USER_ID)}
    {include file="formEditGenre.tpl" }
{/if}
{include file="footer.tpl"}