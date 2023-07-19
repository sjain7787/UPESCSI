const config = {
  autoload: true,
  itemsToBeVisible: 3,
  speed: 5000
};

function start() {
  window.onload = function () {
      setSlidersStyle(config);

      const prevSlideButton = document.getElementById("prev-slide");
      const nextSlideButton = document.getElementById("next-slide");

      prevSlideButton.addEventListener("click", () => {
          navigate("backward", config);
      });

      nextSlideButton.addEventListener("click", () => {
          navigate("forward", config);
      });

      if (config.autoload) {
          playCarousel(nextSlideButton, config);
      }
  };
}

function setSlidersStyle(config) {
  document.querySelector(
      "style"
  ).textContent += `@media screen and (min-width:1440px) { .carousel__slide{ min-width: ${100 / config.itemsToBeVisible
      }% } }`;
}

function navigate(position, config) {
  const carouselEl = document.getElementById("carousel");
  const slideContainerEl = carouselEl.querySelectorAll(".carousel__container");
  const slideEl = carouselEl.querySelectorAll(".carousel__slide");
  let slideWidth = slideEl.offsetWidth;
  slideContainerEl.scrollLeft = this.getNewScrollPosition(
      position,
      slideContainerEl,
      slideWidth,
      config
  );
}

function getNewScrollPosition(position, slideContainerEl, slideWidth, config) {
  const maxScrollLeft =
      slideContainerEl.scrollWidth - slideWidth * config.itemsToBeVisible;
  if (position === "forward") {
      const x = slideContainerEl.scrollLeft + slideWidth;
      return x <= maxScrollLeft ? x : 0;
  } else {
      const x = slideContainerEl.scrollLeft - slideWidth;
      return x >= 0 ? x : maxScrollLeft;
  }
}

function playCarousel(nextButton, config) {
  const play = () => {
      nextButton.click();
      setTimeout(play, config.speed);
  };
  play();
}

start();