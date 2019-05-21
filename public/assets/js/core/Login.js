

function Login() {

    this.login = function(login, password, callback, btn) {
        var self = this;

        // Call ajax that do the login
        $.ajax({
            url: window.API_URL + '/auth/login/operator',
            type: 'POST',
            data: {
                login: login,
                password: password,
                AppID: window.AppID
            },
            crossDomain: true,
            beforeSend: function() {
                btn.button('loading');
                $('body').append('<div class="overlay"></div>');
            },
            dataType: 'json',
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
                btn.button('reset');
                $('body .overlay').remove();
            }
        });
    }

}
