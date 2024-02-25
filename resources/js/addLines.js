//Função para deletar as linhas
function deletarLine(element) {
    var linha = $(element).closest('.linha-add');

    linha.remove();
}

$(document).ready(function () {
    //Adicionando linha a box de contato
    $('#addLinhaContato').on('click', function () {
        let url =  window.location.href.split('/')[1] + '/row-contact';
        $.ajax({
            url: url,
            type: 'GET',
            success: function (data) {
                $('#box-linhas-contato').append(data);

                $('#box-linhas-contato .row:last-child input').val('');
            },
            error: function () {
                alert('Erro ao carregar a linha de contato.');
            }
        });
    });

    //Adicionando linha a box de adicionais
    $('#addLinhaAdicionais').on('click', function () {
        let url =  window.location.href.split('/')[1] + '/row-adicional';
        $.ajax({
            url: url,
            type: 'GET',
            success: function (data) {
                $('#box-linhas-adicional').append(data);

                $('#box-linhas-adicional .row:last-child input').val('');
            },
            error: function () {
                alert('Erro ao carregar a linha de adicional.');
            }
        });
    });

    //Adicionando linha a box de especializações
    $('#addLinhaEspecializacao').on('click', function () {
        let url =  window.location.href.split('/')[1] + '/row-especializacao';
        $.ajax({
            url: url,
            type: 'GET',
            success: function (data) {
                $('#box-linhas-especializacao').append(data);

                $('#box-linhas-especializacao .row:last-child input').val('');
            },
            error: function () {
                alert('Erro ao carregar a linha de especialização.');
            }
        });
    });

    $('#addLinhaServico').on('click', function () {
        let url =  window.location.href.split('/')[1] + '/row-servico';
        $.ajax({
            url: url,
            type: 'GET',
            success: function (data) {
                $('#box-linhas-servico').append(data);

                $('#box-linhas-servico .row:last-child input').val('');
            },
            error: function () {
                alert('Erro ao carregar a linha de serviço.');
            }
        });
    });

    $('#addLinhaEntrada').on('click', function () {
        let url =  window.location.href.split('/')[1] + '/row-entrada';
        $.ajax({
            url: url,
            type: 'GET',
            success: function (data) {
                $('#box-linhas-entrada').append(data);

                $('#box-linhas-entrada .row:last-child input').val('');
            },
            error: function () {
                alert('Erro ao carregar a linha de serviço.');
            }
        });
    });

    $('#addLinhaSaida').on('click', function () {
        let url =  window.location.href.split('/')[1] + '/row-saida';
        $.ajax({
            url: url,
            type: 'GET',
            success: function (data) {
                $('#box-linhas-saida').append(data);

                $('#box-linhas-saida .row:last-child input').val('');
            },
            error: function () {
                alert('Erro ao carregar a linha de serviço.');
            }
        });
    });

    $(document).on('click', '.deletarLinha', function () {
        // Encontrar a linha mais próxima e removê-la
        var linha = $(this).closest('.linha-add');
        linha.remove();
    });
});