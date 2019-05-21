$(function () {
    var release = new Release();

    release.index('1', function (response) {
        console.log(response);
    }, localStorage.getItem('token'));

    release.show('Yw9sIUdYu23TSfi9hdt5vwVOCvgZoN7j', function (response) {
        console.log(response);
    }, localStorage.getItem('token'));


    var con = new Condominium();
    con.index(localStorage.getItem('app'), function (response) {
        console.log(response);
    }, localStorage.getItem('token'));
});