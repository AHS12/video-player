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
$video_title = null;
if (isset($_GET['id'])) {

    $video_id = $_GET['id'];


    $db2 = new Database();
    $query = "SELECT * FROM videos WHERE id = '$video_id'";
    $result = $db2->query($query);
    $video_data = mysqli_fetch_assoc($result);
    $video_url = $video_data['video_url'];
    $video_title = $video_data['title'];
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

    <title>Video Player</title>

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

            while ($row = mysqli_fetch_assoc($result)) {
                $video_id = $row['id'];
                $video_name = $row['vid_name'];

                ?>


                <li>
                    <a href="index.php?id=<?php echo $video_id ?>"><?php echo $video_name ?></a>
                </li>


                <?php
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

            <h1>Tutorial Title</h1>
            <h3><?php echo $video_title ?></h3>  <br>
<!--            <h3>--><?php //echo $video_url ?><!--</h3>  <br>-->
            <hr>

            <div style="max-width: 700px;
                        max-height: 400px;
                        margin-right: auto;
                        margin-left: auto;">
                <div class="embed-responsive embed-responsive-16by9">
                    <video controls loop autoplay class="embed-responsive-item">
                        <source src="<?php echo $video_url ?>" type="video/mp4">
                    </video>
                </div>
            </div>

        </div>


        <hr>

        <div class=" container text-center">

            <h3>Lecture Description</h3>
            <p> <?php echo $video_desc; ?></p>
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

