<?php
$STUDENT NAME=$_POST['STUDENT NAME'];
$STUDENT ID=$_POST['STUDENT ID'];
$FATHER NAME=$_POST['FATHER NAME'];
$MOTHER NAME=$_POST['MOTHER NAME'];
$CONTACT NO=$_POST['CONTACT NO'];
$EMAIL=$_POST['EMAIL'];
$GENDER=$_POST['GENDER'];

if(!empty($STUDENT NAME)|| !empty($STUDENT ID)|| !empty($FATHER NAME)|| !empty($MOTHER NAME)|| !empty($CONTACT NO)|| !empty($EMAIL)|| 
!empty($GENDER)|| ) {
	$HOST="LOCALHOST";
	$dbusername="root";
	$dbpassword="";
	$dbname="register";
	// create connection
	$conn=mysqli($host,$dbusername,$dbpassword,$dbname);
	if(mysqli_connect_error()){
		die('connect error ('.mysqli_connect_error().') '.mysqli_connect_error());
	} else{
		$SELECT="SELECT email from register where email=? limit 1";
		$INSERT="INSERT INTO register (STUDENT NAME,STUDENT ID, FATHER NAME, MOTHER NAME,CONTACT NO,EMAIL,GENDER)VALUES(?,?,?)"
		
		//PREPARE STATEMENT
		$STMT=$CONN->$CONN->PREPARE($SELECT);
		$STMT->BIND_PARAM("S",$EMAIL);
		$STMT->EXECUTE();
		$STMT->BIND_RESULT($EMAIL);
		$STMT->STORE_RESULT();
		$RNUM=$STMT->NUM_ROWS;
		IF($RNUM==0){
			$STMT->CLOSE();
			$STMT=$CONN->PREPARE($INSERT);
			$STMT->BIND_PARAM("SSSSIL",$STUDENTNAME,$STUDENTID,$FATHERNAME,$MOTHERNAME,$CONTACTNNO,$EMAIL,$GENDER);
			$STMT->EXECUTE();
			ECHO"NEW RECORD INSERTED SUCCESSFULLY";
		}ELSE{
			ECHO"SOMEONE ALREADY REGISTER USING THIS EMAIL";
		}
	}
}ELSE{
	ECHO"ALL FIELD ARE REQUIRED";
	DIE();
}
?>