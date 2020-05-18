<?php
    define('DBINFO','mysql:host=localhost:3306;dbname=proconfl_csepc_db');
    define('DBUSER','proconfl_mahedy');
    define('DBPASS','mahedy01798173317');

    function performQuery($query){
        $con = new PDO(DBINFO,DBUSER,DBPASS);
        $stmt = $con->prepare($query);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    function fetchAll($query){
        $con = new PDO(DBINFO, DBUSER, DBPASS);
        $stmt = $con->query($query);
        return $stmt->fetchAll();
    }

?>