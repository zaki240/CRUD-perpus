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
$member_idErr = $first_nameErr = $last_nameErr = $emailErr = "";
$member_id = $first_name = $last_name = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["member_id"])) {
    $member_idErr = "ID buku gagal diterima!";
  } else {
    $member_id = test_input($_POST["member_id"]);
  }

  if (empty($_POST["first_name"])) {
    $first_nameErr = "Judul buku harus diisi!";
  } else {
    $first_name = test_input($_POST["first_name"]);
  }

  if (empty($_POST["last_name"])) {
    $last_nameErr = "Nama penulis harus diisi!";
  } else {
    $last_name = test_input($_POST["last_name"]);
    // check if last_name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$last_name)) {
      $last_nameErr = "Nama penulis tidak boleh mengandung angka dan simbol!";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Tanggal terbit harus diisi!";
  } else {
    $email = test_input($_POST["email"]);
    // $parsed_date = date_parse($email);
    // // check if e-mail address is well-formed
    // if (!checkdate($parsed_date['month'], $parsed_date['day'], $parsed_date['year'])) {
    //   $emailErr = "Format tanggal terbit tidak valid!";
    // }
  }


    if ($member_idErr || $first_nameErr || $last_nameErr || $emailErr) {
        echo "<h2>Submisi buku gagal:</h2>";
        echo $member_idErr;
        echo "<br>";
        echo $first_nameErr;
        echo "<br>";
        echo $last_nameErr;
        echo "<br>";
        echo $emailErr;
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

    $sql = "UPDATE member SET 
    first_name = '".$first_name."'
    ,last_name = '".$last_name."'
    ,email = '".$email."'
    WHERE member_id=".$member_id;

    if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    } else {
    echo "Error updating record: " . $conn->error;
    }

    $conn->close();

    echo "<h2>Data Buku berhasil diubah:</h2>";
    echo $first_name;
    echo "<br>";
    echo $last_name;
    echo "<br>";
    echo $email;
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
header("location: readMembers.php");
die();
?>
</body>
</html>