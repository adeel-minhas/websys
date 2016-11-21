<?php
$config = array(
 'DB_HOST'     => 'localhost',
 'DB_USERNAME' => 'root', //added root as the username
 'DB_PASSWORD' => '',
 );

 try {
    require_once 'index.php';
    $conn = new PDO('mysql:host=localhost;dbname=minhaa-websyslab9', $config['DB_USERNAME'], $config['DB_PASSWORD']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if($theoptionselected == 'Alphabetical Order')
  {
    $stmt = $conn->prepare("SELECT `first name`, `last name` FROM `students` ORDER BY `last name` ASC, `first name` ASC;");
    $stmt->execute();

    $result = $stmt->fetchAll();

    echo "<br>";
    foreach($result as $r) {
      echo $r['first name'] . " " . $r['last name'] . "<br>";
    }

  }

  else if($theoptionselected == 'Grade Distribution')
  {
    $stmt = $conn->prepare("SELECT COUNT('grade') FROM `grades` WHERE `grade` BETWEEN 90 and 100");
    $stmt->execute();

    $result = $stmt->fetch();

    echo "<br> 90 - 100 count <br>";
    echo $result[0];

    $stmt = $conn->prepare("SELECT COUNT('grade') FROM `grades` WHERE `grade` BETWEEN 80 and 89");
    $stmt->execute();

    $result = $stmt->fetch();

    echo "<br> 80 - 89 count <br>";
    echo $result[0];

    $stmt = $conn->prepare("SELECT COUNT('grade') FROM `grades` WHERE `grade` BETWEEN 70 and 79");
    $stmt->execute();

    $result = $stmt->fetch();

    echo "<br> 70 - 79 count <br>";
    echo $result[0];

    $stmt = $conn->prepare("SELECT COUNT('grade') FROM `grades` WHERE `grade` BETWEEN 65 and 69");
    $stmt->execute();

    $result = $stmt->fetch();

    echo "<br> 65 - 69 count <br>";
    echo $result[0];

    $stmt = $conn->prepare("SELECT COUNT('grade') FROM `grades` WHERE `grade` < 65");
    $stmt->execute();

    $result = $stmt->fetch();

    echo "<br> < 65 count <br>";
    echo $result[0];



  }

}
catch(PDOException $e) {
   echo 'ERROR: ' . $e->getMessage();
}

?>
