window.editDoublePage = function (event) {
  var button = event.target.closest('button');

  handleEditForm(button);
}

function handleEditForm(element) {
  axios.post(element.dataset.route, {
    id: element.dataset.id

  })
    .then(response => {
      console.log(response.data)
      document.querySelector('#formRegister').innerHTML = response.data
      Livewire.restart()
      callSelectConfig()
    })
}