window.editDoublePage = function (event) {
  var button = event.target.closest('button');

  handleEditForm(button);
}

window.deletar = function (event) {
  var button = event.target.closest('button');

  handleDelete(button);
}

function handleEditForm(element) {
  axios.post(element.dataset.route, {
    id: element.dataset.id

  })
    .then(response => {
      document.querySelector('#formRegister').innerHTML = response.data
    })
}

function handleDelete(element) {
  axios.post(element.dataset.route, {
    id: element.dataset.id

  })
    .then(response => {
      document.querySelector('#tableList').innerHTML = response.data

      Toastify({
        text: "Item removido com sucesso!",
        className: "info",
        close: true,
        gravity: "bottom",
        position: "right",
        style: {
          background: "#FF9921",
        }
      }).showToast();
    })
}