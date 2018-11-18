<?php //session_start() ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<form action="url.php" method="post">
<div class="form-group">
    <label for="exampleFormControlTextarea1">Введите свою URL</label>
    <textarea class="form-control" id="this" name="this" rows="3" placeholder="Введите сюда"></textarea>
    <small id="passwordHelpInline" class="text-muted">
        Для корректной работы разделите каждую URL клавышой "Enter"
    </small>
</div>
    <button type="submit" name="those" class="btn btn-success">Success</button>
</form>

</body>
</html>