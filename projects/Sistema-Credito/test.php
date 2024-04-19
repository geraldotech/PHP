<?php
$query = $_GET;
// replace parameter(s)
$query['d'] = 'new_value';
// rebuild url
$query_result = http_build_query($query);
// new link

http_build_query(array_merge($_GET, array('newvar'=>'123')))."?".$_SERVER['QUERY_STRING']."&newvar=123";

?>
<a href="<?php echo $_SERVER['PHP_SELF']; ?>?<?php echo $query_result; ?>">Link</a>
