<?php session_start(); ?>
<?php include_once 'includes/header.php'; ?>
<div class="container">
<?php if(isset($_SESSION['userLogedIn'])): ?>
  <h2 class="text-center">Dobrodosli <?php echo " ". $_SESSION['user']; ?> >>> <a href='logout.php'> Logout</a> <<<</h2>
<?php endif ?>
</div>
<?php include_once 'includes/footer.php'; ?>
