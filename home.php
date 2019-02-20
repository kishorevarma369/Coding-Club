<?php 
include('includes/header.php'); 
if(!isset($_SESSION['user_id'])) header('Location: '.$_SERVER['DOCUMENT_ROOT']);
?>

    <div class="container">
        <div id="header-img">
            <img src="img/header-background.jpg" alt="">
            <div id="header-img-after">
                <div class="header-container1">
                    <h1>Welcome to Coding Arena , Improve your Programming Skills</h1>
                </div>
                <div class="header-container2">
                    <?php
                        echo $_SESSION['user_id'].$_SESSION['username'];
                    ?>
                </div>
            </div>
        </div>
        <section id="promo">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus deserunt eaque, facilis earum rem necessitatibus, quidem unde dolores ducimus quia eveniet molestias. Voluptatem sit dicta, provident ea quos consectetur natus.</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus deserunt eaque, facilis earum rem necessitatibus, quidem unde dolores ducimus quia eveniet molestias. Voluptatem sit dicta, provident ea quos consectetur natus.</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus deserunt eaque, facilis earum rem necessitatibus, quidem unde dolores ducimus quia eveniet molestias. Voluptatem sit dicta, provident ea quos consectetur natus.</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus deserunt eaque, facilis earum rem necessitatibus, quidem unde dolores ducimus quia eveniet molestias. Voluptatem sit dicta, provident ea quos consectetur natus.</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus deserunt eaque, facilis earum rem necessitatibus, quidem unde dolores ducimus quia eveniet molestias. Voluptatem sit dicta, provident ea quos consectetur natus.</p>
        </section>
    </div>
<?php include('includes/footer.php'); ?>