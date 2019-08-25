<?php
	//this is to solve relative path issues
	if($title == 'Job Postr Homepage'){
		require_once('data/config.php');
	}else{
		require_once('../data/config.php');
	}

	//open connection to the database
	function db_connection(){
		try
		{
			$host  = HOST;
			$dname = DBNAME;

			$myPDO = new PDO("mysql:host=$host;dbname=$dname", USERNAME, PASSWORD);

            $myPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return array("myPDO" => $myPDO, "connection_message" => 'Success');

		}

		//in case anything goes wrong when connecting to the databse
		catch(PDOException $e)
		{
            $connection_message = 'Failed';

			return $connection_message;

		}
	} //end of the db_connection function

	//close connection to the database
	function db_close(){
		$myPDO = null;
    } //end of the db_close function
?>
