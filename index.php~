<html>
    <head>
        Security checks
     </head>
    <body>
<form method="post" onsubmit="result.php">       
        <table  border="2">
        <tr>
        <td>Enter Usre Name
        </td>
        <td>
        <input type="text" name="unmae" id="name">
        </td>
        
        </tr>

		<tr>
        <td>Enter password
        </td>
        <td>
        <input type="password" name="upass" id="pass">
        </td>
        
        </tr>

</table>
</form> 	      
 <input type="submit" id="submit" name="submit" > 
    </body>
 </html>
<?php
$user_name = "root";
$password = "root";
$database = "harshal";
$server = "127.0.0.1";
$db_handle = mysql_connect($server, $user_name, $password);

$db_found = mysql_select_db($database, $db_handle);

if ($db_found) 
{
$SQL = "SELECT * FROM admin";
$result = mysql_query($SQL);
//print "Database Found ";
while ($db_field = mysql_fetch_assoc($result))
{
print $db_field['id'] . "<BR>";
print $db_field['uname'] . "<BR>";
print $db_field['password'] . "<BR>";

}

mysql_close($db_handle);
}
else {
print "Database NOT Found ";
}





