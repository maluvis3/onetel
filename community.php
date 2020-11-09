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
                    <h2>Community</h2>
                </div>

                <div class="board_table">
                    <ul class="board_list" id="board_list">

                    </ul>
                    <div class="numbering">
                        <span onclick="firstPage()"><i class="fa fa-angle-double-left"></i></span>
                        <span onclick="goToPrev()"><i class="fa fa-angle-left"></i></span>
                        <?php
                        $con = mysqli_connect("localhost", "yoonseul3", "rlaalsrud11#", "yoonseul3");
                        $sql = "select * from community_board order by num desc";
                        $result = mysqli_query($con, $sql);
                        $total_record = mysqli_num_rows($result);
                        $scale = 6;

                        if ($total_record % $scale == 0) {
                            $total_page = floor($total_record / $scale);
                        } else {
                            $total_page = floor($total_record / $scale) + 1;
                        }

                        for ($i = 1; $i <= $total_page; $i++) {
                        ?>
                        <span class="page_number" onclick="get_page(<?= $i ?>)"><?= $i ?></span>
                        <?php
                        }
                        ?>
                        <span onclick="goToNext()"><i class="fa fa-angle-right"></i></span>
                        <span onclick="lastPage()"><i class="fa fa-angle-double-right"></i></span>
                    </div>
                    <div class="community_btn clear">

                        <form class="search_box" method="post" name="search_box" action="search_result.php">
                            <select name="search_select" id="">
                                <option value="id">아이디</option>
                                <option value="title">제목</option>
                            </select>
                            <input type="text" class="search_input" name="search_input" placeholder="검색어를 입력해 주세요.">
                            <button type="button" onclick="check_input()"><i class="fa fa-search"></i></button>
                            <script>
                            function check_input() {
                                if (!document.search_box.search_input.value) {
                                    alert("검색어를 입력해 주세요.");
                                    return;
                                }
                                document.search_box.submit();
                            }
                            </script>
                        </form>

                        <?php
                        if (!$userid) {
                        ?>
                        <a href="#" onclick="javascript:alert('로그인이 필요합니다.')" class="board_btn">글쓰기</a>
                        <?php
                        } else {
                        ?>
                        <a href="write_form.php" class="board_btn">글쓰기</a>
                        <?php
                        }
                        ?>
                    </div>

                </div><!-- end of board table tag -->
            </div>
        </section>

        <?php include "include/footer.php" ?>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <script>
    var currentPage = 1;

    var url = "data/board_list_ajax.php";
    $.get(url, {
        page: 1
    }, function(args) {
        $("#board_list").html(args);
    });

    function get_page(no) {
        var url = "data/board_list_ajax.php";
        $(".page_number").removeClass("on");
        $(".page_number").eq(no - 1).addClass("on");
        $.get(url, {
            page: no
        }, function(args) {
            $("#board_list").html(args);
            currentPage = no;
        });
        console.log(currentPage);
    }

    function goToNext() {
        var pageNumber = $(".page_number").length;
        console.log(pageNumber);
        console.log(currentPage);
        if (currentPage == pageNumber) {
            get_page(pageNumber);
        } else {
            get_page(currentPage + 1);
        }
    }

    function goToPrev() {
        console.log(currentPage);
        if (currentPage === 1) {
            get_page(1);
        } else {
            get_page(currentPage - 1);
        }
    }

    function firstPage() {
        console.log(currentPage);
        get_page(1);
    }

    function lastPage() {
        console.log(currentPage);
        var pageNumber = $(".page_number").length;
        get_page(pageNumber);
        console.log(pageNumber);
    }

    $(".page_number").eq(0).trigger("click");
    </script>

</body>

</html>













<!-- --- -->