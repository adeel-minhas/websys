<?php 
  abstract class Operation {
    protected $operand_1;
    protected $operand_2;
    public function __construct($o1, $o2) {
      // Make sure we're working with numbers...
      if (!is_numeric($o1) || !is_numeric($o2)) {
        throw new Exception('Non-numeric operand.');
      }
      
      $this->operand_1 = $o1;
      $this->operand_2 = $o2;
    }
    public abstract function operate();
    public abstract function getEquation(); 
  }

  class Addition extends Operation {
    public function operate() {
      return $this->operand_1 + $this->operand_2;
    }
    public function getEquation() {
      $answer = $this->operand_1 . ' + ' . $this->operand_2 . ' = ' . $this->operate();
      echo "<div id='answer'>" . $answer . "</div>";
    }
  }


// Part 1 - Add subclasses for Subtraction, Multiplication and Division here
  class Subtraction extends Operation{
    public function operate() {
      return $this->operand_1 - $this->operand_2;
    }
    public function getEquation(){
      $answer = $this->operand_1 . ' - ' . $this->operand_2 . ' = ' . $this->operate();
      echo "<div id='answer'>" . $answer . "</div>";
    }
  }

   class Multiplication extends Operation{
    public function operate() {
      return $this->operand_1 * $this->operand_2;
    }
    public function getEquation(){
      $answer = $this->operand_1 . ' * ' . $this->operand_2 . ' = ' . $this->operate();
      echo "<div id='answer'>" . $answer . "</div>";
    }
  }

  class Division extends Operation{
    public function operate() {
      return $this->operand_1 / $this->operand_2;
    }
    public function getEquation(){
      $answer = $this->operand_1 . ' / ' . $this->operand_2 . ' = ' . $this->operate();
      echo "<div id='answer'>" . $answer . "</div>";
    }
  }

  //need to do cube and factorial as well (how to do without causing an error?)
  class Cube extends Operation{
    public function operate() {
      return $this->operand_1 * ($this->operand_1 * $this->operand_1);
    }
    public function getEquation(){
      $answer = $this->operand_1 . ' ^ ' . 3 . ' = ' . $this->operate();
      echo "<div id='answer'>" . $answer . "</div>";
    }
  }

 class Factorial extends Operation{
    public function operate()
    {
      $num = 1;
      while ($this->operand_1 >= 1)
      {
        $num = $num * $this->operand_1;
        $this->operand_1 = $this->operand_1 - 1;
      }
      return $num;
    }
    public function getEquation()
    {
      $answer = $this->operand_1 . '! = ' . $this->operate();
      echo "<div id='answer'>" . $answer . "</div>";
    }
  }

   class Square extends Operation{
    public function operate() {
      return $this->operand_1 * $this->operand_1;
    }
    public function getEquation(){
      $answer = $this->operand_1 . ' ^ ' . 2 . ' = ' . $this->operate();
      echo "<div id='answer'>" . $answer . "</div>";
    }
  }
// End Part 1




// Some debugs - un comment them to see what is happening...
// echo '$_POST print_r=>',print_r($_POST);
// echo "<br>",'$_POST vardump=>',var_dump($_POST);
// echo '<br/>$_POST is ', (isset($_POST) ? 'set' : 'NOT set'), "<br/>";
// echo "<br/>---";




// Check to make sure that POST was received 
// upon initial load, the page will be sent back via the initial GET at which time
// the $_POST array will not have values - trying to access it will give undefined message

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $o1 = $_POST['op1'];
    $o2 = $_POST['op2'];
  }
  $err = Array();


// Part 2 - Instantiate an object for each operation based on the values returned on the form
//          For example, check to make sure that $_POST is set and then check its value and 
//          instantiate its object
// 
// The Add is done below.  Go ahead and finish the remiannig functions.  
// Then tell me if there is a way to do this without the ifs

  try {
    if (isset($_POST['add']) && $_POST['add'] == 'Add') {
      $op = new Addition($o1, $o2);
    }
    if (isset($_POST['sub']) && $_POST['sub'] == 'Subtract') {
      $op = new Subtraction($o1, $o2);
    }
    if (isset($_POST['mult']) && $_POST['mult'] == 'Multiply') {
      $op = new Multiplication($o1, $o2);
    }
    if (isset($_POST['div']) && $_POST['div'] == 'Divide') {
      $op = new Division($o1, $o2);
    }
    if (isset($_POST['cube']) && $_POST['cube'] == 'Cube') {
      $op = new Cube($o1, $o2);
    }
    if (isset($_POST['factorial']) && $_POST['factorial'] == 'Factorial') {
      $op = new Factorial($o1, $o2);
    }
     if (isset($_POST['square']) && $_POST['square'] == 'Square') {
      $op = new Square($o1, $o2);
    }
// Put the code for Part 2 here  \/





// End of Part 2   /\

  }
  catch (Exception $e) {
    $err[] = $e->getMessage();
  }
?>

<!doctype html>
<html>
<head>
<title>Lab 6 - Adeel Minhas</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="lab6.css">
</head>
<h1><kbd>Calculator</kbd></h1>
<body>
  <img src="fun.jpg" alt="fun" style="width:304px;height:228px;margin-right:auto;margin-left:auto; display: block;padding-bottom: 10px;">
  <pre class = "resultblock" id="result">
  <?php 
    if (isset($op)) {
      try {
        echo $op->getEquation();
      }
      catch (Exception $e) { 
        $err[] = $e->getMessage();
      }
    }
      
    foreach($err as $error) {
        echo $error . "\n";
    } 
  ?>
  </pre>
  <form method="post" action="lab7start.php">
    <input class="form-control" type="text" name="op1" id="name" value="" />
    <input class="form-control" type="text" name="op2" id="name" value="" />
        <br/>
    <!-- Only one of these will be set with their respective value at a time -->
    <div class ="row">
      <div class="btn-group btn-group-justified">
        <div class="btn-group">
          <input class = "btn btn-primary" input type="submit" name="add" value="Add" />
        </div>
        <div class="btn-group">
          <input class="btn btn-success" type="submit" name="sub" value="Subtract" />  
        </div>
        <div class="btn-group">
          <input class="btn btn-info" type="submit" name="mult" value="Multiply" />  
        </div>
        <div class="btn-group">
          <input class="btn btn-warning" type="submit" name="div" value="Divide" />  
        </div>
        <div class="btn-group">
          <input class="btn btn-danger" type="submit" name="cube" value="Cube" /> 
        </div>
        <div class="btn-group"> 
          <input class = "btn btn-primary" type="submit" name="factorial" value="Factorial" />  
        </div>
        <div class="btn-group">
          <input class = "btn btn-warning" input type="submit" name="square" value="Square" />
        </div>
      </div>
    </div>
  </form>
  <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        $("body").css("background","url(bg.jpg) no-repeat ");
    });
  </script>
</body>
</html>

