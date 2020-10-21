<?php 
  include 'functions/init.php';
  include 'functions/functions.php';
  include 'includes/header.php';
  include 'includes/nav.php';
  include 'includes/footer.php';
?>

<div class="jumbotron">
  <h1 class="text-center"> Home Page</h1>
</div>

<?php 
  $sql = "SELECT * FROM users";
  $result = query($sql);
  confirm($result);

  $row = fetch_array($result);
  echo $row['first_name'];
  echo $row['last_name'];
  echo $row['email'];
  echo $row['username'];
?>