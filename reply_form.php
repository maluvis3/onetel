<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>OneTel</title>
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/community.css">
  <link rel="stylesheet" href="css/media.css">
</head>

<body>
  <div class="wrap">

    <?php include "include/sub_header.php" ?>

    <?php
      $reply_num=$_GET["num"];
    ?>

    <div class="sub_img">
      <img src="images/community_img.jpg" alt="">
      <div class="img_slogan">
        <h2>Give Us!!</h2>
        <p>Your Valuable Opinions.</p>
      </div>
    </div>

    <section class="community_section padding_fit">
      <div class="contents_center">
        <div class="sub_page_title">
          <h2>Write Reply</h2>
        </div>

        <div class="board_table">

          <div class="write_box">
            <form action="php/reply.php?num=<?=$reply_num?>" method="post" name="write_form">
              <p class="clear">
                <!-- <label for="contents">내용</label> -->
                <textarea name="reply_content" id="contents" placeholder="내용을 입력해 주세요."></textarea>
              </p>
            </form>
          </div>
          <div class="write_btn clear">
            <a href="community.php" class="board_btn">돌아가기</a>
            <a href="#" onclick="check_input()" class="board_btn">제출하기</a>
          </div>
        </div><!-- end of board table tag -->
      </div>
    </section>

    <?php include "include/footer.php" ?>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
  <script>
  function check_input() {
    document.write_form.submit();
  }
  </script>
</body>

</html>













<!-- --- -->