<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Log-in</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/reset.css" type="text/css">
    <link rel="stylesheet" href="../css/loginPage.css" type="text/css">
    <link rel="stylesheet" href="../css/footer.css" type="text/css">
    <link rel="stylesheet" href="../css/imageSingInUp.css" type="text/css">
    <link rel="stylesheet" href="../css/lettering.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i" rel="stylesheet">
</head>
<body>
<div class="pageContent">
  <div id="logoImage">
    <img src="../images/logo.png" alt="logo" height="200px">
  </div>
  <div id="userNameSI">
    <?php
        if(isset($_SESSION['incorrectLogin_flag']) && $_SESSION['incorrectLogin_flag']==1) {
          echo '<div>
            <span id="loginError">
            Incorrect username or password.</span>
            </div>';
          }
      ?>
      <form action="actions/login.php" method="post" class="formUser">
        <label>
          <br>
          Username:
          <br>
          <input type="text" name="username" placeholder="Email ou Username">
          <br>
        </label>
        <label>
          <br>
          Password:
          <br>
          <input type="password" name="password" placeholder="Password">
          <br>
        </label>
        <br>
        <br>
        <input type="submit" value="Login">
      </form>
    </div>
    <div id="backButonLogin">
      <form action="mainPage.php" method="post" class="formBack">
        <input type="submit" value="Back to main Page">
      </form>
    </div>
  </div>
  <?php
  include_once('templates/footer.php');
  ?>
</body>

</html>
