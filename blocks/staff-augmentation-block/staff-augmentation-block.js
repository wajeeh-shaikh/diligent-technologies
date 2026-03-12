var swiper = new Swiper(".staff-augmentation-slider", {
    pagination: {
      el: ".swiper-pagination.staff-augmentation-pagination",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + (index + 1) + "</span>";
      },
    },
    navigation: {
      nextEl: ".swiper-button-next.staff-augmentation-nav",
      prevEl: ".swiper-button-prev.staff-augmentation-nav",
    },
    loop: true,
    autoplay: true,
    speed: 1200,
    delay: 5000,
    pauseOnMouseEnter: true
});

// Function to initialize GSAP
function initGSAP() {
  const container = document.querySelector(".staff-augmentation-slides");
  const sections = gsap.utils.toArray(".slide-section");
  const mask = document.querySelector(".mask");

  // Check if screen width is above 520px
  if (window.innerWidth > 520) {
    gsap.to(sections, {
      xPercent: -100 * (sections.length - 1),
      ease: "none",
      scrollTrigger: {
        trigger: ".staff-augmentation-svg",
        pin: true,
        start: "-20px",
        scrub: 0.5,
        end: "+=3000",
        markers: false,
        onUpdate: (self) => {
          gsap.set(mask, {
            width: self.progress * 100 + "%",
          });
        },
      },
    });
  }
}

initGSAP();

window.addEventListener("resize", () => {
  ScrollTrigger.getAll().forEach((trigger) => trigger.kill()); // Kill all existing ScrollTriggers
  initGSAP(); // Reinitialize GSAP based on new screen size
});

// last
