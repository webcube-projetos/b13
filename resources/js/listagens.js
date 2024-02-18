function ativarPaginacao() {
  $('.pagination a.page-link').off();
  $('.pagination a.page-link').on('click', function () {
    let pagina = $(this).attr('href').replace('#', '');
    let ativo = $('nav.paginacao li.page-item.active a.page-link').attr('href').replace('#', '');

    if (pagina != ativo) {
      pesquisar(pagina);
    }
  });

}
//Melhorar a url, talvez passando a rota no blade
function pesquisar(page = 1) {
  $.ajax({
    url: window.location.href.split('#')[0] + '/listar',
    type: 'GET',
    data: {
      'page': page
    },
    success: function (data) {
      $('#tableList').html(data);
      ativarPaginacao();
    },
  })
}

$(document).ready(function () {
  ativarPaginacao();
})