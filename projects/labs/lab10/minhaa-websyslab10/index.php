<html>
<head>
  <title>Adeel Minhas - Lab 10</title>
  <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
</head>
<body>
  <h1>Welcome to my Lab 10 Page - Adeel Minhas</h1>

  <?php
// 
//   $conn = pg_connect("host=localhost port=5432 dbname=minhaa-websyslab10");
//
// // if ($conn) {
// //    echo "Connected to the Database WOOO!";
// // }
// //
// // if (!$conn) {
// //   echo "An error occurred.\n";
// //   exit;
// // }
   ?>

  <h2>Install Database</h2>

  <form method="post" action="install.php">
    <input name="Install Database" type="submit" value="Install Database" />
  </form>

  <h2>Migrate Data<h2>

  <form method="post" action="migrate.php">
    <input name="Migrate Data" type="submit" value="Migrate Data" />
  </form>

  <h2>Query Database</h2>

  <form method="post" action="select.php">
    <input name="Select Data" type="submit" value="Select Data" />
  </form>



</body>
</html>
