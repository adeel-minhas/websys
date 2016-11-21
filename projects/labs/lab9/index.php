<html>
<head>
  <title>Adeel Minhas - Lab 9</title>
  <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
</head>
<body>
  <h1>Welcome to my Lab 9 Page - Adeel Minhas</h1>

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

   if(isset($_POST['submit'])){

     if(isset($_POST['options'])){
       $theoptionselected = $_POST['options'];
       echo "You have chosen: " . $theoptionselected;
       include 'output.php';
     }
   }
   ?>

  <h2>Create Database</h2>

  <form method="post" action="install.php">
    <input name="Install Database" type="submit" value="Install Database" />
  </form>

  <h2>Insert Courses, Students and Grades<h2>

  <form method="post" action="insert.php">
    <input name="Insert Data" type="submit" value="Insert Data" />
  </form>

  <h2>List Students in Alphabetical Order or View There Grade Distribution</h2>

  <form action="index.php" method="post">
    <select id = "options" name = "options">
      <option value="Alphabetical Order">Alphabetical Order</option>
      <option value="Grade Distribution">Grade Distribution</option>
    </select>
    <input name = "submit" type="submit" value="Submit">
  </form>
</body>
</html>
