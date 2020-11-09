<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/community.css">
  <link rel="stylesheet" href="css/admin.css">
  <link rel="stylesheet" href="css/media.css">
</head>

<body>
  <div class="wrap">

    <?php include "include/sub_header.php" ?>

    <div class="sub_img">
      <img src="images/community_img.jpg" alt="">
      <div class="img_slogan">
        <h2>Give Us!!</h2>
        <p>Your Valuable Opinions.</p>
      </div>
    </div>

    <section class="community_section">
      <div class="contents_center">
        <div class="sub_page_title">
          <h2>Input Project Data</h2>
        </div>

        <form action="php/project_input.php" name="project_input" method="post" enctype="multipart/form-data">
          <ul class="admin_project_box input_project">
            <li class="project_title clear">
              <span class="col1">제목</span>
              <span class="col2">사진</span>
              <span class="col3">설명</span>
              <span class="col4">코드</span>
              <span class="col5">언어</span>
              <span class="col6">가격</span>
            </li>
            <li class="project_list clear">
              <span class="col1"><input type="text" name="title"></span>
              <span class="col2 img_input">
                <div class="img_wrap1 product_input_wrap">
                  <img id="img1">
                </div>
                <div class="filebox product_input_flexbox">
                  <input class="upload_name product_upload_name" value="(640 X 420)">
                  <label for="input_img1" class="upload_btn">업로드</label>
                  <input type="file" id="input_img1" class="upload_hidden" name="image">
                </div>
              </span>
              <span class="col3"><textarea name="text"></textarea></span>
              <span class="col4"><input type="text" name="code"></span>
              <span class="col5"><input type="text" name="lan"></span>
              <span class="col6"><input type="text" name="price"></span>
            </li>
          </ul>
          <div class="projectBtn">
            <a href="admin_form.php">돌아가기</a>
            <button type="submit">업로드</button>
          </div>
        </form>
      </div>
    </section>

    <?php include "include/footer.php" ?>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
  <script type="text/javascript" src="js/admin.js"></script>
  <script>
  $(document).ready(function() {
    //image upload function
    var fileTarget = $(".filebox .upload_hidden");
    fileTarget.on("change", function() { //값이 변경될 경우
      if (window.FileReader) {
        var filename = $(this)[0].files[0].name; //파일 이름 추출하여 filename에 저장
      } else {
        var filename = $(this).val().split('/').pop().split('\\').pop();
      }
      $(this).siblings(".upload_name").val(filename);
      console.log(filename);
    });
    $("#input_img1").on("change", imgFileSelect);
  });

  function imgFileSelect(e) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function() {
      var dataURL = reader.result;
      var output = document.getElementById('img1');
      output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
  }
  </script>
  <script>
  function upload() {
    document.project_input_form.submit();
  }
  </script>
</body>

</html>