function Panic(token) {

    this.token = token;
    this.error = new ErrorResponser();

    this.show = function(ticket, callback) {
        var self = this;

        // Call ajax that do the login
        $.ajax({
            url: window.API_URL + '/panic/localization/' + ticket,
            type: 'GET',
            dataType: 'json',
            beforeSend: function(request) {
                request.setRequestHeader("Authorization", self.token);
                //$('body').append('<div class="overlay"></div>');
            },
            success: function(data) {
                callback(data);
            },
            error: function(data) {
                console.log(data);
                self.error.error(data.status, data.responseJSON.error);
            },
            complete: function() {
                //$('body .overlay').remove();
            }
        });
    }
}