require('./bootstrap');

import Alert from './alert'

$(function () {

    var alert = new Alert('#notifications');

    $('.btn-vote').click(function (e) {
        e.preventDefault();

        var form = $('#form-vote');

        var button = $(this);
        var ticket = button.closest('.ticket');
        var id = ticket.data('id');

        var action = form.attr('action').replace(':id', id);

        $.post(action, form.serialize(), function (response) {
            button.toggleClass('hide');
            ticket.find('.btn-unvote').toggleClass('hide');
            var voteCount = ticket.find('.votes-count');
            var votos = parseInt(voteCount.text().split(' ')[0]);
            votos++;
            voteCount.text(votos == 1 ? '1 voto' : votos + ' votos');
            alert.success('¡Gracias por tu voto¡');
        }).fail(function (response) {
            alert.error('Ocurrió un error :(');
        });

    });
});
