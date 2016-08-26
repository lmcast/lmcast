<?php function regActive(){
  $url = $_SERVER['HTTP_HOST'];
  include '../includes/connect-db.php';
  $query = "SELECT * FROM sites WHERE Site_URL = '$url'";
  $result = mysqli_query($conn, $query);
  $sreg = mysqli_fetch_array($result);
  return $sreg['Site_Reg'];
}
$reg = regActive();
?>
<form id='login' method="post" action="doLogin.php" >
    <input id="uname" class="login-input loginscreen-form" type="text" title="Username" placeholder="Username or Email" name="Username" value="<?php if(!empty($_GET['user'])){ echo $_GET['user']; } ?>"><br>
    <input id="pass" class="login-input loginscreen-form" type="password" title="Password" placeholder="Password" name="Password"><br>
    <input id="check" type="checkbox" title="Remember"><label for='check'>Remember Me</label><br>
    <input id="redir" type="hidden" name="redir" value="<?php if(isset($_GET['redir'])){ echo $_GET['redir']; } ?>">
    <?php if($reg == '1') { ?>
    <button type="submit" class="login-button">Log In</button>
    <a title="Register" id="link" class="login-button" data-title="Register" data-state="reg" data-target="?page=register" data-page="register.php" href="?page=register">Register</a>
    <?php } else {?>
    <button type="submit" class="login-button2">Log In</button>
    <?php } ?>
</form>
<script src="login.js"></script>
<script src="../includes/login/js/login.js"></script>
<?php
    include('../includes/login/message.php');
?>
