<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/connection.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/session.php';

    $user = $_POST['id'];
    $password = $_POST['pw'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $year = $_POST['birthY'];
    $month = $_POST['birthM'];
    $day = $_POST['birthD'];


    $birthDay = $year.'-'.$month.'-'.$day;
    $password = hash("sha256",  $password);

    //echo 'id : '.$user.'<br>'.$password.'<br>'.$name.'<br>'.$mobile.'<br>'.$email.'<br>'.$birthDay.'<br>';

    //원래 페이지로
    function backPage($alert){
        echo $alert.'<br>';
        echo "<a href='./insert.php'> 회원가입으로 이동 </a>";
        return;
    }


    //pattern check
    
    //email
    if(!filter_Var($email, FILTER_VALIDATE_EMAIL)){
        backPage("email error");
        exit;
    }

    //name
    $namePattern = '/^[가-힣]{1,}$/';
    if(!preg_match($namePattern, $name, $matches)){
        backPage("name error");
        exit();
    }

    //ID
    $idPattern = '/^[a-zA-Z0-9_\.]/';
    if(!preg_match($idPattern, $user, $matches)){
        backPage("id error");
        exit();
    }
    

    //overlap
    $isEmailcheck = false;
    $isIDcheck = false;

    //email
    $sql = "SELECT useremail FROM uTbl WHERE useremail = '{$email}' ";
    $res = mysqli_query($con, $sql);
    if($res){
        $count = mysqli_num_rows($res);
        if($count == 0){
        $isEmailcheck = TRUE;
        }else{
            backPage("email overlap error");
            exit();
        }
    }else{
        echo "query error".mysqli_error($res);
    }

    //ID
    $sql ="SELECT userid FROM uTbl WHERE userid = '{$user}' ";
    $res = mysqli_query($con, $sql);
    if($res){   
        $conunt = mysqli_num_rows($res);
        if($count == 0){
            $isIDcheck = true;
        }else{
            backPage(" ID overlap error ");
            exit();
        }

    }else{
        echo "query error2".mysqli_error($res);
    }


    if($isEmailcheck == true && $isIDcheck == true){
    $regtime = time();
    $sql = "INSERT INTO uTbl (username, userid, userpw, useremail, usermobile, birthday, regtime) VALUES ('{$name}', '{$user}', '{$password}', '{$email}', '{$mobile}', '{$birthDay}', {$regtime} );";
    $res = mysqli_query($con, $sql);
    if($res){
        //$_SESSION['memberID'] = $
        header("Location:../index.html");
    }else{
        echo "실패사유".mysqli_error($con);
    }
    }else{
        backPage("error");
    }


?>