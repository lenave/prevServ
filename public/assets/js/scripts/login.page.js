$('#form_Login').submit(function (e) {
    e.preventDefault();


    var login = $('#txt_L_User');
    var password = $('#txt_L_Password');
    var isOK = true;
    var btn = $(this);

    if ($.trim(login.val()) == '') {
        isOK = false;
    }


    if ($.trim(password.val()) == '') {
        isOK = false;
    }

    if (isOK) {

        $('#alert_L_Error').fadeOut();

        var l = new Login();
        l.login($.trim(login.val()), $.trim(password.val()), function (response) {
            console.log(response);
            if (response.response != undefined && response.response.error != undefined && response.response.error.code != 200) {
                $('#alert_L_Error').text(response.response.error.error).fadeIn();
            } else {
                if (response.user != undefined && response.token != undefined) {

                    localStorage.setItem('app', response.user.app_id);
                    localStorage.setItem('user', response.user.user_id);
                    localStorage.setItem('token', response.token.access_token);

                    window.location.href = '/liberacoes';

                } else {
                    $('#alert_L_Error').text('Erro ao fazer login').fadeIn();
                }
            }
        }, btn);


    } else {
        $('#alert_L_Error').text('Preencha todos os campos').fadeIn();
    }



});