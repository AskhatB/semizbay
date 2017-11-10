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
  <div class="header-inf">Информация</div>
  <div class="mainComp">
    <div class="formWrapComp">
      <ul class="addPhotoComp">
        @if(!empty($situation->file1))
        <li><a data-fancybox="gallery" href="/newSituations/{{ $situation->file1 }}"><img src="/newSituations/{{ $situation->file1 }}" alt=""></a></li>
        @endif
        @if(!empty($situation->file2))
        <li><a data-fancybox="gallery" href="/newSituations/{{ $situation->file2 }}"><img src="/newSituations/{{ $situation->file2 }}" alt=""></a></li>
        @endif 
        @if(!empty($situation->file3))
        <li><a data-fancybox="gallery" href="/newSituations/{{ $situation->file3 }}"><img src="/newSituations/{{ $situation->file3 }}" alt=""></a></li>
        @endif
        
      </ul><br>
      <p style="color:#023351; font-weight: 700;">Информация о ситуации</p>
      <br>
      <p style="color:#023351; font-size: 13px;">Местоположение ситуации</p>
      <p>{{$situation->location}}</p>
      <br>
      <p style="color:#023351; font-size: 13px;">Описание ситуации</p>
      <p>{{$situation->descrip}}</p>
      <br>
      <p style="color:#023351; font-weight: 700;">Контакты осведомителя</p>
      <br>
      <p style="color:#023351; font-size: 13px;">Осведомитель</p>
      <p>{{ $situation->f_name }} {{ $situation->l_name }}</p>
      <br>
      <p style="color:#023351; font-size: 13px;">Контактный номер телефона</p>
      <p>{{ $situation->phone }}</p>
      <br>
      <p style="color:#023351; font-size: 13px;">Электронный адрес</p>
      <p>{{ $situation->email }}</p>
      <br>
      <p style="color:#023351; font-size: 13px;">Участок</p>
      <p>{{ $situation->nameLocation }}</p>
      <br>

      <a href="{{ route('fixShow',['id'=>$situation->id]) }}"><input type="submit" value="Исправить" class="submit"> </a>
      
    </div>
  </div>
  <script src="/js/libs/jquery-3.1.1.min.js"></script>
  <script src="/js/libs/jquery.fancybox.min.js" ></script>
</body>
</html>