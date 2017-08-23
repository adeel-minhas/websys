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
    echo "Connected to the Database websyslab9 WOOO! <br/>";
 }


 $conn1 = pg_connect("host=localhost port=5432 dbname=minhaa-websyslab10");

if ($conn1) {
  echo "Connected to the Database websyslab10 WOOO! <br/>";
}

if (!$conn1) {
 echo "An error occurred.\n";
 exit;
}

$coursesdata = "SELECT * FROM courses";
$studentsdata = "SELECT * FROM students";
$gradesdata = "SELECT * FROM grades";


$query2 = $conn->prepare($coursesdata);
$query2->execute();
$result2 = $query2;

foreach($result2 as $row2)
{
  $crn = $row2['crn'];
  $prefix = $row2['prefix'];
  $number = $row2['number'];
  $title = $row2['title'];
  $section = $row2['section'];
  $year = $row2['year'];


  $insertcourses =<<<EOF
  INSERT INTO courses (crn, prefix, number, title, section, year)
  VALUES ('$crn', '$prefix', '$number', '$title', '$section', '$year') ON CONFLICT DO NOTHING;
EOF;

  $ret = pg_query($conn1, $insertcourses);
    if(!$ret){
       echo pg_last_error($conn1);
    } else {
       echo 'Added a row to courses table! <br/>';
    }
}

//-----------------------------------------------//

$query = $conn->prepare($studentsdata);
$query->execute();
$result = $query;

foreach($result as $row)
{
  $rin = $row['rin'];
  $rcsid = $row['rcsid'];
  $firstname = $row['first name'];
  $lastname = $row['last name'];
  $alias = $row['alias'];
  $phone = $row['phone'];
  $street = $row['street'];
  $city = $row['city'];
  $state = $row['state'];
  $zip = $row['zip'];


  $insertstudents = <<<EOF
    INSERT INTO students (rin, rcsid, first_name, last_name, alias, phone, street, city, state, zip) VALUES ('$rin', '$rcsid', '$firstname', '$lastname', '$alias', '$phone', '$street', '$city', '$state', '$zip') ON CONFLICT DO NOTHING;
EOF;

$ret = pg_query($conn1, $insertstudents);
  if(!$ret){
     echo pg_last_error($conn1);
  } else {
     echo 'Added a row to students table! <br/>';
  }
}
//------------------------------------------------//
  $query = $conn->prepare($gradesdata);
  $query->execute();
  $result = $query;

  foreach($result as $row)
  {

  $id = $row['id'];
  $crn = $row['crn'];
  $rin = $row['rin'];
  $grade = $row['grade'];

  $insertgrades = <<<EOF
    INSERT INTO grades (id, crn, rin, grade) VALUES ('$id', '$crn', '$rin', '$grade') ON CONFLICT DO NOTHING;
EOF;

$ret = pg_query($conn1, $insertgrades);
  if(!$ret)
  {
     echo pg_last_error($conn1);
  }
  else
  {
     echo "Added a row to grades table!\n";
     echo "<br>";
  }
}

?>
