<?php include('includes/header.php'); ?>
<?php
if(!isset($_SESSION['user_id'])) header('Location: '.'/index.php');
?>
    <div class="container">
        <h1>Question Not found</h1>
    </div>
<?php include('includes/footer.php'); ?>