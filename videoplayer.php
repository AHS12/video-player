<?php
/**
 * Created by PhpStorm.
 * User: MD AZIZUL HAKIM
 * Date: 18/01/2018
 * Time: 11:42 AM
 */

?>

<?php
@ob_start();
if (session_status() != PHP_SESSION_ACTIVE) session_start();

require_once "db/database.php"
//?>
<?php
$video_id = null;
$video_url = null;
$video_desc = null;
$video_mtitle = null;

if (isset($_GET['id'])) {

    $video_id = $_GET['id'];


    $db2 = new Database();
    $query = "SELECT * FROM videos WHERE id = '$video_id'";
    $result = $db2->query($query);
    $video_data = mysqli_fetch_assoc($result);
    $video_url = $video_data['video_url'];
    $video_mtitle = $video_data['title'];
    $video_desc = $video_data['description'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $video_mtitle ?></title>

    <!-- Bootstrap core CSS -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="style/videoplayer.css" rel="stylesheet">

</head>

<body>

<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                    <!--                        --><?php //echo $video_title; ?>
                    Tutorial Title
                </a>
            </li>
            <?php
            $db = new Database();
            $query = "SELECT * FROM videos";
            $result = $db->query($query);
            $serial = 1;

            while ($row = mysqli_fetch_assoc($result)) {
                $video_id = $row['id'];
                $video_title = $row['title'];

                ?>


                <li>
                    <a href="videoplayer.php?id=<?php echo $video_id ?>"><?php echo $serial . ". " . $video_title ?></a>
                </li>


                <?php
                $serial++;
            }


            ?>

        </ul>
    </div>


    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div>
            <a href="#menu-toggle" class="btn btn-success" id="menu-toggle">Course Playlist</a>
        </div>
        <div class="container text-center">

            <h2 class="text-center"><?php

                if (isset($_GET['id'])) {
                    echo $video_mtitle;
                } else echo "Select Video From Playlist";

                ?></h2><br>
            <!--            <h3>--><?php //echo $video_url ?><!--</h3>  <br>-->
            <hr>

            <div style="max-width: 700px;
                        max-height: 400px;
                        margin-right: auto;
                        margin-left: auto;">
                <div class="embed-responsive embed-responsive-16by9">
                    <video controls loop autoplay class="embed-responsive-item">
                        <source src="<?php

                        if (isset($_GET['id'])) {
                            echo $video_url;
                        }

                        ?>" type="video/mp4">
                    </video>
                </div>
            </div>

        </div>


        <hr>

        <div class=" container text-center">

            <h3>Lecture Description</h3>
            <p> <?php

                if (isset($_GET['id'])) {
                    echo $video_desc;
                } else echo "Select Video From Playlist";

                ?></p>
        </div>


        <div class="container text-center help-block">
            <h3>File infromation</h3>
            <?php

            if (isset($_GET['id'])) {
                require_once "lib/getid3/getid3.php";
                $getID3 = new getID3;
                $file = $getID3->analyze($video_url);
                echo("Duration: " . $file['playtime_string'] .
                    " / Dimensions: " . $file['video']['resolution_x'] . " wide by " . $file['video']['resolution_y'] . " tall" .
                    " / Filesize: " . $file['filesize'] . " bytes<br />");

            } else echo "no File Selected!!"


            ?>

        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="lib/jQuery/jquery-3.2.1.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

</body>

</html>

