<?php

class Adb {

	function conectar(){
       
       try {

		  $con = new PDO('mysql:host=localhost;dbname=pisbmcqz_controlgastos','pisbmcqz_portafoliowo','%sjwilJuri_7ruku');
		  $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		  return $con;

	   } catch (PDOException $e) {
           print "¡Error!: " . $e->getMessage() . "<br/>";
          die();
       }

	}
}
