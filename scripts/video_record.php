<?php
/**
 * Created by PhpStorm.
 * User: MD AZIZUL HAKIM
 * Date: 23/01/2018
 * Time: 01:01 PM
 */

@ob_start();
if (session_status() != PHP_SESSION_ACTIVE) session_start();


require_once "../db/database.php";
$db = new Database();

if (isset($_POST['submitvideodata'])) {

    $videoTitle = $db->escape_string($_POST['title']);
    $videoDesc = $db->escape_string($_POST['desc']);
    $video_url = "videos/" . $_SESSION['fileName'];

    $newFileName = $_SESSION['fileName'];

//    echo $videoTitle . $videoDesc . $newFileName . $video_url;


    //serial

    $video_serial = 0;
    $serial_query = "SELECT * FROM videos";
    $serial_result = $db->query($serial_query);
    $serial_row = mysqli_num_rows($serial_result);
    $video_serial = $serial_row + 1;

    //week
    $video_week = ceil($video_serial / 7);


    $query = "INSERT INTO videoplayer.videos(serial,title, vid_name, video_url, description,week) VALUES ";
    $query .= "('$video_serial','$videoTitle','$newFileName','$video_url','$videoDesc','$video_week')";

    $result = $db->query($query);
    if (!$result) {
        die("Failed!!!" . mysqli_error($db->connection));
    }

    session_unset();
    header("location: ../index.php");
    $_SESSION['successMsg'] = 1;
}