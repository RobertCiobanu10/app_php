<?php
//connect to mysql_server
//mysqli_connect("194.102.200.13","user","password","DB_name")
$db=mysqli_connect("localhost","root","root","CSB");
//$conn = new mysqli($servername, $username, $password);
//echo $db;

//mysql_query();
$query=mysqli_query($db,"SELECT * FROM students");
//$result = $conn->query($sql);

//retrieving the results
//1. mysqli_fetch_row(); - fetches each colomn of the result in an array element indexed with 0,1,2,3
//$result=mysqli_fetch_row($query);
//result[0]->ID; result[1]->name; result[2]->sex

//while($row = $result->fetch_row()) {
while ($result=mysqli_fetch_row($query))
  {
    print_r($result);echo "<br>";
    }
//$result=mysqli_fetch_row($query);
//echo "<br>";
//print_r($result);

//2. mysqli_fetch_assoc(); - fetches each column from the result into an alphanumerically indexed array
$query=mysqli_query($db,"SELECT * FROM students");
//while($row = $result->fetch_assoc()) {
while ($result=mysqli_fetch_assoc($query))
  {
    print_r($result);echo "<br>";
    }
//echo "<br>";

//3. mysqli_fetch_array(); - fetches each colomn from the result into both numerical and alphanumerically indexed array
$query=mysqli_query($db,"SELECT * FROM students");
//while($row = $result->fetch_array()) {
while ($result=mysqli_fetch_array($query))
  {
    print_r($result);echo "<br>";
    }

//4. mysqli_fetch_object(); - fetches each column into an object define_syslog_variables
$query=mysqli_query($db,"SELECT * FROM students");
//while($row = $result->fetch_object()) {
while ($result=mysqli_fetch_object($query))
  {
    echo $result->ID;echo ",";
    echo $result->name;echo ",";
    echo $result->sex;echo ",";
    echo $result->birthdate;echo ",";
    echo $result->year;echo ",";
    echo $result->FK_Faculty_ID;echo ",";
    }

//objectual connection to mysqli
/*
$mysqli = new mysqli("example.com", "user", "password", "database");
/* Prepared statement, stage 1: prepare
$stmt = $mysqli->prepare("INSERT INTO test(id, label) VALUES (?, ?)");
$stmt->bind_param("is", 3, "myl_label"); // "is" means that $id is bound as an integer and $label as a string
*/

//other useful functions
$query=mysqli_query($db,"SELECT * FROM students where sex='F'");
//mysqli_num_rows(); - calculates the total number of rows returned by a previous query
echo "<br>Number of students: ".mysqli_num_rows($query);
//$result->num_rows

//mysqli_error(); - displays the error in the query
//$mysqli -> error
$query=mysqli_query($db,"SELECT * from student");
if (!mysqli_num_rows($query)) echo "<br>Error:".mysqli_error($db);


//mysqli_affected_rows(); - counts the modified rows (UPDATE,INSERT,DELETE)
//$mysqli->affected_rows
if(mysqli_affected_rows($db)>0) echo "Record successfully inserted!";
  else echo "Error: ".mysqli_error($db);
//be careful that mysqli_affected_rows() returns -1 if the query has an error!

//mysqli_close();
//$mysqli -> close()
if (mysqli_close($db)) echo "successfully disconnected";
?>
