<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style><?php include_once ROOT . "/views/css/reset.css"?></style>
    <style><?php include_once ROOT . "/views/css/style.css"?></style>
    <style><?php include_once ROOT . "/views/css/forms.css"?></style>
    <style><?php include_once ROOT . "/views/ViewMainPage/css/modal.css"?></style>
    <title>Template</title>
</head>
<body class="d-col">
<header></header>
<main class="d-col justify-content-center align-items-center">
    <h1>MVC</h1>
</main>
<footer>

</footer>
   <! ------------------------------------------->
<div class="modal" id="modal">
    <div class="modalForm">
        <header>
            <h2>Введите данные</h2>
        </header>
        <form name="logIn" action="#" method="post">
            <p><input type="email" name="email" placeholder="E-mail"></p>
            <p><input type="password" name="password"  placeholder="Пароль"></p>
            <p> <input type="submit" value="Войти"></p>
        </form>
        <span class="italic"></span>
        <footer class="footer">
            <a href="#" class="btn">Закрыть</a>
        </footer>
    </div>
</div>
<script><?php include_once ROOT . "/views/app/main.js"?></script>
<script><?php include_once ROOT . "/views/ViewMainPage/app/modalApp.js"?></script>
</body>
</html>