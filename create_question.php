<?php include('includes/header.php'); ?>
<?php
if(!isset($_SESSION['user_id'])) header('Location: '.'/index.php');
?>
    <div class="container form-container">
        <form action="create_question.php" method="post">
            <div class="form-row">
                <span>Question Name</span>
                <input type="text" name="qname" placeholder="Enter your Question Name">
            </div>
            <div class="form-row">
                <span>Question Content</span>
                <textarea name="qcontent" placeholder="Enter your Question Name"></textarea>
            </div>
            <div class="form-row">
                <input type="submit" name="submit" value="submit">    
            </div>
        </form>
    </div>
<?php include('includes/footer.php'); ?>