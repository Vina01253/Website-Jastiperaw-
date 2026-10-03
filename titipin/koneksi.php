<?php
$conn = new mysqli('localhost', 'root', '', 'jastip');
if(!$conn){
    echo "Error!:{$conn->connect_error}";
}