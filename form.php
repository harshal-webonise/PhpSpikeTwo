<html>
    <head>
        Security checks
     </head>
     <body>
   	<?
   	$token = md5(uniqid(rand(), true));
    	?>
<form method="post" name="login" action="index.php"> 
<fieldset >
<legend>Login</legend>
<input type='hidden' name='submitted' id='submitted' value='1'/>
<label for='username' >UserName*:</label>
<input type='text' name='uname' id='username'  maxlength="50" />
<label for='password' >Password*:</label>
<input type='password' name='password' id='password' maxlength="50" />
<input type="submit" id="submit" name="submit" onclick="javascript:document.login.submit()"> 
</fieldset>

</form>

</body>

<html>
