
function Condominium() {

    this.index = function(app, callback, token) {
        var self = this;

        // Call ajax that do the login
        $.ajax({
            url: window.API_URL + '/condominiums/' + app,
            type: 'GET',
            dataType: 'json',
            beforeSend: function(request) {
                request.setRequestHeader("Authorization", token);
                //$('body').append('<div class="overlay"></div>');
            },
            success: function(data) {
                callback(data);
            },
            error: function(dataError) {
                console.log(dataError);
                var response = {
                    'status': dataError.status,
                    'response': dataError.responseJSON
                };

                callback(response);
            },
            complete: function() {
                //$('body .overlay').remove();
            }
        });
    }
}