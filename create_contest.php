<?php include('includes/header.php'); ?>
<?php
if(!isset($_SESSION['user_id'])) header('Location: '.'/index.php');
?>
    <div class="container form-container">
        <h1>Create a Contest</h1>
        <form action="create_contest.php" method="post">
            <br><br>
            <div class="form-row">
                <span>Contest Name</span>
                <input type="text" name="cname" placeholder="Enter your Contest Name">
            </div>
            <br><br>
            <div class="form-row">
                <span>Contest Content</span>
                <textarea name="ccontent" rows="30" placeholder="Enter Contest Content"></textarea>
            </div>
            <br><br>
            <div class="form-row">
                <input type="submit" name="submit" value="submit">    
            </div>
            <br><br>
        </form>
    </div>
<?php include('includes/footer.php'); ?>