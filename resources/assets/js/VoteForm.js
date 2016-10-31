export default function VoteForm(form, button, buttonRevert) {

    var ticket = button.closest('.ticket');
    var id = ticket.data('id');
    var action = form.attr('action').replace(':id', id);
    var voteCount = ticket.find('.votes-count');

    buttonRevert = ticket.find(buttonRevert);

    this.getVotes = function () {
        return parseInt(voteCount.text().split(' ')[0]);
    };

    this.updateCount = function (votes) {
        voteCount.text(votes == 1 ? '1 voto' : votes + ' votos');
    };

    this.submit = function (success) {
        $.post(action, form.serialize(), function (response) {
            button.toggleClass('hide');
            buttonRevert.toggleClass('hide');
            success(response);
        }).fail(function () {
            alert.error('Ocurrió un error :(');
        });
    };

}
