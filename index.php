<html>
    <head>
        Security checks
     </head>
    <body>
 	      
<?php
error_reporting(0);
echo"$token";
error_reporting(E_ALL);
ini_set('display_errors', '1');

$username= "'".$_POST['uname']."'";
$filteredUserName = htmlspecialchars($username);//To avoid xss attack
$password ="'".$_POST['password']."'";
$filteredUserPass = htmlspecialchars($password);//to avoid xss attack

connection();
Login($filteredUserName,$filteredUserPass);

//SQL($filteredUserName,$filteredUserPass);




function Login($filteredUserName,$filteredUserPass)
{
    if(empty($filteredUserName))
    {
        $this->HandleError("UserName is empty!");
        return false;
    }
    if(empty($filteredUserPass))
    {
        $this->HandleError("Password is empty!");
        return false;
    }
    
    
    if(!SQL($filteredUserName,$filteredUserPass))
    {
        return false;
    }
    session_start();
    $_SESSION[$this->GetLoginSessionVar()] = $username;
    return true;
}




function SQL($username,$password) 
{	
echo"I am in sql";
	//echo"$username";
	//echo"$password";
		//mysql_real_escape_string($username);
		//mysql_real_escape_string($password);
			$query = mysql_query("SELECT uname,password FROM admin WHERE uname= $username  and password= $password ;");
			echo "sql returns $query"."<br />";
			$result = mysql_query($query);
while ($db_field = mysql_fetch_assoc($result))
{
//print $db_field['id'] . "<BR>";
print $db_field['uname'] . "<BR>";
print $db_field['password'] . "<BR>";

}
}


function connection()
	{
	$user_name = "root";
	$password = "root";
	$database = "harshal";
	$server = "127.0.0.1";
	$db_handle = mysql_connect($server, $user_name, $password);
	$db_found = mysql_select_db($database, $db_handle);
	if ($db_found) 
	{
	

		print "Database Found ";
		mysql_close($db_handle);
		}
		else 
		{
			print "Database NOT Found ";
		}

}//end of connection

?>

   </body>
 </html>
