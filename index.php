<?php

function validateName($data)
{
  if (mb_strlen($data) <= 0) return 'Заполните поле "Имя"';
  else if (mb_strlen($data) < 3 || mb_strlen($data) > 22) return 'Имя от 3 до 22 символов!';
}

function validateEmail($data)
{
  if ($data == '') return 'Заполните поле "Почта"';
  else if (mb_strlen($data) < 3 || mb_strlen($data) > 30) return 'Почта от 3 до 30 символов!';
  else if (!filter_var($data, FILTER_VALIDATE_EMAIL)) return 'Неправильная почта!';
}

function validateNumber($data)
{
  if ($data == '') return 'Заполните поле "Телефон"';
  else if (mb_strlen($data) != 11) return 'Номер телефона 11 символов!';
}

if (isset($_POST['form'])) {


  $name = $_POST['name'];
  $email = $_POST['email'];
  $number = $_POST['number'];

  if (mb_strlen(validateName($name)) > 0) {
    $error = validateName($name);
  }
  else if (mb_strlen(validateEmail($email)) > 0) {
    $error = validateEmail($email);
  }
  else if (mb_strlen(validateNumber($number)) > 0) {
    $error = validateNumber($number);
  }

  if (empty($error)) $error = 'Успешная валидация!';
  
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Форма</title>
  <link rel="stylesheet" href="assets/style/style.css">
</head>

<body>

  <form method="POST" name="form">
    <h2>Форма</h2>
    <input type="text" placeholder="Введите ваше имя..." name="name">
    <input type="text" placeholder="Введите вашу почту..." name="email">
    <input type="text" placeholder="Введите ваш телефон..." name="number">
    <button type="submit" name="form">Отправить</button>
    <p><?php if (isset($error)) echo $error; ?></p>
  </form>

</body>

</html>