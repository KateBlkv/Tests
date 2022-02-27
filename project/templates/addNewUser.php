<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавить пользователя</title>
</head>
<body>
<div>
    <h2>Добавить пользователя</h2>
    <form method="post" action="/success">
        <input type="text" placeholder="Имя" name="name" required minlength="2">
        <input type="text" placeholder="Фамилия" name="surname" required minlength="2">
        <input type="number" placeholder="Возраст" name="age" required>
        <input type="text" placeholder="Логин" name="login" required minlength="4">
        <input type="text" placeholder="Пароль" name="pwd" required minlength="5">
        <input type="submit" value="Сохранить">
    </form>
</div>
</body>
</html>