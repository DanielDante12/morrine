<?php
$conn = mysqli_connect('localhost', 'root',"", 'library');
if(!$conn){
    die("connection failed". mysqli_connect_error());
}
// else{
//     echo "connection succesful";
// }
?>