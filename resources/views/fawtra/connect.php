<?php
$nameDp="my_database";
$host="localhost";
$password="";
$userDB="root";
$conn=mysqli_connect($host,$userDB,$password,$nameDp);
if($conn){
    //echo "connect";

}
else{
    echo "error";
}
?>