<?php

/* MySQL database configuration */
$db_host = 'localhost';
$db_username = 'akaki';
$db_password = 'akaki1234';
$db_name = 'countries-db';
$db_port = '8889';

// Connect to the MySQL database
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name, $db_port);

/* check database connection */
// if ($conn->ping()) {
//     echo 'Successfuly connected to the database';
// } else {
//     echo 'Error'. ' ' . $conn->error;
// }