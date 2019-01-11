var myNav = document.getElementById('navbar');
window.onscroll = function () { 
    "use strict";
    if (document.body.scrollTop >= 200 ) {
        myNav.classList.toggle("nav-colored");
    } 
};