<?php 
session_start();
// Создаем соединение
$conn = mysqli_connect("localhost", "root", "", "zoxan");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Для начала нужно войти в аккаунт";
// Обработка данных из формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fio = $_POST["fio"];
    $date = $_POST["date"];
    $sex = $_POST["sex"];
    $adres = $_POST["adres"];
    $telephone = $_POST["telephone"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Хэширование пароля (рекомендуется для безопасности)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Вставка данных в таблицу users
    $sql = "INSERT INTO users (fio, date, sex, adres, telephone, idrolle, username, password) VALUES ('$fio', '$date', '$sex', '$adres', '$telephone', 1, '$username', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;

        // Обработка файла аватара
        $avatar_dir = "avatars/"; // Укажите путь к папке для сохранения аватаров
        $avatar_path = $avatar_dir . $last_id . "_" . basename($_FILES["avatars"]["name"]);

        move_uploaded_file($_FILES["avatars"]["tmp_name"], $avatar_path);

        // Обновление записи в базе данных с путем к файлу аватара
        $sql_update_avatar = "UPDATE users SET avatars='$avatar_path' WHERE id=$last_id";
        $conn->query($sql_update_avatar);

        echo "Регистрация успешна";
        header('Location: glavnaya.php');
    } else {
        echo "Ошибка при регистрации: " . $conn->error;
    }
}

// Закрытие соединения с базой данных
$conn->close();
?>

 