function openModal(modalId) {
  const modal = document.getElementById(modalId);
  if (modal) modal.style.display = "flex";
}

function closeModal(modalId) {
  const modal = document.getElementById(modalId);
  if (modal) modal.style.display = "none";
}

document.querySelectorAll(".open-modal").forEach(button => {
  button.addEventListener("click", function () {
    const modalId = this.getAttribute("data-modal");
    const postId = this.getAttribute("data-post-id");
    openModal(modalId);

    const form = document.getElementById("delete-post-form");
    form.action = "/admin/posts/delete/" + postId;
  });
});

document.querySelectorAll(".close-modal").forEach(button => {
  button.addEventListener("click", function () {
    const modalId = this.getAttribute("data-modal");
    closeModal(modalId);
  });
});

window.addEventListener("click", function (event) {
  document.querySelectorAll(".modal").forEach(modal => {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  });
});
