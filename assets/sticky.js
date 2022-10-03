var header = document.getElementById("stickyheader")

var sticky = header.offsetTop

function stickTheHeader() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky")
  } else {
    header.classList.remove("sticky")
  }
}

window.onscroll = function() {stickTheHeader()}