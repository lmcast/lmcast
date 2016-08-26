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
<form id="reg" method="post" action="doReg.php">
    <?php if($reg == '1') { ?>
    <input id="uname" type="text" title="Username" placeholder="Username" name="Username" class="login-input" value="<?php if(!empty($_GET['user'])){ echo $_GET['user']; } ?>"><br>
    <input id="email" type="email" title="Email" placeholder="Email" name="Email" class="login-input" value="<?php if(!empty($_GET['email'])){ echo $_GET['email']; } ?>"><br>
    <input id="pass" type="password" title="Password" placeholder="Password" name="Password" class="login-input"><br>
    <input id="pass2" type="password" title="Confirm Password" placeholder="Confirm Password" name="PassConf" class="login-input"><br>
    <input type="hidden" name="View" value="User_Login">
    <input type="hidden" name="Date" value="0">
    <button type="submit" id="submit" class="login-button">Register</button>
<?php } else {
  echo "Registation is not currently allowed. Please go back to the sign in page to sign in.<br><br>";
} ?>
    <a title="Login" id="link2" class="login-button" data-title="Log In" data-state="login" data-target="?page=login" data-page="login.php" href="?page=login">Log In</a>
</form>
<script src="../includes/login/js/login.js"></script>
<script src="login.js"></script>
<?php
    include('../includes/login/message.php');
?>
