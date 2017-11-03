<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
  <link rel="shortcut icon" href="" type="image/ico">
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:300,400,700" rel="stylesheet">
  <title>templates</title>
  <link rel="stylesheet" href="/css/libs/jquery.fancybox.min.css">
  <link rel="stylesheet" href="/css/main.css">
</head>
<body>
  <div class="main">
  <div class="who_added"><b style="color:#023351;">Ситуацию добавил: </b>{{ $fixed_situation->f_name }} {{ $fixed_situation->l_name  }}<br><b style="color:#023351;">Номер:</b> {{ $fixed_situation->phone }}<br><b style="color:#023351;">E-mail: </b>{{ $fixed_situation->email }}<br><b style="color:#023351;">Местоположение: </b>{{ $fixed_situation->location }}</div>
    <div class="form-wrap">
      <span class="text_bef-aft">До</span>
      <!-- <ul class="add-photo">
        @if(!empty($fixed_situation->file1))
        <li class="photo_edit"><img src="/newSituations/{{ $fixed_situation->file1 }}" alt="" id="image1"><span>До</span></li>
        @elseif(!empty($fixed_situation->file2))
        <li class="photo_edit"><img src="/newSituations/{{ $fixed_situation->file2 }}" alt="" id="image1"><span>До</span></li>
        @elseif(!empty($fixed_situation->file3))
        <li class="photo_edit"><img src="/newSituations/{{ $fixed_situation->file3 }}" alt="" id="image1"><span>До</span></li>
        @endif


        @if(!empty($fixed_situation->fixed_file1))
        <li class="photo_edit"><img src="/fixedSituations/{{ $fixed_situation->fixed_file1 }}" alt="" id="image2"><span>После</span></li>
        
        @elseif(!empty($fixed_situation->fixed_file2))
        <li class="photo_edit"><img src="/fixedSituations/{{ $fixed_situation->fixed_file2 }}" alt="" id="image2"><span>После</span></li>
        @elseif(!empty($fixed_situation->fixed_file3))
        <li class="photo_edit"><img src="/fixedSituations/{{ $fixed_situation->fixed_file3 }}" alt="" id="image2"><span>После</span></li>
        @endif
      </ul> -->
      <br>
      <br>
      <ul class="photo_slider1">
        @if(!empty($fixed_situation->file1))
        <a data-fancybox="gallery" href="/newSituations/{{ $fixed_situation->file1 }}"><li class="photo_s_show"><img src="/newSituations/{{ $fixed_situation->file1 }}" alt=""></li></a>
        @endif
        @if(!empty($fixed_situation->file2))
        <a data-fancybox="gallery" href="/newSituations/{{ $fixed_situation->file2 }}"><li class="photo_s_show"><img src="/newSituations/{{ $fixed_situation->file2 }}" alt=""></li></a>
        @endif
        @if(!empty($fixed_situation->file3))
        <a data-fancybox="gallery" href="/newSituations/{{ $fixed_situation->file3 }}"><li class="photo_s_show"><img src="/newSituations/{{ $fixed_situation->file3 }}" alt=""></li></a>
        @endif
      <!-- <li class="photo_s_show"><img src="/img/img1.jpg" alt=""></li>
      <li class="photo_s_show"><img src="/img/img2.jpg" alt=""></li>
      <li class="photo_s_show"><img src="/img/img3.jpg" alt=""></li> -->
    </ul>
    <p style="color:#023351; font-weight: 700; margin-top: 15px;">Описание проблемы до исправления: </p><p>{{ $fixed_situation->descrip }}</p>
    <span class="text_bef-aft">После</span>
    <ul class="photo_slider2">
      @if(!empty($fixed_situation->fixed_file1))
      <a data-fancybox="gallery1" href="/fixedSituations/{{ $fixed_situation->fixed_file1 }}"><li class="photo_s_show"><img src="/fixedSituations/{{ $fixed_situation->fixed_file1 }}" alt=""></li></a>
      @endif
      @if(!empty($fixed_situation->fixed_file2))
      <a data-fancybox="gallery1" href="/fixedSituations/{{ $fixed_situation->fixed_file2 }}"><li class="photo_s_show"><img src="/fixedSituations/{{ $fixed_situation->fixed_file2 }}" alt=""></li></a>
      @endif
      @if(!empty($fixed_situation->fixed_file3))
      <a data-fancybox="gallery1" href="/fixedSituations/{{ $fixed_situation->fixed_file3 }}"><li class="photo_s_show"><img src="/fixedSituations/{{ $fixed_situation->fixed_file3 }}" alt=""></li></a>
      @endif
     <!--  <li class="photo_s_show"><img src="/img/img5.jpg" alt=""></li>
     <li class="photo_s_show"><img src="/img/img6.jpg" alt=""></li> -->
   </ul>
   <p style="color:#023351; font-weight: 700; margin-top: 15px;">Исправлено: </p><p>{{ $fixed_situation->works }}</p>
 </div>
</div>
<script src="/js/libs/jquery-3.1.1.min.js"></script>
<script src="/js/libs/jquery.viewportchecker.min.js"></script>

<script src="/js/libs/jquery.fancybox.min.js" ></script>
</body>
</html>