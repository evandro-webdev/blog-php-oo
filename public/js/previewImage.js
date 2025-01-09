const inputFile = document.querySelector('#input-file');

inputFile.addEventListener('change', event => {
  previewImage(event);

  displayFileName();
})

function previewImage(event) {
  const file = event.target.files[0]
  const preview = document.querySelector('#image-preview')

  if (file) {
    const reader = new FileReader()

    reader.onload = function (e) {
      preview.src = e.target.result
      preview.style.display = 'block'
    }

    reader.readAsDataURL(file)
  }
}

function displayFileName() {
  const fileName = document.querySelector('#file-name');

  if (inputFile.files.length > 0) {
    fileName.textContent = inputFile.files[0].name;
  } else {
    fileName.textContent = "Nenhum arquivo selecionado";
  }
}