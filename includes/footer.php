
    <footer>
        Kishore Varma 2018 &COPY; All Rights Reserved    
    </footer>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
    </script>
</body>
</html>