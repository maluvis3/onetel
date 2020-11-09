<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div>

  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
  $(document).ready(function() {
    var locaNum = $(location).attr('href').split('=').reverse()[0];
    console.log(locaNum);

    function getImage(count) {
      $.ajax({
        url: "//hubblesite.org/api/v3/image/" + count,
        dataType: 'jsonp',
        //jsonpCallback: "myCallback",

        success: function(data) {
          items =
            '<img src="' + data.image_files[4].file_url + '" alt="">';
          $("div").append(items);
        },
        error: function(xhr) {
          console.log('실패 - ', xhr);
        }

        //data.image_files[4].file_url

      });

    }

    getImage(locaNum);
  });
  </script>
</body>

</html>