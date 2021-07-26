<?php
    $host = "172.17.0.3:3306";
    $user = "root";
    $pw = "1234";
    $dbName = "test";
    $con = mysqli_connect($host, $user, $pw, $dbName) or die("DB Connect Fail");
    $con->set_charset("utf8");
    /*
    $sql ="CREATE TABLE uTbl(seq int(11) not null auto_increment, username varchar(10) not null, userid char(8) not null, userpw char(64) not null, useremail varchar(40) unique not null, usermobile int(12) not null, birthday varchar(20), primary key(seq)) charset=utf8";

    $res = mysqli_query($con, $sql);
    if($res){
        echo "처리완료".$res;
    }else{
        echo "실패원인".mysqli_error($con);    
    }*/
?>