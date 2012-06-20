<?


session_start();
require_once('nocsrf.php');

 try
{

NoCSRF::check( 'csrf', $_POST, true, 60*10, false );
    echo "No CSRF Attck";     
}
catch ( Exception $e )
{
 echo "attack is detected";
}

?>