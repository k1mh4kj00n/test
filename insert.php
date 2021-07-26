<html>

    <head>
        <title>신규가입</title>
    </head>

    <body>
        <h1> 회원가입 </h1>
        
        <form name='status' method='post' action='insert_re.php' >
            <input name='id' type='text' minlength='4' maxlength ='8' placeholder = "아이디" required> <br><br>
            <input name='pw' type='password' minlength='8' maxlength ='12' placeholder= "비밀번호" required>  <br><br>
            <input name='pw' type='password' minlength='8' maxlength ='12' placeholder= "비밀번호 확인" required>  <br><br>
            <input name='name' type='text' maxlength='4' placeholder= "이름" required>  <br><br>
            <input name='email' type='text' placeholder= "메일" required>  <br><br>
            <input name='mobile' type='text' maxlength ='12' placeholder= "휴대폰번호 - 제외 입력" required>  <br><br>

            <select name ="birthY" required>
            <?php
                $thisY = date('Y',time());
                for($i=$thisY; $i >= 1930; $i--){
                    echo "<option value='{$i}'>{$i}</option>";}           
            ?></select>년

            <select name = "birthM" required> 
            <?php
                $thisM = date('M',time());                
                for($i=1; $i <= 12; $i++){
                    if($i > 9){
                        echo "<option value='{$i}'>{$i}</option>";}
                    else{
                        echo "<option value='0{$i}'>0{$i}</option>";}}
            ?></select>월

            <select name = "birthD" required>
            <?php
                for($i=1; $i<=31; $i++){
                    if($i < 10){
                        echo "<option value='0{$i}'> 0{$i} </option>";                
                    }else{
                    echo "<option value='{$i}'> {$i} </option>";}}            
            ?></select>

        <br><br> <input type='submit' value='회원가입'>  </input>
        </form>
        <br>
        <a href='index.html'> 처음으로 </a><br>


    </body>
</html>

