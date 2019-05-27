(function ($) {


    /*
     * Plugin que verifica a validade
     * Neste plugin passamos um parametro
     * que pode ser um timestamp ou uma data yyy-mm-dd
    */
    $.extend({
        isExpired: function (d) {
            var n = new Date();
            d = new Date(d);

            if (n.getTime() > d.getTime()) {
                return false;
            } else {
                return true;
            }
        },

        alertMessage: function (t,m) {
            if (t === 'success') {
                $('.alert-message').fadeIn().removeClass('alert-danger alert-warning alert-success alert-info')
                    .addClass('alert-success')
                    .find('.alert-text').text(m);
            } else if (t === 'warning') {
                $('.alert-message').fadeIn().removeClass('alert-danger alert-warning alert-success alert-info')
                    .addClass('alert-warning')
                    .find('.alert-text').text(m);
            } else if (t === 'info') {
                $('.alert-message').fadeIn().removeClass('alert-danger alert-warning alert-success alert-info')
                    .addClass('alert-info')
                    .find('.alert-text').text(m);
            } else if (t === 'danger') {
                $('.alert-message').fadeIn().removeClass('alert-danger alert-warning alert-success alert-info')
                    .addClass('alert-danger')
                    .find('.alert-text').text(m);
            }
        }
    });

    Number.prototype.formatMoney = function (c, d, t) {
        var n = this,
            c = isNaN(c = Math.abs(c)) ? 2 : c,
            d = d == undefined ? "." : d,
            t = t == undefined ? "," : t,
            s = n < 0 ? "-" : "",
            i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
            j = (j = i.length) > 3 ? j % 3 : 0;
        return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
    };


    Date.prototype.setFullDate = function(t) {
        var n = this,
            d = n.getDate() < 10 ? '0' + n.getDate() : n.getDate(),
            m = (n.getMonth() + 1) < 10 ? '0' + (n.getMonth() + 1) : (n.getMonth() + 1),
            y = n.getFullYear(),
            i = n.getMinutes() < 10 ? '0' + n.getMinutes() : n.getMinutes(),
            h = n.getHours() < 10 ? '0' + n.getHours() : n.getHours();

        return t === 'full' ? d + '/' + m + '/' + y + ' ' + h + ':' + i : d + '/' + m + '/' + y;
    };

    String.prototype.replaceAll = function(search, replacement) {
        var target = this;
        return target.split(search).join(replacement)
    };

    String.prototype.formatCPF = function() {
        var cpf = this;
        if (cpf.length == 11) {
            var cpf_;
            cpf_ = cpf.substring(0,3) + '.' + cpf.substring(3,6) + '.' + cpf.substring(6,9) + '-' + cpf.substring(9,11);

            return cpf_;
        } else {
            return cpf;
        }
    };

}(jQuery));


/*
 * Functions
 */
function monthDiff(d1, d2) {
    var months;
    months = (d2.getFullYear() - d1.getFullYear()) * 12;
    months -= d1.getMonth() + 1;
    months += d2.getMonth();
    return months <= 0 ? 0 : months;
}