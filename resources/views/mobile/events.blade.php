<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
  <link rel="shortcut icon" href="" type="image/ico">
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:300,400,700" rel="stylesheet">
  <title>templates</title>
  <link rel="stylesheet" href="/css/main.css">
</head>
<body>
  <div class="main">
    
   
   
   @foreach($events as $event)
   @if(empty($event->works))
   @if(!empty($event->file1))
   
   <div class="content"><p>{{ mb_substr($event->descrip,0,150,'UTF-8')}}...</p><a href="{{ route('mobileInfo',['id'=>$event->id]) }}"><img src="/newSituations/{{$event->file1}}" alt=""></a><a href="{{ route('mobileInfo',['id'=>$event->id]) }}"><div class="inf-more">Информация</div></a></div>
   @elseif(!empty($event->file2))
   <div class="content"><p>{{ mb_substr($event->descrip,0,150,'UTF-8')}}...</p><a href="{{ route('mobileInfo',['id'=>$event->id]) }}"><img src="/newSituations/{{$event->file2}}" alt=""></a><a href="{{ route('mobileInfo',['id'=>$event->id]) }}"><div class="inf-more">Информация</div></a></div>
   @elseif(!empty($event->file3))
   <div class="content"><p>{{ mb_substr($event->descrip,0,150,'UTF-8')}}...</p><a href="{{ route('mobileInfo',['id'=>$event->id]) }}"><img src="/newSituations/{{$event->file3}}" alt=""></a><a href="{{ route('mobileInfo',['id'=>$event->id]) }}"><div class="inf-more">Информация</div></a></div>
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