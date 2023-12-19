<!DOCTYPE html>
<?php include "headet.php";?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<form action="addPacientKarts.php" method="post" class="row g-3">

  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Фамилия</label>
    <input type="text" class="form-control" name="surname">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Имя</label>
    <input type="text" class="form-control" name="name">
  </div>
  <form class="row g-3">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Отчество</label>
    <input type="text" class="form-control" name="lastname">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Дата рождения</label>
    <input type="text" class="form-control" name="date">
  </div>
  <form class="row g-3">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">№ амб.карты</label>
    <input type="text" class="form-control" name="karts">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">№ полоса ОМС</label>
    <input type="text" class="form-control" name="oms">
  </div>
  <form class="row g-3">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Адрес проживания</label>
    <input type="text" class="form-control" name="adres">
  </div>
  <div class="col-12">
    <button onclick="da()" type="submit" class="btn btn-primary">Добавить пациента</button>
  </div>
  </form>

  <script>
  </script>
</body>
</html>