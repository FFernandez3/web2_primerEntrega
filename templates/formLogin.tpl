{include file="header.tpl"}

<div class="formLoginContainer ">
{if $error}
  <div class=" mx-auto alert alert-danger">
    {$error}
  </div>

{/if}
  <form class="px-4 py-3 mx-auto formLogin" action="validate" method="POST">
  
    <div class="mb-3">
      <label for="exampleDropdownFormEmail1" class="form-label">Usuario</label>
      <input name="email" type="email" class="form-control" id="exampleDropdownFormEmail1"
        placeholder="email@ejemplo.com">
    </div>
    <div class="mb-3">
      <label for="exampleDropdownFormPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password" name="password">
    </div>
 
    <button type="submit" class="btn btn-primary">Sign in</button>
  </form>
  

 

</div>


{include file="footer.tpl"}