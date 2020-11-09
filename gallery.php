<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>OneTel</title>
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <!-- font awesome link -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- library css files -->
  <link rel="stylesheet" href="css/venobox.min.css">

  <!-- main style css files -->
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

    <section class="gallery_section">

      <div class="center">
        <div class="sub_page_title">
          <h2>Gallery List</h2>
        </div>

        <div class="filtering">
          <button type="button" class="on" data-filter="all">All</button>
          <button type="button" data-filter="people">People</button>
          <button type="button" data-filter="animals">Animals</button>
          <button type="button" data-filter="nature">Nature</button>
          <button type="button" data-filter="plantes">Plantes</button>
          <button type="button" data-filter="architects">Architects</button>
        </div>

        <div class="gallery_box">
          <div class="grid-sizer"></div>

        </div><!-- end of gallery box -->

        <div class="gallery_btns">
          <button id="load_more">Load More</button>

          <?php

            if(!$userid){
              echo(
              "<button><a href='#' onclick='plzLog()'>Upload Image</a></button>"
              );
            } else {
              echo(
              "<button><a href='upload_gallery.php'>Upload Image</a></button>"
              );
            }
          
          ?>
        </div>

      </div><!-- end of center tag -->

    </section>

    <?php include "include/footer.php" ?>

  </div>

  <!-- jquery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- libraries -->
  <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
  <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
  <script src="js/venobox.min.js"></script>
  <!-- <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script> -->

  <!-- main jquery files -->
  <script type="text/javascript" src="js/custom.js"></script>
  <script type="text/javascript" src="js/gallery.js"></script>
  <script>
  function plzLog() {
    alert("로그인이 필요합니다.");
  }
  </script>
</body>

</html>













<!-- --- -->