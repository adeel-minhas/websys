<?php
	$config = array(
   'DB_HOST'     => 'localhost',
   'DB_USERNAME' => 'root', //added root as the username
   'DB_PASSWORD' => '',
   );

   try {
//      open connection here
   		$conn = new PDO('mysql:host=localhost', $config['DB_USERNAME'], $config['DB_PASSWORD']);
   		$conn->exec("CREATE DATABASE IF NOT EXISTS `minhaa-websyslab9` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
		USE `minhaa-websyslab9`;");
      	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   } catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
   }

   if ($conn) {
      echo "Connected!";
   }

   $conn->exec("CREATE TABLE `courses` (
  `crn` int(11) NOT NULL,
  `prefix` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` smallint(4) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` int(2) NOT NULL,
  `year` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;")


?>