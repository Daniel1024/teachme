require('./bootstrap');

import Alert from './alert';
import VoteForm from './VoteForm';

$(function () {

    var alert = new Alert('#notifications');

    $('.btn-vote').click(function (e) {
        e.preventDefault();
        var voteForm = new VoteForm($('#form-vote'), $(this), '.btn-unvote');
        voteForm.submit(function (response) {
            if (response.success) {
                voteForm.updateCount(voteForm.getVotes() + 1);
                alert.success('¡Gracias por tu voto¡');
            }
        });
    });

    $('.btn-unvote').click(function (e) {
        e.preventDefault();
        var voteForm = new VoteForm($('#form-unvote'), $(this), '.btn-vote');
        voteForm.submit(function (response) {
            if (response.success) {
                voteForm.updateCount(voteForm.getVotes() - 1);
                alert.info('Voto eliminado');
            }
        });
    });

});
