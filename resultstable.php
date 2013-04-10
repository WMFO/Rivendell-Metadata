<?php
$dbhost = 'localhost';
$dbname = 'Rivendell';

#defines #dbuser and $dbpass
require_once('credentials.php'); 

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_errno) {
    die('Error connecting to mysql');
}
if (empty($_POST)) {
    die("Post is empty");
}
$category = $conn->real_escape_string($_POST['category']);
if ($_POST['exact'] == "") {
$query = '%' . $conn->real_escape_string(preg_replace('/\s+/', ' ',trim($_POST['query']))) . '%';
} else {
$query = $conn->real_escape_string(preg_replace('/\s+/', ' ',trim($_POST['query'])));
}
$limit = intval($_POST['limit']);
if ($limit > 1000) {
    $limit = 1000;
}
if ($_POST['query'] != "") {
    if ($category == "artist") {
        echo "<h3>Artist Query</h3>";
        $sql = "SELECT TITLE, ARTIST, ALBUM FROM CART WHERE GROUP_NAME = 'MUSIC' AND ARTIST LIKE ? ORDER BY ALBUM, CLIENT LIMIT ?";
        $stmt = $conn->prepare($sql) or die("prepare failed");
        $stmt->bind_param("si", $query, $limit) or die("bind_param failed");
        $stmt->execute() or die("execute failed");
        $stmt->store_result();
        if ($stmt->num_rows == 0) {
            echo "<p>No Results Found.</p>";
        }else{
            $stmt->bind_result($title,$artist, $album) or die("bind_result failed");
            echo "<table class='table table-striped'><tr><th>Title</th><th>Artist</th><th>Album</th></tr>";
            while($stmt->fetch()) {
                echo "<tr><td>" . $title . '</td><td>' . $artist . '</td><td>' . $album . "</td></tr>";
            }
            echo "</table>";
        }
    } elseif ($category == "title") {
        echo "<h3>Title Query</h3>";
        $sql = "SELECT TITLE, ARTIST, ALBUM FROM CART WHERE GROUP_NAME = 'MUSIC' AND TITLE LIKE ? LIMIT ?";
        $stmt = $conn->prepare($sql) or die("prepare failed");
        $stmt->bind_param("si", $query, $limit) or die("bind_param failed");
        $stmt->execute() or die("execute failed");
        $stmt->store_result();
        if ($stmt->num_rows == 0) {
            echo "<p>No Results Found.</p>";
        }else{
            $stmt->bind_result($title,$artist, $album) or die("bind_result failed");
            echo "<table class='table table-striped'><tr><th>Title</th><th>Artist</th><th>Album</th></tr>";
            while($stmt->fetch()) {
                echo "<tr><td>" . $title . '</td><td>' . $artist . '</td><td>' . $album . "</td></tr>";
            }
            echo "</table>";
        }
    } elseif ($category == "album") {
        echo "<h3>Album Query</h3>";
        $sql = "SELECT TITLE, ARTIST, ALBUM FROM CART WHERE GROUP_NAME = 'MUSIC' AND ALBUM LIKE ? ORDER BY ARTIST, CLIENT LIMIT ?";
        $stmt = $conn->prepare($sql) or die("prepare failed");
        $stmt->bind_param("si", $query, $limit) or die("bind_param failed");
        $stmt->execute() or die("execute failed");
        $stmt->store_result();
        if ($stmt->num_rows == 0) {
            echo "<p>No Results Found.</p>";
        }else{
            $stmt->bind_result($title,$artist, $album) or die("bind_result failed");
            echo "<table class='table table-striped'><tr><th>Title</th><th>Artist</th><th>Album</th></tr>";
            while($stmt->fetch()) {
                echo "<tr><td>" . $title . '</td><td>' . $artist . '</td><td>' . $album . "</td></tr>";
            }
            echo "</table>";
        }
    } else {
        echo "<h2>Query String Error</h2>";
        echo "<p>Your query string does not match the required input format.</p>";
    }
}
$conn->close();
