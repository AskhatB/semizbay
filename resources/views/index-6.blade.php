
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <link rel="shortcut icon" href="" type="image/ico">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:300,400,700" rel="stylesheet">
    <title>templates</title>
    <link rel="stylesheet" href="css/libs/animate.css">
    <link rel="stylesheet" href="css/libs/magnific-popup.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="main">
  <h1 style="text-align: center; margin-top: 50px;">{{ Session::get('status') }}</h1>
  <a href="{{ route('delete') }}" class="done_btn" onclick="">готово</a> 
</div>
   <script src="js/libs/jquery-3.1.1.min.js"></script>
   <script src="js/libs/prefixfree.min.js"></script>
   <script src="js/libs/jquery.viewportchecker.min.js"></script>
</body>
</html>