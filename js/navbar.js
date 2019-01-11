
window.onscroll = function () { 
	"use strict";
	var myNav = document.getElementById('navbar');
    if (document.body.scrollTop >= 200 ) {
        myNav.classList.add("nav-colored");
    }else{
		myNav.classList.remove("nav-colored");
	}
};