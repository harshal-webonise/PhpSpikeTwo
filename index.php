<html>
    <head>
        Security checks
     </head>
    <body>
 	      
<?php

//error reporitng 
error_reporting(0);
echo"$token";
error_reporting(E_ALL);
ini_set('display_errors', '1');

$username= "'".$_POST['uname']."'";
$filteredUserName = htmlspecialchars($username);//To avoid xss attack
$password ="'".$_POST['password']."'";
$filteredUserPass = htmlspecialchars($password);//to avoid xss attack

	$user_name = "root";
	$password = "root";
	$database = "harshal";
	$server = "127.0.0.1";
	$db_handle = mysql_connect($server, $user_name, $password);
	$db_found = mysql_select_db($database, $db_handle);
	if ($db_found) 
	{
		print "Database Found ";
		
	}
		else 
		{
			print "Database NOT Found ";
		}

 DisableMagicQuotes();
 //evalFunction($filteredUserName,$filteredUserPass)

Login($filteredUserName,$filteredUserPass);

//SQL($filteredUserName,$filteredUserPass);



function evalFunction() 
{
	eval()
	}

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
echo"$filteredUserName and"." $filteredUserPass";
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
  
    
    if(SQL($filteredUserName,$filteredUserPass)==false)
    {
        return false;
    }
     
else{   
    
    echo"Proper";
   
    return true;
}


}

function SQL($username,$password) 
{	

//echo"I am in sql";
	//echo"$username";
	//echo"$password";
		//mysql_real_escape_string($username);
		//mysql_real_escape_string($password);
				$query = "select * from admin";	
				//echo"HIIIIIII";	
			//$query = mysql_query("SELECT uname,password FROM admin WHERE uname= $username  and password= $password ");
			//echo "sql returns $query"."<br />";
				$result = mysql_query($query);
				echo"$result";
				eval("\$result = \"$result\";")
				
				 if(mysql_num_rows($result))
                {
                    while($rows = mysql_fetch_row($result))
                    {
                        foreach($rows as $row)
                           echo "<br/>$row";
                           
                    }

                }
				if($result!=false) 
				return true;
				
			while ($db_field = mysql_fetch_assoc($result))
		{
//print $db_field['id'] . "<BR>";
print $db_field['uname'] . "<BR>";
print $db_field['password'] . "<BR>";

}

}


// disable magic quotes


/*function connection()
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
		
		}
		else 
		{
			print "Database NOT Found ";
		}

}//end of connection
*/
?>

   </body>
 </html>
