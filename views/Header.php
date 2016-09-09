<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dancer - <?= $title ?></title>
    <meta name="description" content="<?= $desc ?>"/>
    <meta name="keywords" content="<?= $key ?>"/>
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="<?= $url->BASE_URL ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $url->BASE_URL ?>/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?= $url->BASE_URL ?>/css/css.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="<?= $url->BASE_URL ?>/js/bootstrap.min.js"></script>
    <script src="<?= $url->BASE_URL ?>/js/script.js"></script>
    <script src="<?= $url->BASE_URL ?>/js/jquery.maskedinput.js"></script>
    <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDKR0sYHy5ND2LEZ8QWBUibL58QLNjdeBY'></script>
</head>
<body>
<nav>
    <div class="container">
        <ul>
            <li><a href="/">Главная</a></li>
            <li>
                <a href="#">Настройки</a>
                <ul>
                    <li><a href="/country">Страны</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<div class="martop"></div>
