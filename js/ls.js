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