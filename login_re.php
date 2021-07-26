<!DOCTYPE html>
<?php 
    include_once $_SERVER['DOCUMENT_ROOT'].'/connection.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/session.php';

    $user = addslashes($_POST['id']);
    $password = addslashes($_POST['pw']);
    $password = hash("sha256",  $password);

    $sql = "SELECT userid FROM uTbl WHERE userid = '{$user}' and userpw = '$password'";
    $res = mysqli_query($con, $sql);

    if($res){
        $count = mysqli_num_rows($res);
        if($count == 0){
            echo "<script> alert('doesn\'t exist ID or password'); history.back(); </script>";
        }else{
            $_SESSION['user_id'] = $user;
            if(isset($_SESSION['user_id'])){
                echo "<script>alert('login as $user'); window.location.href = './index.html'; </script>";
                //echo "<meta http-equiv='refresh' content='5; url=index.html'>";
                //header("Location:../index.html");
            }
            echo "login seccess";
        }
        
    }else{
        echo "id error".mysqli_error($con); 
    }

    echo "<a href='/login.php'> 처음으로 </a>";
    



?>