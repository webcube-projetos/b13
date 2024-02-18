function paginacaoAjax(div, callback) {
  $(div).find('a.page-link').off().on('click', function () {
    let page = $(this).attr('href').replace('#', '');
    callback(page);
  });
}