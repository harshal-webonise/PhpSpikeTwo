<html>
    <head>
        Security checks
     </head>
    <body>
 	      
<?php

include('security.php'); 
@require 'register_globals.php';

//error reporitng 
error_reporting(0);
//echo"$token";
error_reporting(E_ALL);
ini_set('display_errors', '1');
register_globals();




$security = new security(); 

if ($_POST) 
{ 
    $security->prevent_remote_referrer(); 
    // HTTP POST form-data processing code goes below... 
} 


	$username= $_POST['uname'];
	$filteredUserName = htmlspecialchars($username);//To avoid xss attack
	$password =$_POST['password'];
	$filteredUserPass = htmlspecialchars($password);//to avoid xss attack
	//echo"$password $filteredUserPass"."<br />";
	//$md5pwd = $filteredUserPass;
	$md5pwd = md5($filteredUserPass);
	//echo"md5pwd=$md5pwd";
	$user_name = "root";
	$password = "root";
	$database = "harshal";
	$server = "127.0.0.1";
	$db_handle = mysql_connect($server, $user_name, $password);
	$db_found = mysql_select_db($database, $db_handle);
	if ($db_found) 
	{
		//print "Database Found ";
		
	}
		else 
		{
			print "Database NOT Found ";
		}

	//DisableMagicQuotes();
	Login($filteredUserName,$md5pwd );






/*disable magic quotes*/
function DisableMagicQuotes()
 {
 	
 	if(get_magic_quotes_gpc()) {
      $process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
      while(list($key, $val) = each($process)) {
            foreach($val as $k => $v) {
                  unset($process[$key][$k]);
                  if(is_array($v)) {
                        $process[$key][stripslashes($k)] = $v;
                        $process[] = &$process[$key][stripslashes($k)];
                  } else {
                        $process[$key][stripslashes($k)]=stripslashes($v);
                  }
            }
      }
      unset($process);
}
	}


function Login($filteredUserName,$filteredUserPass)
{ 
//echo" $filteredUserPass";
    if(empty($filteredUserName))
    {
        print "user name is empty ";
        return false;
    }
    if(empty($filteredUserPass))
    {
     print "password is empty";
        return false;
    }
  
    
    SQL($filteredUserName,$filteredUserPass);
    
     


}

function SQL($username,$password) 
{	
//echo"$username";
	//$query = sprintf("SELECT uname, password FROM admin WHERE uname='%s' AND password='%s'",mysql_real_escape_string($username),mysql_real_escape_string($password));
   //echo $username;
   //echo $password;
   $injectUserName = mysql_real_escape_string($username);
   $injectPassword = mysql_real_escape_string($password);
	$query = "SELECT uname, password FROM admin WHERE uname='$injectUserName' AND password='$injectPassword'";
	$result = mysql_query($query);
	//echo mysql_num_rows($result);
	//echo "<br />"."$result";
	if (!mysql_num_rows($result)) 
	{
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
	}
	else
	{   
   echo "Valid user name and password";
   while ($row = mysql_fetch_assoc ($result)) 
   {
   	echo "hi..";
   	extract ($row);
		echo "name = $username <br>password = $password <br><br />";
	}

   
    return true;
    }




}


?>

   </body>
 </html>
