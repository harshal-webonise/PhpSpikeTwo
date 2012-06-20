<html>
    <head>
        <h1>Security checks</h1>
        

</script>
     </head>
     <body>
   	<?
   	$token = md5(uniqid(rand(), true));
   	session_start();
		require_once('nocsrf.php');
    	?>
<form method="post" name="login" action="http://localhost/PhpSpikeTwo/index.php"> 
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




<form enctype="multipart/form-data" action="fileUpload.php" method="POST" name="file">
<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
Choose a file to upload: <input name="uploadedfile" type="file" /><br />
<input type="submit" value="Upload File"  onclick="javascript:document.pass.submit()" />
</form>


<form method="get" name="include" action="include.php">
   <select name="COLOR">
      <option value="red">red</option>
      <option value="blue">blue</option>
   </select>
   <input type="submit" onclick="javascript:document.include.submit()" name ="include">
</form>

<form action="csrfAttack2.php">
<input type="hidden" name="csrf" value="<?php echo $token; ?>">
csrf attack check 
<input type="submit" name ="submit">
</form>
</body>
</body>

<html>
