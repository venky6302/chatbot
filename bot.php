<!-- php start for bot-->
<!-- step 1 => create database for response and user messages -->
<!-- step 2 => create a connection -->

<?php
// server = localhost
// username = root
// password = "" (blank)
// database Name = your database name

$conn = mysqli_connect("localhost","root","","onlinebot");
 
if($conn){
$user_messages = mysqli_real_escape_string($conn, $_POST['messageValue']);

$query = "SELECT * FROM chatbot WHERE messages = '$user_messages'";
$runQuery = mysqli_query($conn, $query);
$query1 = "SELECT * FROM sample1 WHERE rollno = '$user_messages'";
$runQuery1 = mysqli_query($conn, $query1);
$query2 = "SELECT * FROM samplemid WHERE messages = '$user_messages'";
$runQuery2 = mysqli_query($conn, $query2);

if(mysqli_num_rows($runQuery2) > 0){
    // fetch result
    $result = mysqli_fetch_assoc($runQuery2);
    // echo result

    echo $result['response'];
}
else if(mysqli_num_rows($runQuery) > 0){
    // fetch result
    $result = mysqli_fetch_assoc($runQuery);
    // echo result

    echo $result['response'];
}
else if(mysqli_num_rows($runQuery1) > 0){
    // fetch result
    $result = mysqli_fetch_assoc($runQuery1);
    // echo result
    echo $result['name'];
    echo "<br>";
    echo $result['department'];
    echo "<br>";
    echo $result['phoneno'];
}
else{
    echo "Sorry can't be able to understand you!";
}
}else{
    echo "connection Failed " . mysqli_connect_errno();
}
?>