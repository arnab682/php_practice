/***************************************************
==================== JS INDEX ======================
****************************************************/

(function ($) {
  "use strict";

  var windowOn = $(window);
  ////////////////////////////////////////////////////
  // ============= PreLoader Js ============= //
  windowOn.on("load", function () {
    $(".preloader").fadeOut(500);
  });

  // ============= Mobile Menu Js =============
  $("#mobile-menu").meanmenu({
    meanMenuContainer: ".mobile-menu",
    meanScreenWidth: "991",
    meanExpand: ['<i class="fal fa-plus"></i>'],
  });

  // ============= Mobile Menu 2 =============
  $("#mobile-menu-2").meanmenu({
    meanMenuContainer: ".mobile-menu-2",
    meanScreenWidth: "1199",
    meanExpand: ['<i class="fal fa-plus"></i>'],
  });

  // ============= Sidebar Js  =============
  $(".sidebar-toggle-btn").on("click", function () {
    $(".mobile-sidebar-area").addClass("sidebar-opened");
    $(".body-overlay").addClass("opened");
  });
  $(".sidebar__close-btn").on("click", function () {
    $(".mobile-sidebar-area").removeClass("sidebar-opened");
    $(".body-overlay").removeClass("opened");
  });

  // ============= Body overlay Js =============
  $(".body-overlay").on("click", function () {
    $(".mobile-sidebar-area").removeClass("sidebar-opened");
    $(".body-overlay").removeClass("opened");
  });

  // =============  Search Js ============= //
  $(".search-toggle").on("click", function () {
    $(".search__area").addClass("opened");
  });
  $(".search-close-btn").on("click", function () {
    $(".search__area").removeClass("opened");
  });

  // ============= Sticky Header Js =============
  windowOn.on("scroll", function () {
    var scroll = $(window).scrollTop();
    if (scroll < 100) {
      $("#header-sticky").removeClass("header__sticky");
    } else {
      $("#header-sticky").addClass("header__sticky");
    }
  });

  // =============  Data CSS Js =============
  $("[data-background").each(function () {
    $(this).css(
      "background-image",
      "url( " + $(this).attr("data-background") + "  )"
    );
  });

  $("[data-width]").each(function () {
    $(this).css("width", $(this).attr("data-width"));
  });

  $("[data-bg-color]").each(function () {
    $(this).css("background-color", $(this).attr("data-bg-color"));
  });

  // =============  Nice Select Js =============
  $("select").niceSelect();

  // ============= Hero  Slider Js =============
  if (jQuery(".hero-slider-nav").length > 0) {
    var heroSliderNav = new Swiper(".hero-slider-nav", {
      spaceBetween: 0,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesProgress: true,

      breakpoints: {
        550: {
          slidesPerView: 2,
        },
        768: {
          slidesPerView: 3,
        },
        1200: {
          slidesPerView: 4,
        },
        1400: {
          slidesPerView: 4,
        },
      },
    });
  }

  if (jQuery(".hero-slider").length > 0) {
    var heroSlider = new Swiper(".hero-slider", {
      spaceBetween: 0,
      effect: "fade",
      loop: true,
      autoplay: {
        delay: 6000,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      thumbs: {
        swiper: heroSliderNav,
      },
    });
  }

  if (jQuery(".hero-slider-two").length > 0) {
    var heroSliderTwo = new Swiper(".hero-slider-two", {
      spaceBetween: 0,
      effect: "fade",
      loop: true,

      autoplay: {
        delay: 6000,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".hero-slider-two-pagination",
        type: "bullets",
        clickable: true,
      },
      breakpoints: {
        0: {
          pagination: false,
        },
        500: {
          pagination: false,
        },
        768: {
          pagination: false,
        },
      },
    });
  }

  if (jQuery(".hero-slider-three").length > 0) {
    var heroSliderThree = new Swiper(".hero-slider-three", {
      spaceBetween: 0,
      effect: "fade",
      loop: true,

      autoplay: {
        delay: 6000,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".hero-slider-three-pagination",
        type: "bullets",
        clickable: true,
      },
    });
  }

  // ============= Team Slider Js =============

  if (jQuery(".team-version-one").length > 0) {
    var TeamVersionOne = new Swiper(".team-version-one", {
      slidesPerView: 4,
      spaceBetween: 0,
      slidesPerGroup: 2,
      loop: true,
      speed: 1000,
      autoplay: {
        delay: 6000,
      },
      pagination: {
        el: ".team-version-one-pagination",
        type: "bullets",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
          pagination: false,
          spaceBetween: 20,
          slidesPerGroup: 1,
        },
        500: {
          slidesPerView: 1,
          pagination: false,
          spaceBetween: 20,
          slidesPerGroup: 1,
        },
        768: {
          slidesPerView: 2,
        },
        992: {
          slidesPerView: 3,
        },
        1200: {
          slidesPerView: 4,
        },
        1400: {
          slidesPerView: 4,
        },
      },
    });
  }

  if (jQuery(".team-version-two").length > 0) {
    var TeamVersionTwo = new Swiper(".team-version-two", {
      slidesPerView: 4,
      spaceBetween: 0,
      slidesPerGroup: 2,
      speed: 1000,
      loop: true,

      autoplay: {
        delay: 6000,
      },
      pagination: {
        el: ".team-version-two-pagination",
        type: "bullets",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
          slidesPerGroup: 1,
        },
        500: {
          slidesPerView: 1,
          slidesPerGroup: 1,
        },
        768: {
          slidesPerView: 2,
          slidesPerGroup: 2,
        },
        992: {
          slidesPerView: 3,
          slidesPerGroup: 2,
        },
        1200: {
          slidesPerView: 4,
          slidesPerGroup: 2,
        },
        1400: {
          slidesPerView: 4,
          slidesPerGroup: 2,
        },
      },
    });
  }

  if (jQuery(".team-version-three").length > 0) {
    var TeamVersionThree = new Swiper(".team-version-three", {
      slidesPerView: 4,
      spaceBetween: 0,
      slidesPerGroup: 2,
      speed: 1000,
      loop: true,

      autoplay: {
        delay: 6000,
      },
      pagination: {
        el: ".team-version-three-pagination",
        type: "bullets",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
          slidesPerGroup: 1,
        },
        500: {
          slidesPerView: 2,
          slidesPerGroup: 2,
        },
        768: {
          slidesPerView: 2,
          slidesPerGroup: 2,
        },
        992: {
          slidesPerView: 3,
          slidesPerGroup: 2,
        },
        1200: {
          slidesPerView: 4,
          slidesPerGroup: 2,
        },
        1400: {
          slidesPerView: 4,
          slidesPerGroup: 2,
        },
      },
    });
  }

  // ============= Service Slider Js =============

  if (jQuery(".serviceList-version-two").length > 0) {
    var ServiceListVersionTwo = new Swiper(".serviceList-version-two", {
      slidesPerView: 4,
      slidesPerGroup: 2,
      spaceBetween: 30,
      loop: true,
      speed: 1000,
      autoplay: {
        delay: 6000,
      },
      pagination: {
        el: ".serviceList-section-version-two-pagination",
        type: "bullets",
        clickable: true,
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
          slidesPerGroup: 1,
        },
        500: {
          slidesPerView: 1,
          slidesPerGroup: 1,
        },
        768: {
          slidesPerView: 2,
        },
        992: {
          slidesPerView: 3,
          slidesPerGroup: 2,
        },
        1200: {
          slidesPerView: 3,
          slidesPerGroup: 2,
        },
        1400: {
          slidesPerView: 3,
          slidesPerGroup: 2,
        },
      },
    });
  }

  // ============= Hip Slider Js =============

  if (jQuery(".hip-slider-one").length > 0) {
    var HipSliderOne = new Swiper(".hip-slider-one", {
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,
      speed: 1000,
      autoplay: {
        delay: 6000,
      },
      pagination: {
        el: ".hip-slider-pagination",
        type: "bullets",
        clickable: true,
      },
    });
  }

  // =========== Client-Review  Start =========== Js //

  // Client-review-version-one-slider
  if (jQuery(".review-version-one").length > 0) {
    var ReviewVersionOne = new Swiper(".review-version-one", {
      slidesPerView: 3,
      spaceBetween: 45,
      slidesPerGroup: 2,
      loop: true,
      speed: 2000,
      autoplay: {
        delay: 6000,
      },
      pagination: {
        el: ".review-version-one-pagination",
        type: "bullets",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
          pagination: false,
          slidesPerGroup: 1,
        },
        500: {
          slidesPerView: 1,
          pagination: false,
          slidesPerGroup: 1,
        },
        768: {
          slidesPerView: 2,
        },
        992: {
          slidesPerView: 3,
        },
        1200: {
          slidesPerView: 3,
        },
        1400: {
          slidesPerView: 3,
        },
      },
    });
  }

  // Client-review-version-two-slider
  if (jQuery(".review-version-two").length > 0) {
    var ReviewVersionTwo = new Swiper(".review-version-two", {
      slidesPerView: 3,
      spaceBetween: 0,
      loop: true,
      speed: 1000,
      autoplay: {
        delay: 6000,
      },
      pagination: {
        el: ".review-version-two-pagination",
        type: "bullets",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
          slidesPerGroup: 1,
        },
        500: {
          slidesPerView: 1,
          slidesPerGroup: 1,
        },
        768: {
          slidesPerView: 2,
        },
        992: {
          slidesPerView: 3,
        },
        1200: {
          slidesPerView: 3,
        },
        1400: {
          slidesPerView: 3,
        },
      },
    });
  }

  // Client-review-version-three

  $(".reviewHold").imagesLoaded(function () {
    var $reviewHold = $(".review-version-three").isotope({
      // options
      filter: $(".pro1"),
    });
    // filter items on button click
    $(".review-filter").on("click", ".img-file", function () {
      var filterValue = $(this).attr("data-filter");
      $reviewHold.isotope({ filter: filterValue });
    });

    //for menu active class
    $(".review-filter .img-file").on("click", function (event) {
      $(".active").removeClass("active");
      $(this).addClass(" active");
      event.preventDefault();
    });
  });

  // =========== Client-Review Slider End =========== Js //

  // =========== Blog Slider Start =========== Js //

  if (jQuery(".blog-version-three").length > 0) {
    var BlogSliderOne = new Swiper(".blog-version-three", {
      slidesPerView: 3,
      spaceBetween: 0,
      slidesPerGroup: 2,
      speed: 1000,
      loop: true,

      autoplay: {
        delay: 6000,
      },
      pagination: {
        el: ".blog-version-three-pagination",
        type: "bullets",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
          slidesPerGroup: 1,
        },
        500: {
          slidesPerView: 1,
          slidesPerGroup: 1,
        },
        768: {
          slidesPerView: 2,
        },
        992: {
          slidesPerView: 3,
          slidesPerGroup: 2,
        },
        1200: {
          slidesPerView: 3,
          slidesPerGroup: 2,
        },
        1400: {
          slidesPerView: 3,
          slidesPerGroup: 2,
        },
      },
    });
  }

  // =========== Blog Slider End =========== Js //

  // =========== Marquee Slider=========== //
  // Top Header
  $("#topHeader").scrollbox();
  // Top Header
  $("#clientBrand").scrollbox();

  // =================== Jquery Tabs Start =================== //

  $(".tabs-inner").jQueryTab({
    activeClass: "active",
    responsive: true,
    collapsible: true,
  });

  // =================== Jquery Tabs End =================== //

  /* ================ magnificPopup img view ====================*/
  $(".popup-image").magnificPopup({
    type: "image",
    gallery: {
      enabled: true,
    },
  });

  /* ================ magnificPopup video view ================*/
  $(".popup-video").magnificPopup({
    type: "iframe",
  });

  // ================ Wow Js ================ //
  new WOW().init();

  // ============= Counter Js =============
  $(".counter").counterUp({
    delay: 10,
    time: 1000,
  });

  // =====================  Project Js Start ==================== //

  // project-version-one
  $(".projectHold").imagesLoaded(function () {
    var $projectHold = $(".project-version-one").isotope({
      // options
    });
    // filter items on button click
    $(".project-filter").on("click", "button", function () {
      var filterValue = $(this).attr("data-filter");
      $projectHold.isotope({ filter: filterValue });
    });

    //for menu active class
    $(".project-filter button").on("click", function (event) {
      $(this).siblings(".active").removeClass("active");
      $(this).addClass("active");
      event.preventDefault();
    });
  });

  // project-version-two

  $(".projectHoldTwo").imagesLoaded(function () {
    var $projectHoldTwo = $(".project-version-two").isotope({
      // options
    });
    // filter items on button click
    $(".project-filter").on("click", "button", function () {
      var filterValue = $(this).attr("data-filter");
      $projectHoldTwo.isotope({ filter: filterValue });
    });

    //for menu active class
    $(".project-filter button").on("click", function (event) {
      $(this).siblings(".active").removeClass("active");
      $(this).addClass("active");
      event.preventDefault();
    });
  });

  // ===================== 15. Project Js End ==================== //
})(jQuery);
