function Cookies(APP_URL) {

    this.APP_URL = APP_URL;
    this.error = new ErrorResponser();

    this.set = function (cookies, callback) {
        var self = this;
        $.ajax({
            url: window.APP_URL + '/cookies',
            type: 'POST',
            data: cookies,
            dataType: 'json',
            success: function () {
                callback({status: 200});
            },
            error: function (data) {
                console.log(data);
                self.error.error(data.status, data.responseJSON);
            }
        });
    }

    this.get = function (name, callback) {
        var self = this;
        $.ajax({
            url: window.APP_URL + '/cookies/' + name,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                callback(data);
            },
            error: function (data) {
                self.error.error(data.status, data.responseJSON);
            }
        });
    }

    this.forget = function (callback) {
        var self = this;
        $.ajax({
            url: window.APP_URL + '/cookies/forget',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                callback(data);
            },
            error: function (data) {
                self.error.error(data.status, data.responseJSON);
            }
        });
    }
}