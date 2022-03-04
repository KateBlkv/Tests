<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Link!</title>
</head>
<body>
<div>
    <p>Ваша ссылка: http://bestlink/<?= $data[0]['short_link']?></p>
    <form action="/useLink" method="post">
        <input type="hidden" name="shortLink" value="<?= $data[0]['short_link']?>">
        <input type="submit" value="Перейти по ссылке!">
    </form>
</div>
</body>
</html>
