<?php

  $config = array(
   'DB_HOST'     => 'localhost',
   'DB_USERNAME' => 'root', //added root as the username
   'DB_PASSWORD' => '',
   );

   try {
      $conn = new PDO('mysql:host=localhost;dbname=minhaa-websyslab9', $config['DB_USERNAME'], $config['DB_PASSWORD']);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
       echo 'ERROR: ' . $e->getMessage();
    }




// setup INSERT statement here (added INSERT IGNORE INTO to account for errors)
//inserting courses
$cour = $conn->exec("INSERT IGNORE INTO `courses` (`crn`, `prefix`, `number`, `title`, `section`, `year`) VALUES
(35090, 'PSYC', 1200, 'General Psychology', 2, 2017),
(35130, 'CHME', 2020, 'Energy, Entropy, and Equilibrium', 1, 2017),
(35303, 'ECON', 1200, 'Introductory Economics', 1, 2017),
(35392, 'PSYC', 1200, 'Critical Thinking', 1, 2017),
(35439, 'CSCI', 1100, 'Computer Science 1', 1, 2017),
(35444, 'CSCI', 1200, 'Data Structures', 1, 2017),
(35672, 'CHEM', 1100, 'Chemistry 1', 1, 2017),
(37350, 'ITWS', 1220, 'IT and Society', 1, 2017),
(37565, 'MGMT', 2510, 'Microcomputers and Applications', 1, 2017),
(37889, 'BIOL', 1010, 'Introduction to Biology', 1, 2017);");

  $results = $conn->query('SELECT *FROM courses ');

  // Output query results
  foreach ($results as $row) {
     printf("%s<br>", $row['title']);
  }

  echo "INSERTED COURSES YEA BOI! <br> ";

//inserted students
$conn->exec("INSERT IGNORE INTO `students` (`rin`, `rcsid`, `first name`, `last name`, `alias`, `phone`, `street`, `city`, `state`, `zip`) VALUES
(660350644, 'slotep', 'Parker', 'Slote', 'Park', 516777777, '2 Alva Road', 'Niskayuna', 'NY', 12309),
(661170510, 'minhay', 'Yousuf', 'Minhas', 'You', 518123444, '1 Cherry Road', 'Troy', 'NY', 12110),
(661170544, 'minhar', 'Robert', 'Minhas', 'Rob', 518444444, '2 Menlo Park Road', 'Niskayuna', 'NY', 12309),
(661370610, 'phillic', 'Christine', 'Phillips', 'Christy', 1111111111, '5 Congress Street', 'Troy', 'NY', 12110),
(661370622, 'minhah', 'Hunter', 'Minhas', 'Hunt', 518364555, '1 Orchard Park Road', 'Niskayuna', 'NY', 12309),
(661370632, 'minhao', 'Osama', 'Minhas', 'Os', 518777777, '3 13th Street', 'Troy', 'NY', 12110),
(661370644, 'minhaa', 'Adeel', 'Minhas', 'AJM', 999999999, '10 Alva Road', 'Albany', 'NY', 12309),
(661370689, 'turne1', 'Rebecca', 'Turner', 'Becca', 555555555, '10 Hoosick Street', 'Troy', 'NY', 12110),
(661384441, 'gardnh1', 'Helen', 'Gardner', 'Hel', 518999999, '1 15th Streer', 'Troy', 'NY', 12110),
(661570644, 'minhaj', 'Joesph', 'Minhas', 'Joe', 518234555, '3 13th Street', 'Troy', 'NY', 12110);");

$resultsofstudents = $conn->query('SELECT *FROM students ');

// Output query results
foreach ($resultsofstudents as $row) {
   printf("%s %s <br>", $row['first name'], $row['last name']);
}

echo "INSERTED STUDENTS YEA BOI! <br> ";


//inserting grades
$conn->exec("INSERT IGNORE INTO `grades` (`id`, `crn`, `rin`, `grade`) VALUES
(1, 35090, 660350644, 85),
(2, 35130, 661170510, 80),
(3, 35303, 661170544, 90),
(4, 35392, 661370610, 80),
(5, 35439, 661370622, 100),
(6, 35444, 661370632, 85),
(7, 35672, 661370644, 70),
(8, 37350, 661370689, 80),
(9, 37565, 661384441, 90),
(10, 37889, 661570644, 96),
(11, 35090, 660350644, 50),
(12, 35130, 661170510, 100),
(13, 35303, 661170544, 75),
(14, 35392, 661370610, 98),
(15, 35439, 661370622, 90),
(16, 35444, 661370632, 80),
(17, 35672, 661370644, 80),
(18, 37350, 661370689, 100),
(19, 37565, 661384441, 50),
(20, 37889, 661570644, 80);");


$resultsofgrades = $conn->query('SELECT *FROM grades ');

// Output query results
foreach ($resultsofgrades as $row) {
   printf("rin: %s grade: %s <br>", $row['rin'], $row['grade']);
}

echo "INSERTED GRADES YEA BOI! "


?>
