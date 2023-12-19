<?php
$conn = mysqli_connect("localhost", "root", "", "zoxan");
if (!$conn) {
    die("Ошибка: " . mysqli_connect_error());
}
$name=$_POST["name"];
$lastname=$_POST["lastname"];
$surname=$_POST["surname"];
$date=$_POST["date"];
$karts=$_POST["karts"];
$oms=$_POST["oms"];
$adres=$_POST["adres"];
$sql = "INSERT INTO pacients (name, lastname,surname, date, karts, oms, adres) VALUES ('$name', '$lastname', '$surname', '$date', '$karts', '$oms', '$adres')";
if(mysqli_query($conn, $sql)){
    echo "Данные успешно добавлены";
} else{
    echo "Ошибка: " . mysqli_error($conn);
}
mysqli_close($conn);

?>
