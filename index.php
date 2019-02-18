<?php include('includes/header.php'); ?>
<?php
if(isset($_SESSION['user_id'])) header('Location: '.'/home.php');
?>
    <div class="container">
        <div id="header-img">
            <img src="img/header-background.jpg" alt="">
            <div id="header-img-after">
                <div class="header-container1">
                    <h1>Welcome to Coding Arena , Improve your Programming Skills</h1>
                </div>
                <div class="header-container2">
                    <div class="signup-login">
                        <span id="signup-link" class="sl-active">Sign up</span>
                        <span id="login-link" >Login</span>
                    </div>
                    <form action="signup.php" method="POST" class="signup-form">
                        <div class="form-row">
                            <span>Username</span>
                            <input type="text" name="username" placeholder="Enter your Name">
                        </div>
                        <br>
                        <div class="form-row">
                            <span>Email</span>
                            <input type="email" name="email" placeholder="Enter your Email">
                        </div>
                        <br>
                        <div class="form-row">
                            <span>Password</span>
                            <input type="password" name="pass" placeholder="Enter your Password">
                        </div>
                        <br>
                        <div class="form-row">
                            <span>Re-enter Password</span>
                            <input type="password" name="re-pass" placeholder="Re-Enter your Password">
                        </div>
                        <br>
                        <div class="form-row">
                            <input type="submit" name="submit" value="submit">
                        </div>
                    </form>
                    <form action="login.php" method="POST" class="login-form">
                        <div class="form-row">
                            <span>Username</span>
                            <input type="email" name="email" placeholder="Enter your Email">
                        </div>
                        <br>
                        <div class="form-row">
                            <span>Password</span>
                            <input type="password" name="pass" placeholder="Enter your Password">
                        </div>
                        <br>
                        <div class="form-row">
                            <input type="submit" name="submit" value="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- <section id="promo">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus deserunt eaque, facilis earum rem necessitatibus, quidem unde dolores ducimus quia eveniet molestias. Voluptatem sit dicta, provident ea quos consectetur natus.</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus deserunt eaque, facilis earum rem necessitatibus, quidem unde dolores ducimus quia eveniet molestias. Voluptatem sit dicta, provident ea quos consectetur natus.</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus deserunt eaque, facilis earum rem necessitatibus, quidem unde dolores ducimus quia eveniet molestias. Voluptatem sit dicta, provident ea quos consectetur natus.</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus deserunt eaque, facilis earum rem necessitatibus, quidem unde dolores ducimus quia eveniet molestias. Voluptatem sit dicta, provident ea quos consectetur natus.</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus deserunt eaque, facilis earum rem necessitatibus, quidem unde dolores ducimus quia eveniet molestias. Voluptatem sit dicta, provident ea quos consectetur natus.</p>
        </section> -->
    </div>
<?php include('includes/footer.php'); ?>