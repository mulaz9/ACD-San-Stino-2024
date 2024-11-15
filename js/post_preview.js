const slidesNum = document.querySelectorAll(
  "#post_preview .swiper-slide"
).length;

if (slidesNum > 1 && hasAutoplay) {
  const swiper = new Swiper("#post_preview .swiper", {
    // Optional parameters
    direction: "horizontal",
    loop: true,
    speed: 600,
    slidesPerView: 1,
    slidesPerGroup: 1,
    spaceBetween: 20,
    autoplay: {
      delay: 2000,
      disableOnInteraction: true,
      pauseOnMouseEnter: true,
    },

    // Responsive breakpoints
    breakpoints: {
      1025: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 2,
      },
    },

    // If we need pagination
    pagination: {
      el: "#post_preview .swiper-pagination",
      clickable: true,
    },

    // Navigation arrows
    navigation: {
      nextEl: "#post_preview .swiper-button-next",
      prevEl: "#post_preview .swiper-button-prev",
    },
  });
} else if (slidesCount > 1 && !hasAutoplay) {
  const swiper = new Swiper("#post_preview .swiper", {
    // Optional parameters
    direction: "horizontal",
    loop: true,
    speed: 600,
    slidesPerView: 3,
    slidesPerGroup: 1,
    spaceBetween: 20,

    // If we need pagination
    pagination: {
      el: "#post_preview .swiper-pagination",
      clickable: true,
    },

    // Navigation arrows
    navigation: {
      nextEl: "#post_preview .swiper-button-next",
      prevEl: "#post_preview .swiper-button-prev",
    },
  });
}
