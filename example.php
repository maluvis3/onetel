<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>OneTel</title>
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/media.css">
  <style>
  .json {
    width: 100%;
    max-width: 1200px;
    height: auto;
    margin: auto;
    padding-bottom: 30px;
  }

  .imgWrap {
    width: 25%;
    float: left;
    height: 200px;
    overflow: hidden;
    box-sizing: border-box;
    padding: 5px;
    position: relative;
  }

  .imgWrap>a {
    display: block;
    width: 100%;
    height: 100%;
    position: relative;
    overflow: hidden;
  }

  .imgWrap img {
    width: 100%;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
  }
  </style>
</head>

<body>
  <div class="wrap">

    <?php include "include/header.php" ?>
    <button type="button">click</button>
    <div class="json clear">
    </div>

    <?php include "include/footer.php" ?>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
  <script>
  $(document).ready(function() {

    // $.getJSON("//hubblesite.org/api/v3/image/200", function(data) {
    //   var items = [];
    //   $.each(data, function(i, item) {
    //     var inHTML = "<p>" + item.id + "</p>";
    //     items.push($(inHTML).get(0));
    //   });
    //   $(".json").append(items);
    // });
    var items = [];
    var api = 0;

    function getImage(count) {
      $.ajax({
        url: "//hubblesite.org/api/v3/image/" + count,
        dataType: 'jsonp',
        //jsonpCallback: "myCallback",

        success: function(data) {
          items = '<div class="imgWrap">' +
            '<a href="nasa_detail.php?num=' + Number(count) + '">' +
            '<img src="' + data.image_files[3].file_url + '" alt="">' +
            '</a>' +
            '</div>';
          $(".json").append(items);
        },
        error: function(xhr) {
          console.log('실패 - ', xhr);
        }

        //data.image_files[4].file_url

      });
    }

    var i;
    for (i = 1; i < 50; i++) {
      getImage(i);
    }


    $("button").click(function() {
      getImage(apiCount);
    });

  });
  </script>
</body>

</html>













<!-- --- -->