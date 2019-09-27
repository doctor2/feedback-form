<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/public/css/app.css" >

    <title><?= $title ?></title>
</head>
<body>


<div class="container" id="app">
    <h1 class="main_title"><?= $title ?></h1>
    <?php  include $_SERVER['DOCUMENT_ROOT'] . '/views/' . $template; ?>
</div>

<script src="/public/js/app.js"></script>

</body>
</html>