<?php
function get_user_by_username($username)
{
    global $connection;

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    } else {
        return false;
    }
}

function get_user_by_id($id)
{
    global $connection;

    $sql = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    } else {
        return false;
    }
}

function include_page($page) {
    $page = strtolower($page);
    $page_path = 'pages/' . $page . '.php';
    if (file_exists($page_path)) {
        require_once $page_path;
    } else {
        require_once 'pages/home.php';
    }
}

?>