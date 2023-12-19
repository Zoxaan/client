<?php
var_dump($_POST);

$conn = mysqli_connect("localhost", "root", "", "zoxan");
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Проверка метода запроса
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Проверка существования и непустоты переданных данных
    if (
        isset($_POST['id']) &&
        isset($_POST['datepost']) &&
        isset($_POST['diagnoz']) &&
        isset($_POST['heal']) &&
        isset($_POST['doctor']) &&
        isset($_POST['user_id'])
    ) {
        // Получение данных из запроса
        $medcartId = $_POST['id'];
        $newDatepost = $_POST['datepost'];
        $newDiagnoz = $_POST['diagnoz'];
        $newHeal = $_POST['heal'];
        $newDoctor = $_POST['doctor'];
        $userId = $_POST['user_id'];

        // Подготовленный запрос для обновления данных в базе данных
        $stmt = $conn->prepare("UPDATE medcarts SET datepost=?, diagnoz=?, heal=?, doctor=?, user_id=? WHERE id=?");
        $stmt->bind_param("ssssss", $newDatepost, $newDiagnoz, $newHeal, $newDoctor, $userId, $medcartId);

        // Выполнение запроса
        if ($stmt->execute()) {
            // Возвращение успешного ответа
            echo "Success";
        } else {
            // Возвращение ошибки в случае неудачи
            http_response_code(500);
            echo "Ошибка при выполнении запроса: " . $stmt->error;
        }

        // Закрытие подготовленного запроса
        $stmt->close();
    } else {
        // Возвращение ошибки, если не переданы необходимые данные
        http_response_code(400);
        echo "Bad Request: Не переданы необходимые данные";
    }
} else {
    // Возвращение ошибки, если запрос не является POST
    http_response_code(400);
    echo "Bad Request: Запрос не является POST";
}

// Закрытие подключения к базе данных
$conn->close();
?>
