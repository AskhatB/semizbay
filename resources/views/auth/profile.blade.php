<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
  <link rel="shortcut icon" href="" type="image/ico">
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:300,400,700" rel="stylesheet">
  <title>templates</title>
  <link rel="stylesheet" href="/css/libs/jquery.fancybox.min.css">
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
  <div class="main">
    <div class="form-wrap">
      <p style="color:#023351; font-size: 13px;">Имя</p>
      <p>{{ $user->f_name }}</p>
      <br>
      <p style="color:#023351; font-size: 13px;">Фамилия</p>
      <p>{{ $user->l_name }}</p>
      <br>
      <p style="color:#023351; font-size: 13px;">Отчество</p>
      <p>{{ $user->pat_name }}</p>
      <br>
      <p style="color:#023351; font-size: 13px;">Контактный номер телефона</p>
      <p>{{ $user->phone }}</p>
      <br>
      <p style="color:#023351; font-size: 13px;">Электронный адрес</p>
      <p>{{ $user->email }}</p>
      <br>
      <p style="color:#023351; font-size: 13px;">Должность</p>
      <p>{{ $user->position }}</p>
      <br>
      <p style="color:#023351; font-size: 13px;">Участок</p>
      <p>{{ $user->nameLocation }}</p>    
      <a href="{{ route('logout') }}" class="done_btn" style=" width: 200px;">Выйти из системы</a>
    </div>
  </div>
  <script src="/js/libs/jquery-3.1.1.min.js"></script>
  <script src="/js/libs/jquery.fancybox.min.js" ></script>
</body>
</html>