<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <link rel="shortcut icon" href="" type="image/ico">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:300,400,700" rel="stylesheet">
    <title>templates</title>
    <link rel="stylesheet" href="libs/animate.css">
    <link rel="stylesheet" href="libs/magnific-popup.css">
    <link rel="stylesheet" href="{{ url('/css/main.css') }}">
</head>
<body>
<div class="main">
  
  <form id="form_login" method="POST" action="/auth/login">
  <h1 style="text-align: center; margin-top: 50px;">Вход в систему</h1>
      <input type="text" name="iin"  id="iin" placeholder="Введите свой ИИН" pattern="[0-9]{12}">
      <input type="hidden" name="_token" value="{{csrf_token()}}"><br>
      <input type="submit" value="Вход" class="submit">
  </form>
</div>
   <script src="libs/jquery-3.1.1.min.js"></script>
   <script src="libs/prefixfree.min.js"></script>
   <script src="libs/jquery.magnific-popup.min.js"></script>
   <script src="libs/jquery.viewportchecker.min.js"></script>
   <script src="js/common.js"></script>
   <script src="js/done.js"></script>
</body>
</html>