<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjam buku</title>
</head>
<body>
    
<?php
include 'variable.php';
$variant = variable();

// define variables and set to empty values
$book_idErr = $member_idErr = "";
$book_id = $member_id = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["book_id"])) {
    $book_idErr = "Buku harus diisi!";
  } else {
    $book_id = test_input($_POST["book_id"]);
  }

  if (empty($_POST["member_id"])) {
    $member_idErr = "Member harus diisi!";
  } else {
    $member_id = test_input($_POST["member_id"]);
  }
  
    if ($book_idErr || $member_idErr ) {
        echo "<h2>Submisi buku gagal:</h2>";
        echo $book_idErr;
        echo "<br>";
        echo $member_idErr;
        echo "<br>";
    } else {
    $servername = $variant[0];
    $username = $variant[1];
    $password = $variant[2];
    $dbname = $variant[3];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO borrow (book_id, member_id, status)
    VALUES ('".$book_id."', '".$member_id."', 'borrowed')";

    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    echo "<h2>Data pinjaman berhasil diinput:</h2>";
    echo $book_id;
    echo "<br>";
    echo $member_id;
    echo "<br>";
    }
} else {
    echo "Silakan masukan data melalui form";
}   

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
header("location: readBorrow.php");
die();
?>
</body>
</html>