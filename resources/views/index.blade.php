
<!DOCTYPE html>
<html>
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
  <link rel="shortcut icon" href="" type="image/ico">
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:300,400,700" rel="stylesheet">
  <title>templates</title>
    <link rel="stylesheet" href="/css/main.css"></head>
    <body>
      <div class="main">
        <div class="form-wrap">
          @if (count($errors) > 0)
          @foreach($errors as $error)
          <div class="error">{{ $error }}</div>
          <br>
          @endforeach
          @endif
          @if (isset($message_error))
          <div class="error">{{ $message_error }}</div>
          <br>
          @endif
          <form id="formMain" action="/" enctype="multipart/form-data" method="POST">
            <p style="color:#023351; font-weight: 700;">Если возможно, добавить фотографии ситуации.</p>
            <p>
              До трех фото. Следует загрузить хотя бы одно общее и хотя бы одно детальное
            </p>
            <ul class="add-photo">
              <li>
                <label for="imgInput1" class="label_add_img" id="list">
                  <img src="img/add_photo.png" alt="" id="image1"></label>
                  <input type="file" id="imgInput1" accept="image/*" name="file1" class="photo"></li>
                  <li>
                    <label for="imgInput2" class="label_add_img" id="list">
                      <img src="img/add_photo.png" alt="" id="image2"></label>
                      <input type="file" id="imgInput2" accept="image/*" name="file2" class="photo"></li>
                      <li>
                        <label for="imgInput3" class="label_add_img" id="list">
                          <img src="img/add_photo.png" alt="" id="image3"></label>
                          <input type="file" id="imgInput3" accept="image/*" name="file3" class="photo"></li>
                        </ul>
                        <br>
                        <label for="location">
                          <p style="color:#023351; font-weight: 700;">Местоположение ситуации</p>
                          Указать название места, адрес и место в здании
                        </label>
                        <br>
                        <textarea automcomplete="off" name="location" id="location" autocomplete="off"></textarea>
                        <label for="discrip">
                          <p style="color:#023351; font-weight: 700;">Привести описание ситуации</p>
                        </label>
                        <textarea name="descrip" id="discrip" autocomplete="off"></textarea>
       <!--  <p style="color:#023351; font-weight: 700;">Как с вами связаться?</p>
        <br>
        <label for="name">Ваше имя</label>
        <textarea name="name" id="name"></textarea>
        <label for="phone">Ваш контактный номер телефона</label>
        <textarea name="phone" id="phone"></textarea>
        <label for="e-mail">Ваш адрес элекстронной почты</label>
        <textarea name="email" id="e-mail"></textarea> -->
      <!--   <input type="checkbox" id="anon" class="anon" name="check">
      <label for="anon">Отправить инкогнито</label> -->
      <br>
      <br>
      <input type="submit" id="submit" value="отправить" class="submit">
      {{ csrf_field() }}
    </form>

  <!-- <div id="somedialog" class="dialog">
    <div class="dialog__overlay"></div>
    <div class="dialog__content">
      <h2><strong>Howdy</strong>, I'm a dialog box</h2><div><button class="action" data-dialog-close>Close</button></div>
    </div>
  -->

</div>
<script src="/js/libs/jquery-3.1.1.min.js"></script>
<script src="/js/libs/prefixfree.min.js"></script>
<script src="/js/libs/jquery.magnific-popup.min.js"></script>
<script src="/js/libs/jquery.viewportchecker.min.js"></script>
<script src="/js/done.js"></script>
<script src="/js/common.js"></script>
</body>
</html>