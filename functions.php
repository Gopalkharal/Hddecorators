<?php error_reporting(0); ?>
<?php
	function connectdatabase(){
	try {
    	$conn = new PDO("mysql:host=localhost;dbname=jjinnovationnepa_database", "jjinnovationnepa_mega", "xdF2w9(!L-.O");
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	return $conn;
	}
		catch(PDOException $e)
    {
    	echo "Sorry Something Went Wrong: " . $e->getMessage();
    }
		return FALSE;
	}
	function disconnectdatabase($conn){
		$conn=null;
	}
?>
