<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>OneTel</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/media.css">
</head>

<body>
    <div class="wrap">

        <?php include "include/header.php" ?>

        <section class="main_img">

        </section>
        <section class="site_info">
            <div class="center">
                <div class="boxes clear">
                    <div class="box box1">
                        <div>
                            <div class="icon">
                                <i class="fa fa-laptop" aria-hidden="true"></i>
                            </div>
                            <h2>Responsive</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the
                                industry's standard dummy text</p>
                        </div>
                    </div>
                    <div class="box box2">
                        <div>
                            <div class="icon">
                                <i class="fa fa-mobile" aria-hidden="true"></i>
                            </div>
                            <h2>Easy to Use</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the
                                industry's standard dummy text</p>
                        </div>
                    </div>
                    <div class="box box3">
                        <div>
                            <div class="icon">
                                <i class="fa fa-life-ring" aria-hidden="true"></i>
                            </div>
                            <h2>Quick Support</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the
                                industry's standard dummy text</p>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- end of site info -->
        <section class="about" id="about">
            <div class="center clear">
                <div class="company start_up_left">

                </div>
                <div class="company start_up_right">
                    <div class="about_txt">
                        <h2>Startup Business</h2>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                            classical
                            Latin literature from 45 BC, making it over 2000 years old. Richard McClintock,</p>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration
                            in some form, by injected humour, or randomised words which don't look even slightly
                            believable.</p>
                        <a href="#">LEARN MORE</a>
                    </div>
                </div>
            </div>
        </section><!-- end of about -->
        <section class="portfolio" id="portfolio">
            <div class="center">
                <div class="title_box clear">
                    <div class="txt_contents">
                        <h2 class="title">Recent Project</h2>
                        <p class="title_txt">There are many variations of passages of Lorem Ipsum available, but the
                            majority have
                            suffered<br> alteration in some form, by injected humour</p>
                    </div>

                    <div class="view_more">
                        <a href="project.php">View More</a>
                    </div>
                </div>

                <div class="port_con_box clear">

                    <?php
                    $con = mysqli_connect("localhost", "yoonseul3", "rlaalsrud11#", "yoonseul3");
                    $sql = "select * from project order by num desc limit 3";
                    $result = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_array($result)) {
                        $num = $row["num"];
                        $image = $row["image"];
                        $title = $row["title"];
                        $text = $row["text"];
                    ?>

                    <div class="port_con">
                        <div>
                            <span>
                                <img src="images/<?= $image ?>" alt="portfolio1">
                            </span>
                            <div class="con_txt_box">
                                <h3><?= $title ?></h3>
                                <p><?= $text ?></p>
                                <a href="project_detail.php?num=<?= $num ?>">VIEW MORE</a>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div><!-- end of port_con_box -->
            </div>
        </section><!-- end of portpolio -->

        <section class="gallery" id="gallery">
            <div class="center">
                <div class="title_box clear">
                    <div class="txt_contents">
                        <h2 class="title">Gallery</h2>
                        <p class="title_txt">There are many variations of passages of Lorem Ipsum available, but the
                            majority have
                            suffered<br> alteration in some form, by injected humour</p>
                    </div>

                    <div class="view_more">
                        <a href="gallery.php">View More</a>
                    </div>
                </div><!-- end of title box -->

                <div class="gallery_contents clear">

                    <?php
                    $con = mysqli_connect("localhost", "yoonseul3", "rlaalsrud11#", "yoonseul3");
                    $sql = "select * from gallery_item order by num desc limit 8";
                    $result = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_array($result)) {
                        $image = $row["large_img"];
                    ?>

                    <div class="gallery_view">
                        <div>
                            <img src="images/gallery/<?= $image ?>" alt="">
                        </div>
                    </div>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>

        <section class="contact" id="community">
            <div class="center">
                <div class="title_box clear">
                    <div class="txt_contents">
                        <h2 class="title">Contact Us</h2>
                        <p class="title_txt">There are many variations of passages of Lorem Ipsum available, but the
                            majority have
                            suffered<br> alteration in some form, by injected humour</p>
                    </div>

                    <div class="view_more">
                        <a href="community.php">Go To Community</a>
                    </div>
                </div><!-- end of title box -->

                <div class="map_box">
                    <div class="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d163930.50467326492!2d14.325198506813901!3d50.05980536588944!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470b94e5e58eb59f%3A0x75209738d1d3b126!2sCharles%20Bridge!5e0!3m2!1sko!2skr!4v1595295816870!5m2!1sko!2skr"
                            width="100%" height="300"></iframe>
                    </div>
                </div>

                <div class="msg_box">
                    <form action="php/msg_insert.php" method="post" name="msg_form">
                        <p class="msg_name">
                            <input type="text" placeholder="Your Name" name="msg_name">
                        </p>
                        <p class="msg_email">
                            <input type="text" placeholder="Your Email" name="msg_email">
                        </p>
                        <p class="message">
                            <textarea placeholder="Write Your Messages" name="message"></textarea>
                        </p>
                        <button type="button" onclick="check_input()">SUBMINT</button>
                        <button type="button"><a href="community.php">Go To Community</a></button>
                    </form>
                </div>
            </div>
        </section>

        <?php include "include/footer.php" ?>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <script>
    function check_input() {
        if (!document.msg_form.msg_name.value) {
            alert("이름을 입력해 주세요.");
            document.msg_form.msg_name.focus();
            return;
        }
        if (!document.msg_form.msg_email.value) {
            alert("이메일을 입력해 주세요.");
            document.msg_form.msg_email.focus();
            return;
        }
        if (!document.msg_form.message.value) {
            alert("메시지를 입력해 주세요.");
            document.msg_form.message.focus();
            return;
        }

        document.msg_form.submit();
    }
    </script>
</body>

</html>













<!-- --- -->