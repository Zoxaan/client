<?php
include "headet.php";

$medcartId = isset($_GET['medcartId']) ? $_GET['medcartId'] : null;

if ($medcartId === null) {
    // Обработка ошибки, если идентификатор не был передан
    echo "Ошибка: Не передан идентификатор медкарты.";
    exit;
}

// Загрузка данных медкарты для редактирования
$conn = mysqli_connect("localhost", "root", "", "zoxan");
$query = $conn->query("SELECT * FROM medcarts WHERE id='$medcartId'");
$medcart = mysqli_fetch_assoc($query);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Обработка данных формы после их отправки
    $medcartId = $conn->real_escape_string($_POST['id']);
    $newDatepost = $conn->real_escape_string($_POST['datepost']);
    $newDiagnoz = $conn->real_escape_string($_POST['diagnoz']);
    $newHeal = $conn->real_escape_string($_POST['heal']);
    $newDoctor = $conn->real_escape_string($_POST['doctor']);

    // Подготовленный запрос для обновления данных в базе данных
    $stmt = $conn->prepare("UPDATE medcarts SET datepost=?, diagnoz=?, heal=?, doctor=? WHERE id=?");
    $stmt->bind_param("sssss", $newDatepost, $newDiagnoz, $newHeal, $newDoctor, $medcartId);

    // Выполнение запроса
    if ($stmt->execute()) {
        // Возвращение успешного ответа
        header("Location: strprofile.php");
    } else {
        // Возвращение ошибки в случае неудачи
        http_response_code(500);
        echo "Ошибка при выполнении запроса: " . $stmt->error;
    }

    // Закрытие подготовленного запроса
    $stmt->close();
    exit; // Завершение выполнения скрипта после обработки данных формы
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form id="editMedcartForm" action="" method="post" class="pumbaforms row g-3 align-items-center flex-column mx-auto text-center" onsubmit="return validateForm()" style="border-radius: 10px; /* Закругление углов контейнера */box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Тень контейнера */background: linear-gradient(135deg, #2c3742, #16222A); /* Темный градиент */width: 50%;margin-top: 5%;">

    <!-- Добавление скрытого поля с идентификатором медкарты -->
    <input type="hidden" name="id" value="<?= $medcartId ?>">

    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Дата поступления</label>
        <input type="date" class="form-control" name="datepost" value="<?= $medcart['datepost'] ?>" required>
    </div>

    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Диагноз</label>
        <input type="text" class="form-control" name="diagnoz" value="<?= $medcart['diagnoz'] ?>" required>
    </div>

    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Лечение</label>
        <input type="text" class="form-control" name="heal" value="<?= $medcart['heal'] ?>" required>
    </div>

    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Доктор</label>
        <input type="text" class="form-control" name="doctor" value="<?= $medcart['doctor'] ?>" required>
    </div>

    <div class="col-12 mt-3">
        <button type="submit" class="btn btn-primary" style="margin-bottom: 20px;">Сохранить изменения</button>
    </div>
</form>

<script>
    function validateForm() {
        // Простая проверка на заполненность полей
        var inputs = document.querySelectorAll('input[required], select[required]');
        for (var i = 0; i < inputs.length; i++) {
            if (!inputs[i].value) {
                alert("Пожалуйста, заполните все обязательные поля.");
                return false;
            }
        }
        return true;
    }
</script>

</body>
</html>
