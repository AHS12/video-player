<?php
/**
 * Created by PhpStorm.
 * User: MD AZIZUL HAKIM
 * Date: 22/01/2018
 * Time: 06:31 PM
 */
?>
<?php
@ob_start();
if (session_status() != PHP_SESSION_ACTIVE) session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Video</title>
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="lib/jQuery/jquery-3.2.1.min.js"></script>


    <script>
        /* Script written by Adam Khoury @ DevelopPHP.com */
        /* Video Tutorial: http://www.youtube.com/watch?v=EraNFJiY0Eg */
        function _(el) {
            return document.getElementById(el);
        }
        function uploadFile() {
            var file = _("file1").files[0];
            // alert(file.name+" | "+file.size+" | "+file.type);
            var formdata = new FormData();
            formdata.append("file1", file);
            var ajax = new XMLHttpRequest();
            ajax.upload.addEventListener("progress", progressHandler, false);
            ajax.addEventListener("load", completeHandler, false);
            ajax.addEventListener("error", errorHandler, false);
            ajax.addEventListener("abort", abortHandler, false);
            ajax.open("POST", "scripts/video_upload.php");
            ajax.send(formdata);
        }
        function progressHandler(event) {
//            _("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
            var percent = (event.loaded / event.total) * 100;
            _("progressBar").value = Math.round(percent);
            _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
        }
        function completeHandler(event) {
            _("status").innerHTML = event.target.responseText;
            _("progressBar").value = 0;
        }
        function errorHandler(event) {
            _("status").innerHTML = "Upload Failed";
        }
        function abortHandler(event) {
            _("status").innerHTML = "Upload Aborted";
        }

    </script>


</head>
<body class="container">
<h3 class="text-center">Upload Course Video</h3>
<h4 class="text-center alert alert-danger">Note: Mamximum video Limit is 200mb and video formate must me .mp4</h4>
<hr>
<div style="" class="col-md-offset-3">
    <form id="upload_form" enctype="multipart/form-data" method="post">

        <input class="text-center btn btn-info" type="file" name="fileup" id="file1"><br>
        <input class="text-center btn btn-success" type="button" name="upload" value="Upload video"
               onclick="uploadFile()"> <br> <br>
        <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
        <h3 id="status"></h3> <br>

        <!--        <p id="loaded_n_total"></p>-->
    </form>


</div>


<div>
    <form class="col-md-offset-3" method="post" enctype="multipart/form-data"
          action="scripts/video_record.php">


        <?php

        if (isset($_SESSION["successMsg"])) {
            echo "<h2 id=\"message\" class=\"text-center alert alert-danger\"><strong>Video Record inserted!</strong></h2>";
        }
        session_unset();
        ?>


        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Title</span>
            <input type="text" class="form-control" placeholder="Title" name="title" aria-describedby="basic-addon1"
                   required>
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Description</span>
            <textarea type="text" class="form-control" placeholder="Description" name="desc"
                      aria-describedby="basic-addon1" required></textarea>
        </div>
        <br>
        <div>
            <button class="btn btn-success" name="submitvideodata">Submit</button>
        </div>
    </form>
</div>


<!-- Uploded table -->

<div>

    <hr>
    <h3>Uploded Video List</h3>
    <hr>

    <table class="table table-responsive">
        <thead>
        <tr class="bg-success">
            <th>Video Serial</th>
            <th>Video Title</th>
            <th>Video Description</th>
            <th>Length/Duration</th>

        </tr>
        </thead>

        <?php
        include "db/database.php";
        require_once "lib/getid3/getid3.php";
        $getID3 = new getID3;

        $db = new Database();

        $query = "SELECT * FROM videos";

        $result = $db->query($query);

        while ($row = mysqli_fetch_assoc($result)) {

            $video_id = $row['id'];
            $video_url = $row['video_url'];
            $video_serial = $row['serial'];
            $video_title = $row['title'];
            $video_desc = $row['description'];


            $min = " minutes";
            if(empty($video_title) && empty($video_desc)){
                $video_title = " No DATA";
                $video_desc = " No DATA";
            }

            $fileData = $getID3->analyze($video_url);
            $video_duration = $fileData['playtime_string'];


            echo "
                    <tr>
                    <td>
                    $video_serial
                    </td>
                    
                    
                    <td>
                    $video_title
                    </td>
                    
                   
                    <td>
                    $video_desc
                    </td>
                    
                    <td>
                    $video_duration.$min
                    </td>
                    </tr>
                    
                    ";

        }


        ?>

        <tbody>


        </tbody>
    </table>

</div>


<script src="lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
