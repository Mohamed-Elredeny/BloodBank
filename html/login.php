<?php
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
</head>
<body>
<div class="img-bg">
    <div class="login-page">
        <center><img src="../assets/imgs/Group 5.png" alt="" class="img-login-slider"></center>
        <form action="login.php" method="POST">
            <div class="form-login">
                <input type="text" name="phone" class="btn" placeholder="الجوال">
                <input type="text" name="password" class="btn" placeholder="كلمه المرور">
            <a href="homePage.php" > <input type="button" class="btn-login" value="دخول"></a>
            </div>
            <a href=""> <label class="lbl">هل نسيت كلمه السر؟</label></a>
            <a href="signup.php" ><label class="lbl1">لا تمتلك حساب؟ سجل من هنا</label></a>
        </form>
    </div>
</div>
</body>
</html>
