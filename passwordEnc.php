<html>
    <head>
        Security checks
     </head>
     <body>
   	<?
   	$token = md5(uniqid(rand(), true));
    	?>
<form method="post" name="pass" action="http://localhost/PhpSpikeTwo/index.php"> 
<fieldset >
<legend>Login</legend>
<input type='hidden' name='submitted' id='submitted' value='1'/>
<label for='login' >UserName*:</label>
<input type='text' name='login' id='login'  maxlength="50" />
<label for='password' >Password*:</label>
<input type='password' name='password' id='password' maxlength="50" />
<input type="submit" id="submit" name="submit" onclick="javascript:document.pass.submit()"> 
</fieldset>

</form>

</body>

<html>