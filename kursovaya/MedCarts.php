<!doctype html>
<?php include "headet.php";?>
<?php
$conn = mysqli_connect("localhost", "root", "", "zoxan");
$query = $conn->query("SELECT * FROM users");
while($user = mysqli_fetch_assoc($query))
{
    $users[] = $user;
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
<form action="AddMedcarts.php" method="post" class="pumbaforms row g-3 align-items-center flex-column mx-auto text-center" onsubmit="return validateForm()" style="border-radius: 10px; /* Закругление углов контейнера */box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Тень контейнера */background: linear-gradient(135deg, #2c3742, #16222A); /* Темный градиент */width: 50%;margin-top: 5%;">

    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Дата поступления</label>
        <input type="date" class="form-control" name="datepost" required>
    </div>

    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Диагноз</label>
        <input type="text" class="form-control" name="diagnoz" required>
    </div>

    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Лечение</label>
        <input type="text" class="form-control" name="heal" required>
    </div>

    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Доктор</label>
        <input type="text" class="form-control" name="doctor" required>
    </div>

    <div class="col-md-6">
        <label for="cars" class="form-label">Выберите пользователя</label>
        <select class="form-select" name="user_id" id="cars" required>
            <?php foreach ($users as $user): ?>
                <option value="<?=$user["id"]?>"><?= $user['username'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="col-12 mt-3">
        <button type="submit" class="btn btn-primary" style="
    margin-bottom: 20px;
">Добавить мед карту</button>
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