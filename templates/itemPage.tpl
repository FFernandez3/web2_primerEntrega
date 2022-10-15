{include file="header.tpl"}

{if !empty($error)}
<h1>{$error}</h1>
{/if}

<h1>{$manga->titulo} por {$manga->autor}</h1>
<p>Este manga pertenece al genero  {$manga->nombre} y fue editado por {$manga->editorial}</p>
<h2>Sinopsis</h2>
<p>{$manga->sinopsis}</p>


{if !empty($smarty.session.USER_ID)}
    {include file="formEditManga.tpl"}
{/if}
{include file="footer.tpl"}