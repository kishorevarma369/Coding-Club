<?php include('includes/header.php'); ?>
<?php
if(!isset($_SESSION['user_id'])) header('Location: '.'/index.php');
?>
    <div class="container">
    <div id="header-img">
            <img src="img/header-background.jpg" alt="">
            <div id="header-img-after">
                <div class="header-container1 block">
                    <a href="create_question.php">Create Question</a>
                </div>
                <div class="header-container1 block">
                    <a href="create_contest.php">Create Contest</a>
                </div>
            </div>
        </div>
        <!-- <ul>
            <li><a href="create_question.php">Create Question</a></li>
            <li><a href="create_contest.php">Create Contest</a></li>
        </ul> -->
    </div>
<?php include('includes/footer.php'); ?>