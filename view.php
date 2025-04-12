<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
	<title>Result Correction</title>
</head>
<body>
<table>
<?php 
		$test="টগর";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM row");
    $stmt->execute();
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
     foreach($stmt->fetchAll() as $k=>$v) {
        if(strcmp($test, $v)==0){
        	echo "got it";
        }
        else "not found";
    }
}
catch (Exception $e) {
	echo $e;
}

 ?>



</table>
</body>
</html>