<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <h1>Security checks</h1>

    </head>
<body>   	
    <?
              
        $token = md5(uniqid(rand(), true));
   	session_start();
	require_once('nocsrf.php');

       
    ?>

<div id="form1">
<form method="post" name="login" action="form.php"> 
<fieldset >
<legend>Login</legend>
<input type='hidden' name='submitted' id='submitted' value='1'/>
<label for='username' >UserName*:</label>
<input type='text' name='uname' id='username'  maxlength="50" /><br/>
<label for='password' >Password*:</label>
<input type='password' name='password' id='password' maxlength="50" /><br />
<input type="submit" id="submit" name="submit" onclick="javascript:document.login.submit()"> 
</fieldset>
</form>

<form enctype="multipart/form-data" action="fileUpload.php" method="POST" name="file">
    <fieldset >
        <legend>File Upload</legend>
<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
Choose a file to upload: <input name="uploadedfile" type="file" /><br />
<input type="submit" value="Upload File"  onclick="javascript:document.file.submit()" />
    </fieldset>
</form>


<form method="post" name="include" action="include.php">
    <fieldset >
        <legend>Include Files</legend>
   <select name="COLOR">
      <option value="red">red</option>
      <option value="blue">blue</option>
   </select><br />
   <input type="submit" onclick="javascript:document.include.submit()" name ="include">
    </fieldset>
</form>



<form action="csrfAttack2.php" name="csrf">
    <fieldset ><legend>CSRF</legend>
<input type="hidden" name="csrf" value="<?php echo $token; ?>">
csrf attack check <br />
<input type="submit" name ="submit">
    </fieldset>
</form>
    
    
    
    
<form action="xssAttack.php" name="xss" method="post">
    <fieldset ><legend>XSS Attack</legend>
<textarea rows="2" cols="20" name="comments"></textarea><br />
<input type="submit" name ="Attack"></fieldset>
</form>
</div>
</body>

<html>

