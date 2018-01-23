<?php
/**
 * Created by PhpStorm.
 * User: MD AZIZUL HAKIM
 * Date: 23/01/2018
 * Time: 01:01 PM
 */
session_start();


require_once "../db/database.php";
$db = new Database();

if (isset($_POST['submitvideodata'])) {

    $videoTitle = $db->escape_string($_POST['title']);
    $videoDesc = $db->escape_string($_POST['desc']);
    $video_url = "videos/" . $_SESSION['fileName'];

    $newFileName = $_SESSION['fileName'];

    echo $videoTitle . $videoDesc . $newFileName . $video_url;

    $query = "INSERT INTO videoplayer.videos(title, vid_name, video_url, description) VALUES ";
    $query .= "('$videoTitle','$newFileName','$video_url','$videoDesc')";

    $result = $db->query($query);
    if (!$result) {
        die("Failed!!!" . mysqli_error($db->connection));
    }
    
    session_unset();
    header("location: ../index.php");
    $_SESSION['successMsg'] = 1;
}