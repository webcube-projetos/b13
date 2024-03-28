console.log('formHandle')
document.querySelector('#formRegister').addEventListener('submit', function (event) {
  event.preventDefault();
  handleSubmitForm(event);
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