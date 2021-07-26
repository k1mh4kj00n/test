<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/connection.php';
    $sql = "select * from uTbl";
    $res = mysqli_query($con, $sql);

    if($res){
        $count = mysqli_num_rows($res);
    }else{
        echo "select error : ".mysqli_error($con);
    }

    echo "<h1> 회원조회 </h1>";
    echo "<a href= 'index.html'> 처음으로 </a><br>";
    echo "<TABLE border=1>";
    echo "<TR> <TD>아이디</TD><TD>이름</TD><TD>메일</TD> <TD>휴대폰 번호</TD> <TD>생년월일</TD> <TD>가입일</TD> </TR>";    
    while($row = mysqli_fetch_array($res)){
        $regtime = date('Y-m-d',strtotime('now',$row['regtime']));
        echo "<TR> <TD>{$row['userid']}</TD> <TD>{$row['username']}</TD> <TD>{$row['useremail']}</TD> <TD>{$row['usermobile']}</TD> <TD>{$row['birthday']}</TD> <TD>$regtime</TD>";
        echo "<TD>", "<a href='delete.php?userID=",$row['userid'], "'>삭제</a></TD>";
        echo "<TD>", "<a href='update.php?userID=",$row['userid'], "'>수정</a></TD>";
        echo "</TR>";
    }


?>