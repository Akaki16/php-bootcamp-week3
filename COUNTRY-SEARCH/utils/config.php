<?php include 'credintials.php' ?>

<?php

/* MySQL database configuration */
define('DB_HOST', getenv('db_host'));
define('DB_USERNAME', getenv('db_username'));
define('DB_PASSWORD', getenv('db_password'));
define('DB_NAME', getenv('db_name'));
define('DB_PORT', getenv('db_port'));

// Connect to the MySQL database
$conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

/* check database connection */
// if ($conn->ping()) {
//     echo 'Successfuly connected to the database';
// } else {
//     echo 'Error'. ' ' . $conn->error;
// }