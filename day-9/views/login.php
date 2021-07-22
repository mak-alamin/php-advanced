<h1>Login</h1>
<form action="" method="post">
    
    <label for="email">Your Email</label>
    <input type="email" name="email" id="email">
    <?php 
        if(isset($email_err)){
            echo '<span>'. $email_err .'</span>'; 
        }
    ?>
    
    <br><br>

    <label for="password">Your Password</label>
    <input type="password" name="password" id="password">  
    <?php 
        if(isset($pass_err)){
            echo '<span>'. $pass_err .'</span>'; 
        }
    ?>

    <br><br>

    <input type="submit" name="login" value="Login">
</form>