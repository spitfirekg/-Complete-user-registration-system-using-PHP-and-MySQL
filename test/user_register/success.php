<?php include_once 'includes/header.php';?>
<?php include_once 'classLoader.php'; ?>
<?php session_start(); ?>

<div class="container">
  <?php if(isset($_SESSION['userLogedIn'])): ?>
    <h3 class="text-center">Dobrodosli <?php echo $_SESSION['user']." - "; ?>
    <a href="logout.php" class="text-center" style="color:darkred;"> >>> Logout <<<</a></h3>
  <?php endif ?>

  <?php if(!isset($_SESSION['userLogedIn'])): ?>
    <a href="index.php">Molimo vas registrujte se</a>
  <?php endif ?>

</div>

 <?php include_once 'includes/footer.php'; ?>
