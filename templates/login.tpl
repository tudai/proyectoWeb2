
<form id="loginForm">
  <div class="form-group">
    <label for="inputUser">Usuario</label>
    <input type="text" class="form-control" name="username" id="inputUser" placeholder="Usuario">
  </div>
  <div class="form-group">
    <label for="inputPassword">Password</label>
    <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
  </div>

  <button data-action="execute-login" type="submit" class="btn btn-default">Submit</button>
</form>

  {$smarty.session.activeUser}
  {$smarty.server.SERVER_NAME}
	{$smarty.get.page}