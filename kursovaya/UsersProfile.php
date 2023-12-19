<?php include "headet.php"; ?>
<?php
$id=$_SESSION['user_id'];

$conn = mysqli_connect("localhost", "root", "", "zoxan");
$query = $conn->query("SELECT * FROM users WHERE id='$id'");
$users= [];
while($user = mysqli_fetch_assoc($query))
{
    $users[] = $user;
}

if ($_SESSION['idrolle'] != 1){
}
$query = $conn->query("SELECT * FROM medcarts WHERE user_id='$id'");
$medcart = mysqli_fetch_assoc($query)

?>


<div class="container mt-3">
    <div class="row">
        <div class="col-md-3">
            <!-- ... Код для информации о пациенте ... -->
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card mb-3">
                    <img src="<?=$users[0]['avatars']?>" class="card-img-top" alt="Avatar">
                    <div class="card-body">
                        <h5 class="card-title"><?=$users[0]['fio']?></h5>
                        <p class="card-text"><?=$users[0]['date']?></p>
                        <p class="card-text"><?=$users[0]['sex']?></p>
                        <p class="card-text"><?=$users[0]['adres']?></p>
                        <p class="card-text"><?=$users[0]['telephone']?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Медицинские карты</h5>
                        <ul class="list-group">
                            <?php foreach ($users as $user): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <p class="card-text"><?=$user['fio']?></p>
                                    <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#medcart<?=$medcart['id']?>" aria-expanded="false" aria-controls="medcart<?=$medcart['id']?>" id="toggleBtn<?=$medcart['id']?>" onclick="toggleButtonText(this)">
                                        Развернуть
                                    </button>
                                    <!-- Развернутая информация -->
                                    <div class="collapse" id="medcart<?=$medcart['id']?>">
                                        <div class="card card-body mt-2">
                                            <p><strong>Дата поступления:</strong> <?=$medcart['datepost']?></p>
                                            <p><strong>Диагноз:</strong> <?=$medcart['diagnoz']?></p>
                                            <p><strong>Лечение:</strong> <?=$medcart['heal']?></p>
                                            <p><strong>Доктор:</strong> <?=$medcart['doctor']?></p>
                                        </div>
                                    </div>
                                </li>

                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Подключение необходимых скриптов Bootstrap и jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>