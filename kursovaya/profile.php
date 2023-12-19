<?php
session_start();
$id=$_SESSION['user_id'];
$conn = mysqli_connect("localhost", "root", "", "zoxan");
$query = $conn->query("SELECT * FROM users WHERE id='$id'");
while($user = mysqli_fetch_assoc($query))
{
    $users[] = $user;
}
if ($_SESSION['idrolle'] != 2){
    header("location:reg.php");
}
?>
<!DOCTYPE html>
<?php include "headet.php"; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<img src= class="img-thumbnail" alt="...">
</body>
</html>
