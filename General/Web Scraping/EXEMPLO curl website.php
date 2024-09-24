<?php
$ch = curl_init();
$timeout = 5; // set to zero for no timeout
curl_setopt ($ch, CURLOPT_URL, 'http://cdn-content.geraldo.tech/');
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$file_contents = curl_exec($ch);
curl_close($ch);

// display file
echo $file_contents;
?>
<!DOCTYPE html>
<html>
<head>
	<title>EXEMPLO curl website</title>
	<link rel="stylesheet" href="http://conviteanimado.com/assets/style.css">
</head>
<body>

</body>
</html>
