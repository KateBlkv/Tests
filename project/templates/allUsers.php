<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Список пользователей</title>
</head>
<body>
<section>
    <form action="/">
        <input type="submit" value="Выйти">
    </form>
    <form action="/addUser">
        <input type="submit" value="Добавить пользователя">
    </form>
</section>
<section>
    <?php foreach ($users as $user):?>
        <div>
            <p>Имя: <?= $user[0] ?></p>
            <p>Фамилия: <?= $user[1] ?></p>
            <p>Возраст: <?= $user[2] ?></p>
        </div>
    <?php endforeach; ?>
</section>

</body>
</html>