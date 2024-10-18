let currentSlide = 0;

function showSlide(slideIndex) {
  const slides = document.getElementsByClassName("slide");

  if (slideIndex >= slides.length) {
    currentSlide = 0;
  } else if (slideIndex < 0) {
    currentSlide = slides.length - 1;
  }

  for (let i = 0; i < slides.length; i++) {
    slides[i].classList.remove("active");
  }

  slides[currentSlide].classList.add("active");
}

function moveSlides(step) {
  currentSlide += step;
  showSlide(currentSlide);
}

// Inicializa o primeiro slide
showSlide(currentSlide);
