<?php

$conn = new mysqli('localhost','root','abdulaziz2','blogs');

$stmt='SELECT * FROM blog  ORDER BY time_created desc';

$result= $conn->query($stmt);




?>