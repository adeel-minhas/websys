<?php

$conn = pg_connect("host=localhost port=5432 dbname=minhaa-websyslab10");

if (!$conn) {
echo "An error occurred.\n";
exit;
}


$studentquery = "SELECT students.first_name, students.last_name, grades.grade, courses.title
FROM students, courses, grades
WHERE (grades.grade >=90)
AND (grades.rin = students.rin)
AND (grades.crn = courses.crn);";


  $ret = pg_query($conn, $studentquery);
    if(!$ret){
       echo pg_last_error($conn);
    }
    $courses = array();
    while ($row = pg_fetch_row($ret)) {
      $coursetitle = $row[3];
      if (array_key_exists($coursetitle, $courses))
      {
        $courses[$coursetitle]+=1;
      }
      else {
        $courses[$coursetitle] = 1;
      }

      echo "<table>";
      echo "<tr>";
      echo "<th>First Name</th>";
      echo "<th>Last Name</th>";
      echo "</tr>";
      echo "<tr>";
        echo "<td> $row[0] </td>";
        echo "<td> $row[1] </td>";
      echo "</tr>";
      echo "</table>";

    }

    $max = 0;

	foreach($courses as $count)
	{
		if ($count > $max)
		{
			$max = $count;
		}
	}

	$course = array_search($coursetitle, $courses);

	echo "The max count: " . $count;
	echo "<br>";
	echo "Course with max count: (it just outputted the last course with a 90+ grade): " . $coursetitle;




?>
