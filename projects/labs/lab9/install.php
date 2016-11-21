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
      echo "Connected to the Database WOOO!";
   }

  $conn->exec("CREATE TABLE IF NOT EXISTS `courses` (
  `crn` int(11) NOT NULL,
  `prefix` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` smallint(4) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` int(2) NOT NULL,
  `year` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");

	$conn->exec("CREATE TABLE IF NOT EXISTS `students` (
	  `rin` int(9) NOT NULL,
	  `rcsid` char(7) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `first name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `last name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `alias` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `phone` int(10) NOT NULL,
	  `street` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `state` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `zip` int(5) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");

	$conn->exec("CREATE TABLE IF NOT EXISTS `grades` (
	  `id` int(11) NOT NULL,
	  `crn` int(11) NOT NULL,
	  `rin` int(11) NOT NULL,
	  `grade` int(3) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

	$conn->exec("ALTER TABLE `grades`
	  ADD PRIMARY KEY IF NOT EXISTS (`id`),
	  ADD KEY IF NOT EXISTS `crn` (`crn`),
	  ADD KEY IF NOT EXISTS `rin` (`rin`);");

	$conn->exec("ALTER TABLE `students`
	  ADD PRIMARY KEY IF NOT EXISTS (`rin`);");

	$conn->exec("ALTER TABLE `grades`
	  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;");

	$conn->exec("ALTER TABLE `grades`
	  ADD CONSTRAINT `grades_crn` FOREIGN KEY IF NOT EXISTS (`crn`) REFERENCES `courses` (`crn`),
	  ADD CONSTRAINT `grades_rin` FOREIGN KEY IF NOT EXISTS (`rin`) REFERENCES `students` (`rin`);
		")

?>
