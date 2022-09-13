<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Buku</title>
</head>
<body>
    
<?php
include 'variable.php';
$variant = variable();

// define variables and set to empty values
$borrow_idErr = $book_idErr = $member_idErr = $statusErr = "";
$borrow_id = $book_id = $member_id = $status = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["borrow_id"])) {
    $borrow_idErr = "ID buku gagal diterima!";
  } else {
    $borrow_id = test_input($_POST["borrow_id"]);
  }

  if (empty($_POST["book_id"])) {
    $book_idErr = "ID buku harus diisi!";
  } else {
    $book_id = test_input($_POST["book_id"]);
  }

  if (empty($_POST["member_id"])) {
    $member_idErr = "ID member harus diisi!";
  } else {
    $member_id = test_input($_POST["member_id"]);
    // check if member_id only contains letters and whitespace
  }
  
  if (empty($_POST["status"])) {
    $statusErr = "status harus diisi!";
  } else {
    $status = test_input($_POST["status"]);
  }


    if ($borrow_idErr || $book_idErr || $member_idErr || $statusErr) {
        echo "<h2>Update data pinjaman gagal</h2>";
        echo $borrow_idErr;
        echo "<br>";
        echo $book_idErr;
        echo "<br>";
        echo $member_idErr;
        echo "<br>";
        echo $statusErr;
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

    $sql = "UPDATE borrow SET 
    book_id = '".$book_id."'
    ,member_id = '".$member_id."'
    ,status = '".$status."'
    WHERE borrow_id=".$borrow_id;

    if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    } else {
    echo "Error updating record: " . $conn->error;
    }

    $conn->close();

    echo "<h2>Data Buku berhasil diubah:</h2>";
    echo $book_id;
    echo "<br>";
    echo $member_id;
    echo "<br>";
    echo $status;
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

