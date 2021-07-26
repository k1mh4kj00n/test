<?php 

    include_once $_SERVER['DOCUMENT_ROOT'].'/session.php';
    session_destroy();
    echo "<script>alert('log out'); history.back();</script>";
    
?>
