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