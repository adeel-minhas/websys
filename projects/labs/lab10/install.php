<?php
  $conn = pg_connect("host=localhost port=5432 dbname=minhaa-websyslab10");

if ($conn) {
   echo "Connected to the Database WOOO! <br/>";
}

if (!$conn) {
  echo "An error occurred.\n";
  exit;
}

//had to remove sixze of ints and smallints(wonder if it will still work properly...was getting a syntax error before?)
$sql =<<<EOF
    CREATE TABLE IF NOT EXISTS courses
    (CRN INT NOT NULL,
    prefix varchar(4)  NOT NULL,
    number smallint NOT NULL,
    title varchar(255) NOT NULL,
    section INT NOT NULL,
    year INT NOT NULL);
EOF;

$ret = pg_query($conn, $sql);
  if(!$ret){
     echo pg_last_error($conn);
  } else {
     echo "\nTable courses created successfully <br/>";
  }

//added _ where their would be spaces for first name and last name
  $sql1 =<<<EOF
  CREATE TABLE IF NOT EXISTS students
  ( rin int PRIMARY KEY NOT NULL,
	  rcsid char(7) NOT NULL,
	  first_name varchar(100) NOT NULL,
	  last_name varchar(100) NOT NULL,
	  alias varchar(100)  NOT NULL,
	  phone int NOT NULL,
	  street varchar(100) NOT NULL,
	  city varchar(100) NOT NULL,
	  state varchar(100)  NOT NULL,
	  zip int NOT NULL);
EOF;

$ret1 = pg_query($conn, $sql1);
  if(!$ret1){
     echo pg_last_error($conn);
  } else {
     echo "\nTable students created successfully <br/>";
  }

//refernces means I added foreign keys
//changed the type of id to serial to auto increment...is there another way?
  $sql2 =<<<EOF
  CREATE TABLE IF NOT EXISTS grades
  (
	  id SERIAL PRIMARY KEY NOT NULL,
	  crn int NOT NULL,
	  rin int NOT NULL,
	  grade int NOT NULL,
    grades_crn int references courses (crn),
    grades_rin int references students (rin)
  );
EOF;

$ret2 = pg_query($conn, $sql2);
  if(!$ret2){
     echo pg_last_error($conn);
  } else {
     echo "\n Table grades created successfully\n";
  }


echo "<br/> You're done woohoo!";
?>
