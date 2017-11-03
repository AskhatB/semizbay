<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
  <link rel="shortcut icon" href="" type="image/ico">
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:300,400,700" rel="stylesheet">
  <title>templates</title>
  <link rel="stylesheet" href="/css/libs/animate.css">
  <link rel="stylesheet" href="/css/libs/magnific-popup.css">
  <link rel="stylesheet" href="/css/main.css">
</head>
<body>
  <div class="header-inf">Исправить</div>
  <div class="main">
    <div class="form-wrap">
      @if ($errors->any())
      <center><div class="error">{{ $errors->first() }}</div></center>
      <br>
      @endif
      <form action="{{ route('fixSituation',['id'=>$fixed_situation->id]) }}" enctype="multipart/form-data" method="POST">
        <p style="color:#023351;font-weight: 700;text-align:center;font-size:18px;">Загрузить фотографии</p><p>До трех фото. Следует загрузить хотя бы одно общее и хотя бы одно детальное фото</p>
        <ul class="add-photo">
          <li><label for="imgInput1" class="label_add_img" id="list"><img src="/img/add_photo.png" alt="" id="image1"></label><input type="file" id="imgInput1" accept="image/*" name="fixed_file1" class="photo"></li>
          <li><label for="imgInput2" class="label_add_img" id="list"><img src="/img/add_photo.png" alt="" id="image2"></label><input type="file" id="imgInput2" accept="image/*" name="fixed_file2" class="photo"></li>
          <li><label for="imgInput3" class="label_add_img" id="list"><img src="/img/add_photo.png" alt="" id="image3"></label><input type="file" id="imgInput3" accept="image/*" name="fixed_file3" class="photo"></li>
        </ul><br>
        <p style="color:#023351;font-weight: 700;">Проделанные работы:</p>
        <textarea name="works" id="works"></textarea>
        <input type="submit" value="исправить" class="submit">
        {{ csrf_field() }}
      </form>
    </div>
  </div>
  <script src="/js/libs/jquery-3.1.1.min.js"></script>
  <script src="/js/libs/prefixfree.min.js"></script>
  <script src="/js/libs/jquery.magnific-popup.min.js"></script>
  <script src="/js/libs/jquery.viewportchecker.min.js"></script>
  <script src="/js/common.js"></script>
</body>
</html>