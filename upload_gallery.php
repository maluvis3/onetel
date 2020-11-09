<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>OneTel</title>
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/gallery.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/media.css">
</head>

<body>
  <div class="wrap">

    <?php include "include/sub_header.php" ?>

    <div class="sub_img">
      <img src="images/contact-header.jpg" alt="">
      <div class="img_slogan">
        <h2>Share!!</h2>
        <p>Your Passinate and Creative Idea.</p>
      </div>
    </div>

    <section class="upload_section">
      <div class="center">
        <div class="sub_page_title">
          <h2>Upload Image</h2>
        </div>

        <form action="php/image_insert.php" method="post" enctype="multipart/form-data" name="form_data"
          class="form_data clear">
          <div class="upload_title clear">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" placeholder="Image's title...">
          </div>
          <div class="upload_category clear">
            <em>Category</em>
            <select name="category_select" id="">
              <option value="">Category Select</option>
              <option value="people">people</option>
              <option value="animals">animals</option>
              <option value="nature">nature</option>
              <option value="plantes">plantes</option>
              <option value="architects">architects</option>
            </select>
          </div>

          <div class="left_right_wrap clear">
            <div class="upload_left">
              <div class="image_box">
                <input class="upload_name" value="thumb image">
                <label for="thumbnail">UPLOAD</label>
                <input type="file" id="thumbnail" class="upload_hidden" name="thumb" accept='image/*'>
              </div>
              <div class="thumbnail_box wrap_box">
                <img id="img1">
              </div>
            </div><!-- end of image upload left box -->
            <div class="upload_right">
              <div class="image_box">
                <input class="upload_name" value="large image">
                <label for="large_img">UPLOAD</label>
                <input type="file" id="large_img" class="upload_hidden" name="large" accept='image/*'>
              </div>
              <div class="large_box wrap_box">
                <img id="img2">
              </div>
            </div><!-- end of image upload right box -->
          </div>
          <div class="upload_btn">
            <button type="submit">UPLOAD</button>
          </div>
        </form>
      </div>
    </section>

    <?php include "include/footer.php" ?>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
  <script>
  $(document).ready(function() {
    //image upload function
    var fileTarget = $(".image_box .upload_hidden");
    fileTarget.on("change", function() { //값이 변경될 경우
      if (window.FileReader) {
        var filename = $(this)[0].files[0].name; //파일 이름 추출하여 filename에 저장
      } else {
        var filename = $(this).val().split('/').pop().split('\\').pop();
      }
      $(this).siblings(".upload_name").val(filename);
      console.log(filename);
    });
    $("#thumbnail").on("change", thumbFileSelect);
    $("#large_img").on("change", largeFileSelect);
  });

  var thumbFileSelect = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function() {
      var dataURL = reader.result;
      var output = document.getElementById('img1');
      output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
  };

  var largeFileSelect = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function() {
      var dataURL = reader.result;
      var output = document.getElementById('img2');
      output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
  };
  </script>
</body>

</html>













<!-- --- -->