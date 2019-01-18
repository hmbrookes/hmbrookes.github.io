window.onscroll = function() {myFunction()};

function myFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    document.getElementById("navbar").className = "nav-colored";
  } else {
    document.getElementById("navbar").className = "";
  }
}