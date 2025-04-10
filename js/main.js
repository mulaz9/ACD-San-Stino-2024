"use strict";

/////////// Media queries ///////////

function getScrollbarWidth() {
  return window.innerWidth - document.documentElement.clientWidth;
}

const scrollbarWidth = getScrollbarWidth();
const windowWidth = window.innerWidth;
const windowHeight = window.innerHeight;

window.isPhone = windowWidth < 768;
window.isMobile = windowWidth < 1024;
window.isLandscape = windowWidth >= 1024 && windowWidth < 1280;
window.isPortrait = windowWidth >= 768 && windowWidth < 1024;
window.isDesktop = windowWidth >= 1024;
window.isDesktopLarge = windowWidth >= 1280;
window.isDesktopLarger = windowWidth >= 1440;
window.isDesktopXXL = windowWidth >= 1920;

/////////// Show menu ///////////

if (isMobile) {
  const hamburger = document.querySelector("#open_menu");
  const menu = document.querySelector("#sidebar_menu");
  const menuLine1 = document.querySelector(".line_1");
  const menuLine2 = document.querySelector(".line_2");
  const menuLine3 = document.querySelector(".line_3");
  const headerText = document.querySelectorAll(".caption_box");
  const html = document.querySelector("html");
  const body = document.querySelector(".body");
  const menuUl = document.querySelector("#menu-highlight-menu");
  let menuIsOpened = false;

  const showMenu = function () {
    hamburger.addEventListener("click", function () {
      if (!menuIsOpened) {
        headerText.forEach((txt) => (txt.style.opacity = 0));
        menuLine1.style.opacity = 0;
        menuLine2.style.transform = "rotate(135deg)";
        menuLine2.style.top = "40px";
        menuLine3.style.transform = "rotate(-135deg)";
        menuLine3.style.top = "40px";
        menu.classList.remove("hidden");
        menuUl.style.paddingBottom = "80px";
        menu.style.transform = "translateY(0)";
        html.style.overflow = "hidden";
        menuIsOpened = true;
        console.log("menuIsOpened");
      } else {
        headerText.forEach((txt) => (txt.style.opacity = 1));
        menuLine1.style.opacity = 1;
        menuLine2.style.transform = "rotate(180deg)";
        menuLine2.style.top = "30px";
        menuLine3.style.transform = "rotate(-180deg)";
        menuLine3.style.top = "50px";
        menu.classList.add("hidden");
        menuUl.style.paddingBottom = "0";
        menu.style.transform = "translateY(-150%)";
        html.style.overflow = "auto";
        menuIsOpened = false;
      }
    });
  };

  // Show submenu
  const menuHasChildren = document.querySelectorAll(
    "#sidebar_menu .menu-item-has-children"
  );

  const showSubmenu = function () {
    menuHasChildren.forEach(function (menu) {
      let submenuArrow = document.createElement("span");
      menu.appendChild(submenuArrow);
      const subMenu = menu.children[1];
      let submenuIsOpen = false;
      menu.addEventListener("click", function () {
        if (submenuIsOpen == false) {
          subMenu.style.paddingTop = "15px";
          subMenu.style.paddingBottom = "15px";
          subMenu.style.maxHeight = "1000px";
          subMenu.style.overflow = "visible";
          subMenu.classList.add("submenu_open");
          submenuArrow.classList.add("open");
          submenuIsOpen = true;
        } else {
          subMenu.style.paddingTop = "unset";
          subMenu.style.paddingBottom = "unset";
          subMenu.style.maxHeight = "0";
          subMenu.style.overflow = "hidden";
          subMenu.classList.remove("submenu_open");
          submenuArrow.classList.remove("open");
          submenuIsOpen = false;
        }
      });
    });
  };
  showSubmenu();
  showMenu();
}
// Sticky menu background

const nav = document.querySelector("#header");
const slideshow = document.querySelector("#main_slideshow");
const btt = document.querySelector(".btt");
if (slideshow) {
  const slideshowHeight = slideshow.offsetHeight;
  const headrHeight = nav.offsetHeight;
  window.addEventListener("scroll", function () {
    if (this.window.scrollY > 400) {
      nav.classList.add("fixed");
    } else {
      nav.classList.remove("fixed");
    }
    if (this.window.scrollY > slideshowHeight - headrHeight) {
      nav.classList.add("fixed");
      btt.style.display = "block";
    } else {
      nav.classList.remove("fixed");
      btt.style.display = "none";
    }
  });
} else {
  window.addEventListener("scroll", function () {
    if (this.window.scrollY > 400) {
      nav.classList.add("fixed");
    } else {
      nav.classList.remove("fixed");
    }
    if (this.window.scrollY > 500) {
      nav.classList.add("fixed");
      btt.style.display = "block";
    } else {
      nav.classList.remove("fixed");
      btt.style.display = "none";
    }
  });
}

// Back to top
function backToTop() {
  btt.addEventListener("click", function () {
    window.scrollTo(0, 0);
  });
}

backToTop();

// Fancybox
Fancybox.bind();

// Debouncing
function debounce(func, delay) {
  let timeout;
  return function (...args) {
    clearTimeout(timeout);
    timeout = setTimeout(() => func(...args), delay);
  };
}

const handleInput = debounce(function () {
  console.log("Funzione chiamata con debouncing");
}, 300);

document.querySelector("input").addEventListener("input", handleInput);
