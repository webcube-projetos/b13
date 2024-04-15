import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

function showLoading() {
  document.getElementById('loading').style.display = 'flex';
}

function hideLoading() {
  document.getElementById('loading').style.display = 'none';
}

function showErrorModal(message) {
  const errorMessageElement = document.querySelector('#errorModal .modal-content p');
  errorMessageElement.innerText = message;

  const modal = new bootstrap.Modal(document.getElementById('errorModal'));
  modal.show();
}

axios.interceptors.request.use(function (config) {
  if (config.data instanceof FormData) {
    config.headers['Content-Type'] = 'multipart/form-data';
  }
  showLoading();
  return config;
}, function (error) {
  return Promise.reject(error);
});

axios.interceptors.response.use(function (response) {
  hideLoading();
  return response;
}, function (error) {
  hideLoading();
  if (error.response) {
    showErrorModal(error.response.data.message || 'Erro desconhecido');
  } else if (error.request) {
    showErrorModal('Sem resposta do servidor');
  } else {
    showErrorModal('Erro ao enviar requisição');
  }
  return Promise.reject(error);
});

function paginacaoAjax(div, callback) {
  $(div).find('a.page-link').off().on('click', function () {
    let page = $(this).attr('href').replace('#', '');
    callback(page);
  });
}

/** PESQUISA CEP */
function limpa_formulario_cep() {
  let logradouro = document.getElementById('logradouro');
  let bairro = document.getElementById('bairro');
  let cidade = document.getElementById('cidade');
  let uf = document.getElementById('estado');
  logradouro.value = ("");
  logradouro.disabled = false;
  bairro.value = ("");
  bairro.disabled = false;
  cidade.value = ("");
  cidade.disabled = false;
  uf.value = ("");
  uf.disabled = false;
}

window.meu_callback = function (conteudo) {
  if (!("erro" in conteudo)) {
    let logradouro = document.getElementById('logradouro');
    let bairro = document.getElementById('bairro');
    let cidade = document.getElementById('cidade');
    let uf = document.getElementById('estado');
    logradouro.value = (conteudo.logradouro);
    logradouro.readOnly = true;
    bairro.value = (conteudo.bairro);
    bairro.readOnly = true;
    cidade.value = (conteudo.localidade);
    cidade.readOnly = true;
    uf.value = (conteudo.uf);
    uf.readOnly = true;
  }
  else {
    limpa_formulario_cep();
    alert("CEP não encontrado.");
  }
}

window.pesquisaCep = function (valor) {
  var cep = valor.replace(/\D/g, '');

  if (cep != "") {
    var validacep = /^[0-9]{8}$/;

    if (validacep.test(cep)) {
      document.getElementById('logradouro').value = "...";
      document.getElementById('bairro').value = "...";
      document.getElementById('cidade').value = "...";
      document.getElementById('estado').value = "...";

      var script = document.createElement('script');

      script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

      document.body.appendChild(script);
    }
    else {
      limpa_formulario_cep();
      alert("Formato de CEP inválido.");
    }
  } else {
    limpa_formulario_cep();
  }
};
/** FIM PESQUISA CEP */

var cpfMascara = function (val) {
  return val.replace(/\D/g, '').length > 11 ? '00.000.000/0000-00' : '000.000.000-009';
},
  cpfOptions = {
    onKeyPress: function (val, e, field, options) {
      field.mask(cpfMascara.apply({}, arguments), options);
    }
  };


$('#cpfcnpj').mask(cpfMascara, cpfOptions);

var telefoneMascara = function (val) {
  return val.replace(/\D/g, '').length > 10 ? '(00) 00000-0000' : '(00) 0000-00009';
};

var telefoneOptions = {
  onKeyPress: function (val, e, field, options) {
    field.mask(telefoneMascara(val), options);
  }
};

$('.phone').mask(telefoneMascara, telefoneOptions);
