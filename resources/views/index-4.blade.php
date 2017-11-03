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
    
   
   
   @foreach($fixed_images as $fixed_image)
   @if(!empty($fixed_image->works))
   @if(!empty($fixed_image->fixed_file1))
   <div class="content"><p>{{substr($fixed_image->works,0,150)}}...</p><a href="{{ route('fixed_sit',['id'=>$fixed_image->id]) }}"><img src="fixedSituations/{{$fixed_image->fixed_file1}}" alt=""></a><a href="{{ route('fixed_sit',['id'=>$fixed_image->id]) }}"><div class="inf-more">Информация</div></a></div>
   @elseif(!empty($fixed_image->fixed_file2))
   <div class="content"><p>{{substr($fixed_image->works,0,150)}}...</p><a href="{{ route('fixed_sit',['id'=>$fixed_image->id]) }}"><img src="fixedSituations/{{$fixed_image->fixed_file2}}" alt=""></a><a href="{{ route('fixed_sit',['id'=>$fixed_image->id]) }}"><div class="inf-more">Информация</div></a></div>
   @elseif(!empty($fixed_image->fixed_file3))
   <div class="content"><p>{{substr($fixed_image->works,0,150)}}...</p><a href="{{ route('fixed_sit',['id'=>$fixed_image->id]) }}"><img src="fixedSituations/{{$fixed_image->fixed_file3}}" alt=""></a><a href="{{ route('fixed_sit',['id'=>$fixed_image->id]) }}"><div class="inf-more">Информация</div></a></div>
   @endif
   @endif
   @endforeach
   
   
   
  <!-- <div class="content"><img src="img/add_photo.png" alt=""><div class="inf-more">Информация</div></div>
  <div class="content"><img src="img/add_photo.png" alt=""><div class="inf-more">Информация</div></div>
  <div class="content"><img src="img/add_photo.png" alt=""><div class="inf-more">Информация</div></div> -->
</div>
<!-- <script src="/js/libs/jquery-3.1.1.min.js"></script> -->
<script src="/js/libs/prefixfree.min.js"></script>
<script src="/js/libs/jquery.viewportchecker.min.js"></script>
<!-- <script src="/js/common.js"></script> -->
</body>
</html>