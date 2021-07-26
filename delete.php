<?php 
    include_once $_SERVER['DOCUMENT_ROOT'].'/session.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/connection.php';
    
    if(isset($_SESSION['user_id'])){
        $sql ="SELECT userid FROM uTbl WHERE userid = '{$_GET['userID']}'";
        $res = mysqli_query($con, $sql);
        if($res){
            $count = mysqli_num_rows($res);
            if($count == 0){
                echo "<script>alert('정보가 없습니다.');</script>";
            }else{
                $sql = "DELETE FROM uTbl WHERE userid = '{$_GET['userID']}'";
                $res = mysqli_query($con, $sql);
                echo "<script>alert('해당유저가 삭제');</script>";
            }        
        }else{
            echo "slq eroor".mysqli_error($con);
        }

    }else{
        echo "<script>alert('로그인이 필요'); history.back();</script>"; 
    }

?>