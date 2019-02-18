    <footer>
        Coding Arena 2018 &COPY; All Rights Reserved    
    </footer>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery.min.js"></script>
    <script>
        const main_nav_div=$('#main-nav')
        const mobile_menu_close_button=$('#mobile-menu-close-button')
        const mobile_menu_button=$('#mobile-menu-button')
        smooth_close_func=function(){
            main_nav_div.toggle();
            mobile_menu_close_button.toggle();
            mobile_menu_button.toggle();
        }
        $('#mobile-menu-button').click(
            function(){
                mobile_menu_button.toggle();
                main_nav_div.toggle();
                main_nav_div.css("width","50vw");
                main_nav_div.css("padding","10%");
                mobile_menu_close_button.toggle();
                
            }
        )
        mobile_menu_close_button.click(function(){
            main_nav_div.css("width","0");
            main_nav_div.css("padding","0");
            setTimeout(smooth_close_func,1000);
        })
        const login_form=$('.login-form')
        const signup_form=$('.signup-form')
        const login_link=$('#login-link')
        const signup_link=$('#signup-link')
        login_form.toggle();
        login_link.click(function(){
            if(login_link.hasClass('sl-active')) return;
            login_link.toggleClass('sl-active')
            signup_link.toggleClass('sl-active')
            signup_form.toggle();
            login_form.toggle();
            
        })
        signup_link.click(function(){
            if(signup_link.hasClass('sl-active')) return;
            login_link.toggleClass('sl-active')
            signup_link.toggleClass('sl-active')
            login_form.toggle();
            signup_form.toggle();
        })
        // signup_form.toggle();
    </script>
</body>
</html>