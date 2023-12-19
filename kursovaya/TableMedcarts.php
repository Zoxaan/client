
<?php include "headet.php";?>
<?php
$conn = mysqli_connect("localhost", "root", "", "zoxan");
$query = $conn->query("SELECT * FROM medcarts");
while($medcart = mysqli_fetch_assoc($query))
{
    $medcarts[] = $medcart;
}
?>
<h2>Медицинские карты  </h2>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">номер карты</th>
        <th scope="col">номер пациента</th>
        <th scope="col">Дата</th>
        <th scope="col">Статус</th>
        <th scope="col">Действия</th> <!-- Новый заголовок для столбца с кнопками -->
    </tr>
    </thead>
    <tbody>
    <?php foreach ($medcarts as $medcart): ?>
        <tr>
            <th><?= $medcart['id'] ?></th>
            <td><?= $medcart['cartsnomer'] ?></td>
            <td><?= $medcart['pacientnomer'] ?></td>
            <td><?= $medcart['date'] ?></td>
            <td><?= $medcart['status'] ?></td>
            <td>
                <button class="btn btn-success" onclick="editMedcart(<?= $medcart['id'] ?>)">Редактировать</button>

                <!-- Кнопка удаления с использованием стилей Bootstrap -->
                <button class="btn btn-danger" onclick="deleteMedcart(<?= $medcart['id'] ?>)">Удалить</button>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>