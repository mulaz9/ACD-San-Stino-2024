const slidesCount = document.querySelectorAll(
  "#main_slideshow .swiper-slide"
).length;

if (slidesCount > 1) {
  const swiper = new Swiper("#main_slideshow .swiper", {
    // Optional parameters
    direction: "horizontal",
    loop: true,
    speed: 600,

    // If we need pagination
    pagination: {
      el: "#main_slideshow .swiper-pagination",
      clickable: true,
    },

    // Navigation arrows
    navigation: {
      nextEl: "#main_slideshow .swiper-button-next",
      prevEl: "#main_slideshow .swiper-button-prev",
    },
  });
}
