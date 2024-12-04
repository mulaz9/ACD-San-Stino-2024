"use strict";

function anchors() {
  allSections = document.querySelectorAll("section");

  const sectionsID = [];

  allSections.forEach((section) => sectionsID.push(section.id));

  function slideHTML() {
    let html = "";

    sectionsID.forEach((id) => {
      let name = "";

      if (id == "componenti_squadra") {
        name = id.replace("componenti_", "").toUpperCase();
      } else {
        name = id.replaceAll("_", " ").toUpperCase();
      }

      html += /*html*/ `<div class="swiper-slide"><a href="#${id}">${name}</a></div>`;
    });

    return html;
  }

  const anchorsWrapper = document.querySelector(
    "#anchors .swiper .swiper-wrapper"
  );

  anchorsWrapper.innerHTML = slideHTML();
}

anchors();

// Anchors carousel
const anchorsSlidesNum = document.querySelectorAll(
  "#anchors .swiper-slide"
).length;

const swiper = new Swiper("#anchors .swiper", {
  // Optional parameters
  direction: "horizontal",
  loop: true,
  speed: 600,
  slidesPerView: "auto",
  grabCursor: true,
  mousewheelControl: true,
  centerInsufficientSlides: true,
  keyboardControl: true,
  // spaceBetween: 40,
  loop: false,

  navigation: {
    nextEl: "#anchors .swiper-button-next",
    prevEl: "#anchors .swiper-button-prev",
  },

  // Responsive breakpoints
  // breakpoints: {
  //   1025: {
  //     slidesPerView: 6,
  //     spaceBetween: 40,
  //   },
  // },
});
