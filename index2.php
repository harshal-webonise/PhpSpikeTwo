<html>
    <head>
        Security checks
     </head>
    <body>
 	      



<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

$username= "'".$_POST['uname']."'";
$filteredUserName = htmlspecialchars($username);//To avoid xss attack
//echo"$username";
//echo"$filteredUserName";

$password ="'".$_POST['password']."'";
$filteredUserPass = htmlspecialchars($password);//to avoid xss attack
//echo"$filteredUserPass";







connection($filteredUserName,$filteredUserPass);

function connection($username,$password)
{
$user_name = "root";
$password = "root";
$database = "harshal";
$server = "127.0.0.1";
$db_handle = mysql_connect($server, $user_name, $password);

$db_found = mysql_select_db($database, $db_handle);

if ($db_found) 
{
//static $cnt;
//$SQL = "SELECT * FROM admin";
//$SQL = ("INSERT INTO admin (id,uname,password) VALUES (10, 'new','new');");

//used to remove SQL injection
/*$stmt = $pdo->prepare('SELECT uname,password FROM admin WHERE uname= :username  and password= :password');

$stmt->execute(array(':uname' => $username));
$stmt1->execute(array(':password' => $password ));
foreach ($stmt as $row)
 {
 	echo "uname: $row<br />\n";
  }
foreach ($stmt1 as $row)
 {
 	echo "password: $row<br />\n";
  }

*/

$SQL = mysql_query("SELECT uname,password FROM admin WHERE uname= $username  and password= $password ;");
echo "$SQL"."<br />";
$result = mysql_query($SQL);
print "Database Found ";
/*while ($db_field = mysql_fetch_assoc($result))
{
//print $db_field['id'] . "<BR>";
print $db_field['uname'] . "<BR>";
print $db_field['password'] . "<BR>";

}
*/
mysql_close($db_handle);
}
else 
{
print "Database NOT Found ";
}
//$cnt++;
}//end of connection

?>

   </body>
 </html>
