<html>
    <head> XSS ATTACK</head>
    <body>
<?php
$comment=$_POST['comments'];
//filter_var($comment, FILTER_SANITIZE_STRING);
//clean($comment);
$prevntAttackComment=htmlspecialchars($comment);
echo $prevntAttackComment;
/*function clean($data)
{
    $data = rawurldecode($data);
    return filter_var($data, FILTER_SANITIZE_SPEC_CHARS);
}*/
?>
</body>
</html>