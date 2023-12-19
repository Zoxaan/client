
<?php include "headet.php";?>
<?php
$conn = mysqli_connect("localhost", "root", "", "zoxan");
$query = $conn->query("SELECT * FROM pacients");
while($pacient = mysqli_fetch_assoc($query))
{
    $pacients[] = $pacient;
}
?>
<h2>Медицинские карты  </h2>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Имя</th>
        <th scope="col">Фамилия</th>
        <th scope="col">Отчество</th>
        <th scope="col">Дата рождения</th>
        <th scope="col">номер карты</th>
        <th scope="col">Полоса ОМС</th>
        <th scope="col">Адрес проживания</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($pacients as $pacient): ?>
    <tr>
        <th>  <?= $pacient['id'] ?></th>
        <td> <?= $pacient['name'] ?></td>
        <td> <?= $pacient['lastname'] ?></td>
        <td> <?= $pacient['surname'] ?></td>
        <td>  <?= $pacient['date'] ?></td>
        <td> <?= $pacient['karts'] ?></td>
        <td> <?= $pacient['oms'] ?></td>
        <td><?= $pacient['adres'] ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>

</table>

