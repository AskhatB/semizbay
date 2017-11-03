<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
  <link rel="shortcut icon" href="" type="image/ico">
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:300,400,700" rel="stylesheet">
  <title>templates</title>
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <div class="main">
    
   <a href="http://semyzbay-u.kapsafety.kz/admin/" class="toAdminBtn">Перейти в админ панель</a>
   
   @foreach($new_images as $new_image)
   @if(empty($new_image->works))
   @if(!empty($new_image->file1))
   
   <div class="contentComp"><p>{{ mb_substr($new_image->descrip,0,150,'UTF-8')}}...</p><a href="{{ route('infoShow',['id'=>$new_image->id]) }}"><img src="newSituations/{{$new_image->file1}}" alt=""></a><a href="{{ route('infoShow',['id'=>$new_image->id]) }}"><div class="inf-more">Информация</div></a></div>
   @elseif(!empty($new_image->file2))
   <div class="contentComp"><p>{{ mb_substr($new_image->descrip,0,150,'UTF-8')}}...</p><a href="{{ route('infoShow',['id'=>$new_image->id]) }}"><img src="newSituations/{{$new_image->file2}}" alt=""></a><a href="{{ route('infoShow',['id'=>$new_image->id]) }}"><div class="inf-more">Информация</div></a></div>
   @elseif(!empty($new_image->file3))
   <div class="contentComp"><p>{{ mb_substr($new_image->descrip,0,150,'UTF-8')}}...</p><a href="{{ route('infoShow',['id'=>$new_image->id]) }}"><img src="newSituations/{{$new_image->file3}}" alt=""></a><a href="{{ route('infoShow',['id'=>$new_image->id]) }}"><div class="inf-more">Информация</div></a></div>
   @endif
   @endif
   @endforeach
   
   
   
  <!-- <div class="content"><img src="img/add_photo.png" alt=""><div class="inf-more">Информация</div></div>
  <div class="content"><img src="img/add_photo.png" alt=""><div class="inf-more">Информация</div></div>
  <div class="content"><img src="img/add_photo.png" alt=""><div class="inf-more">Информация</div></div> -->
</div>
<!-- <script src="libs/jquery-3.1.1.min.js"></script>
<script src="libs/prefixfree.min.js"></script>
<script src="libs/jquery.magnific-popup.min.js"></script>
<script src="libs/jquery.viewportchecker.min.js"></script>
<script src="js/common.js"></script> -->
</body>
</html>