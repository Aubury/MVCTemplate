<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style><?php include_once ROOT . "/views/css/reset.css"?></style>
    <style><?php include_once ROOT . "/views/css/style.css"?></style>
    <style><?php include_once ROOT . "/views/css/forms.css"?></style>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <title>Admin Page</title>
</head>
<body class="d-col">
<header class="d-col">
    <div id="welcome" class="alert alert-success" role="alert"></div>
    <div class="container d-col">
        <button id="exit" type="button" class="btn btn-success align-self-right">Выход</button>
    </div>

</header>
<main class="d-col justify-content-center align-items-center">
    <h1>MVC Admin Page</h1>
<!------------------------------------------------>
    <div class="container row justify-content-around">
        <div class="col-3 ReportInfo">
            <div class="card border-info  mb-3">
                <div class="card-header"><h3>Добавление или редактировать администратора</h3></div>
                <div class="card-body">
                    <form name="formAddAdmins" action="#" method="get">
                        <p><input type="text" class="form-control"  name="name" placeholder="Имя">
                        <p><input type="text" class="form-control"  name="patronymic" placeholder="Отчество">
                        <p><input type="text"  class="form-control" name="surname" placeholder="Фамилия">
                        <p><input type="email" class="form-control" name="email" placeholder="Email">
                        <p class="col-12 col-xl-12"> <button class="btn btn-block btn-success" type="submit">Добавить / Редактировать</button></p>
                    </form>
                    <span class="italic"></span>
                </div>
            </div>
        </div>

        <div class="col-9 border-warning">
            <table class="tableAdmins table table-hover"></table>
        </div>
    </div>
</main>
<footer>

</footer>
<script><?php include_once ROOT . "/views/app/main.js"?></script>
<script><?php include_once ROOT . "/views/ViewAdminPage/app/script.js"?></script>

</body>
</html>
