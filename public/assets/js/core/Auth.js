function Auth(API_URL) {

    this.API_URL = API_URL;
    this.error = new ErrorResponser();

    this.login = function (login, password, callback, btn) {
        var self = this;

        $.ajax({
            url: self.API_URL + '/auth/login/operator',
            type: 'POST',
            beforeSend: function() {
                btn.button('loading');
            },
            data: {
                login: login,
                password: password,
                AppID: window.AppID
            },
            dataType: 'json',
            success: function (data) {
                callback({status: 200, data: data});
            },
            error: function (data) {
                console.log(data);
                self.error.error(data.status, data.responseJSON.error);
            },
            complete: function () {
                btn.button('reset');
            }
        });
    }

    this.logout = function () {
        var cookie = new Cookies(window.APP_URL);
        cookie.forget(function (_response) {
            if (_response.status == 200) {
                localStorage.clear();

                window.location.href = '/login';
            }
        });
    }
}