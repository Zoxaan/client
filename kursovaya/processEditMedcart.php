<?php
$conn = mysqli_connect("localhost", "root", "", "zoxan");



$id = $_POST['id'];
$datepost = $_POST['datepost'];
$diagnoz = $_POST['diagnoz'];
$heal = $_POST['heal'];
$doctor = $_POST['doctor'];

// Выполнение запроса на обновление записи
$updateQuery = "UPDATE medical_records SET datepost = '$datepost', diagnoz = '$diagnoz', heal = '$heal', doctor = '$doctor' WHERE id = $id";
$result = $conn->query($updateQuery);

// Проверка результата выполнения запроса
if ($result) {
    echo "Медкарта успешно обновлена.";
} else {
    echo "Ошибка при обновлении медкарты: " . mysqli_error($conn);
}
?>
