let lastScrollTop = 0;
const header = document.getElementById("header");
const menuBtn = document.getElementById("menu-bar");

window.addEventListener("scroll", function () {
  let scrollTop =
    window.pageYOffset || document.documentElement.scrollTop;

  if (scrollTop > lastScrollTop) {
    menuBtn.checked = false;
    header.classList.add("hidden");
    if (scrollTop > 0) {
      header.classList.add("header-white-bg");
    }
  } else {
    header.classList.remove("hidden");
    if (scrollTop === 0) {
      header.classList.remove("header-white-bg");
    }
  }

  lastScrollTop = scrollTop;
});