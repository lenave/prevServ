function ErrorResponser() {
    this.error = function (status, message) {
        if (message != null && message != undefined) {
            $('.alert-message').fadeIn().removeClass('alert-danger alert-warning alert-success alert-info')
                .addClass('alert-danger')
                .find('.alert-text').text(message.error);
        } else {
            $('.alert-message').fadeIn().removeClass('alert-danger alert-warning alert-success alert-info')
                .addClass('alert-danger')
                .find('.alert-text').text('Um erro inexperado aconteceu. Dica: Faça login novamente');
        }
    }
}