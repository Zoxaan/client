<?php include "headet.php"; ?>
<?php
$id=$_SESSION['user_id'];
$conn = mysqli_connect("localhost", "root", "", "zoxan");
$query = $conn->query("SELECT * FROM users WHERE id='$id'");
$users = [];
while($user = mysqli_fetch_assoc($query))
{
    $users[] = $user;
}
if ($_SESSION['idrolle'] != 2){
    header("location:reg.php");
}
$query = $conn->query("SELECT * FROM medcarts");
$medcarts = [];
while ($medcart = mysqli_fetch_assoc($query)) {
    $medcarts[] = $medcart;
}

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
                        <h5 class="card-title">Медицинские карты пользователей</h5>
                        <div>
                            <button type="button"  class="btn btn-outline-info" onclick="redirectToMedCarts()">Добавить мед карту</button>
                            <script>
                                function redirectToMedCarts() {
                                    // Выполните переход на страницу MedCarts.php
                                    window.location.href = 'MedCarts.php';
                                }
                            </script>
                    </div>
                        <ul class="list-group p-2">

                            <?php foreach ($medcarts as $medcart): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <p class="card-text"><?php
                                        $user_id=$medcart['user_id'];
                                        $query = $conn->query("SELECT * FROM users WHERE id='$user_id'");
                                       $us = mysqli_fetch_assoc($query);
                                        echo $us['fio'];

                                        ?></p>



                                    <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#medcart<?=$medcart['id']?>"  aria-expanded="false" aria-controls="medcart<?=$medcart['id']?>" id="toggleBtn<?=$medcart['id']?>" onclick="toggleButtonText(this)">
                                        Развернуть
                                    </button>
                                    <button type="button" class="btn btn-warning btn-sm edit-btn" data-medcart-id="<?=$medcart['id']?>" onclick="redirectToEditMedcart(<?=$medcart['id']?>)">
                                        Редактировать
                                    </button>
                                    <script>
                                        function redirectToEditMedcart(medcartId) {
                                            // Перейти на страницу редактирования, передавая идентификатор медкарты через URL
                                            window.location.href = 'EditMeDscarts.php?medcartId=' + medcartId;
                                        }
                                    </script>

                                    <button type="button" class="btn btn-danger btn-sm delete-btn" data-target="#deleteModal" data-medcart-id="<?=$medcart['id']?>">
                                        Удалить

                                    <!-- Развернутая информация -->
                                    <div class="collapse"  id="medcart<?=$medcart['id']?>">
                                        <div class="card card-body mt-2">
                                            <input type="hidden" id="medcart" value="<?=$medcart['id']?>">
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


    <!-- Модальное окно для удаления -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Удалить карту?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Вы уверены, что хотите удалить эту карту?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                    <button type="button" class="btn btn-danger" onclick="deleteMedcart()">Удалить</button>
                </div>
            </div>
        </div>
    </div>
<!-- Подключение необходимых скриптов Bootstrap и jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>