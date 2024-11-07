document.addEventListener('DOMContentLoaded', function() {
  setTimeout(function() {
    var flashMessage = document.querySelector('.flash-message');
    if (flashMessage) {
      flashMessage.classList.add('hide');
    }
  }, 5000);
});