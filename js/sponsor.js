const officialSponsorSlidesNum = document.querySelectorAll(
  "#official_sponsor .swiper-slide"
).length;

if (officialSponsorSlidesNum > 1) {
  const swiper = new Swiper("#official_sponsor .swiper", {
    // Optional parameters
    direction: "horizontal",
    loop: true,
    speed: 5000,
    slidesPerView: 2,
    grabCursor: true,
    mousewheelControl: true,
    keyboardControl: true,
    spaceBetween: 40,
    autoplay: {
      delay: 1,
      disableOnInteraction: false,
      pauseOnMouseEnter: true,
    },

    // Responsive breakpoints
    breakpoints: {
      1025: {
        slidesPerView: 4,
        spaceBetween: 80,
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 60,
      },
    },
  });
}

const officialPartnersSlidesNum = document.querySelectorAll(
  "#official_partners .swiper-slide"
).length;

if (officialPartnersSlidesNum > 1) {
  const swiper = new Swiper("#official_partners .swiper", {
    // Optional parameters
    direction: "horizontal",
    loop: true,
    speed: 6000,
    slidesPerView: 3,
    grabCursor: true,
    mousewheelControl: true,
    keyboardControl: true,
    spaceBetween: 40,
    autoplay: {
      delay: 1,
      disableOnInteraction: false,
      pauseOnMouseEnter: true,
    },

    // Responsive breakpoints
    breakpoints: {
      1025: {
        slidesPerView: 5,
        spaceBetween: 60,
      },
      768: {
        slidesPerView: 4,
        spaceBetween: 50,
      },
    },
  });
}
