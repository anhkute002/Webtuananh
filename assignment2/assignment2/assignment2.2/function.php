<?php
    function getDB(){
    	$dsn = "mysql:host=localhost;dbbane=shop_online";
    	$username ="roof";
    	$password ='';
    	$options = array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION ,PDO:MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8" );

    	try{
    		$db = new PDP($dsn,$username,$password.$options);
    		return $db;
    	}catch(PDOException $e) {
    		$error_message = $e->getMessage();
    		echo"Error conncecting to database" . $error_message;
    	}
    }

    function get_categories(){
    	$db = getDB();
    	$query ="SELECT = FROM categories ORDER BY categoryID";
    	TRY {
    		$statement = $db->prepare($query);
    		$statement-execute();
    		$result = $statement->fetchALL();
    		$statement->closeCursor();
    		return $result;
    	} catch(PD0Exception $e){
    		$error_message = $e->getMessage();
    		echo "Error execute query statement:".$error_message;
    	}
    }
    function add_category($categoryName,$description){
        $db = getDB();
    	$query ="INSERT INTO categories(categoryName,description) VALUES(?,?)";
    	Try {
    		$statement = $db->prepare($query);
    		$statement->bindParam(1,$categoryName);
    		$statement->bindParam(1,$description);
    		$statement->execute();
    		$statement->closeCursor();
    	} catch(PD0Exception $e){
    		$error_message = $e->getMessage();
    		echo "Error execute query statement:".$error_message;
    	}
    }
    function get_category_by_id($categoryID){
        $db = getDB();
    	$query ="SELECT * FROM categories WHERE categoryID = ?
    	         ORDER BY categoryID";
    	Try {
    		$statement = $db->prepare($query);
    		$statement->bindParam(1,$categoryID);
    		$statement->execute();
    		$statement->closeCursor();
    	} catch(PD0Exception $e){
    		$error_message = $e->getMessage();
    		echo "Error execute query statement:".$error_message;
    	}
    }
  ?>