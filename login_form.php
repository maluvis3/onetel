<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>OneTel</title>
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- main style -->
  <link rel="stylesheet" href="css/style.css">

  <!-- log in page style -->
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/media.css">
</head>

<body>
  <div class="wrap">

    <?php include "include/sub_header.php" ?>

    <div class="sub_img">
      <img src="images/home-bg.jpg" alt="">
      <div class="img_slogan">
        <h2>Join Us</h2>
        <p>To Experience Creative World!!</p>
        <a href="join_form.php" class="join_btn">JOIN</a>
      </div>
    </div>

    <section class="login_section sub_section">
      <!-- <div class="login_icon">
          <i class="fa fa-user" aria-hidden="true"></i>
        </div> -->
      <div class="sub_page_title">
        <h2>LOGIN</h2>
      </div>
      <div class="login_box">
        <form action="php/login.php" method="post" name="login_form">
          <p class="input_id">
            <input type="text" name="id" placeholder="Your ID">
          </p>
          <p class="input_pass">
            <input type="password" name="pass" placeholder="Your PassWord">
          </p>
          <p class="login_btns clear">
            <a href="#" onclick="login_submit()">LOGIN</a>
            <a href="join_form.php">JOIN US</a>
          </p>
        </form>
      </div>
    </section>

    <?php include "include/footer.php" ?>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
  <script>
  function login_submit() {

    document.login_form.submit();
  }
  </script>
</body>

</html>













<!-- --- -->