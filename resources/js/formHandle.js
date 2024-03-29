document.querySelector('#formRegister') && document.querySelector('#formRegister').addEventListener('submit', function (event) {
  event.preventDefault();
  handleSubmitForm(event);
})

document.querySelector('#formRegisterEdit') && document.querySelector('#formRegisterEdit').addEventListener('submit', function (event) {
  event.preventDefault();
  handleSubmitFormEdit(event);
})

document.querySelector('#formDadosBancarios') && document.querySelector('#formDadosBancarios').addEventListener('submit', function (event) {
  event.preventDefault();
  handleSubmitFormEdit(event);
})


function handleSubmitForm(event) {
  event.preventDefault();

  const form = event.target;
  const formData = new FormData(form);
  const method = form.method;

  axios({
    method: method,
    url: form.action,
    data: formData
  })
    .then(response => {
      callForm(response.data)
      callList(response.data)
      Toastify({
        text: "Cadastro realizado com sucesso!",
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

function handleSubmitFormEdit(event) {
  event.preventDefault();

  const form = event.target;
  const formData = new FormData(form);
  const method = form.method;

  axios({
    method: method,
    url: form.action,
    data: formData
  })
    .then(response => {
      window.location.href = response.data.route;
    })
}

function callForm(response) {
  axios({
    method: 'get',
    url: response + '/form',
  })
    .then(response => {
      document.querySelector('#formRegister').innerHTML = response.data
      Livewire.restart()
      callSelectConfig()
    })
}

function callList(response) {
  axios({
    method: 'get',
    url: response + '/list',
  })
    .then(response => {
      document.querySelector('#tableList').innerHTML = response.data
    })
}