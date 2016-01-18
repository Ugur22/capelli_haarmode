/**
 * Created by ugur on 30-11-15.
 */
$(document).ready(function () {
    $('.submit input').on('click', validate);
    var options = [{
        selector: '#holder',
        offset: 50,
        callback: 'Materialize.showStaggeredList("#holder")'
    }, {selector: '#holder_product', offset: 70, callback: 'Materialize.fadeInImage("#holder_product")'}];
    Materialize.scrollFire(options);
    console.log(options);

    $('.timepicker').pickatime({
        format: 'HH:i',
        min: [9, 0],
        max: [17, 30]
    });
    $('.parallax').parallax();

    $('.map').click(function () {
        $('.map iframe').css("pointer-events", "auto");
    });
    $('.map').mouseleave(function () {
        $('.map iframe').css("pointer-events", "none");
    });
    var d = new Date();
    var minutes = d.getMinutes();
    if (minutes > 30) {
        minutes = 00;
    } else {
        minutes = 30;
    }
    var now = d.getHours() + ":" + minutes;
    var begintijd = "9:00";
    var eindtijd = "17:30";
    var middennacht = "24:00";
    var strDate = d.getFullYear() + "," + (d.getMonth() + 1) + "/" + d.getDate();
    var newDate = strDate.toString("DD-MM-YYYY");
    if (now > middennacht || now < begintijd) {
        now = begintijd;
    }
    console.log(now);
    $('.datepicker').pickadate({
        datepicker: true,
        min: new Date(newDate),
        disable: [
            1, 2
        ]
    })
    $(".datepicker").change(function () {
        var date = $(".datepicker").val();
        var formatDate = new Date(date);
        var tijd = begintijd;
        if (Date.parse(newDate) < Date.parse(date)) {
            tijd = begintijd;
            //console.log(tijd);
        } else {
            tijd = now;
            //console.log(tijd);
        }
        if (formatDate.getDay() == 6) {
            eindtijd = "15:30";
        } else {
            eindtijd = "17:30";
        }
        var target = $('.timepicker').parent();
        var timepicker = '<input type="text" id="begintijd" name="begintijd" class="timepicker" placeholder="klik hier om een tijd te kiezen">';
        $('.timepicker').remove();
        target.append(timepicker);
        $('.timepicker').pickatime({
            format: 'HH:i',
            min: tijd,
            max: eindtijd
        });
    });
    $(".button-collapse").sideNav();
});
function validate(e) {
    e.preventDefault();
    var error = false;
    $('.post-error').remove();

    if ($('#password').val() != $('#confirm_password').val()) {
        error = true;
        $('#confirm_password').parent().append('<span class="post-error">de wachtwoorden zijn niet gelijk</span>')
    }
    if ($('#username').val() == '') {
        error = true;
        $('#username').parent().append('<span class="post-error">vul een username in</span>')
    }

    if ($('#password').val() == '') {
        error = true;
        $('#password').parent().append('<span class="post-error">vul een password in</span>')
    }
    if ($('#email').val() == '') {
        error = true;
        $('#email').parent().append('<span class="post-error">vul een email address in</span>')
    }
    if ($('#voornaam').val() == '') {
        error = true;
        $('#voornaam').parent().append('<span class="post-error">vul een voornaam in</span>')
    }
    if ($('#achternaam').val() == '') {
        error = true;
        $('#achternaam').parent().append('<span class="post-error">vul een achternaam in</span>')
    }
    if ($('#telefoonnummer').val() == '') {
        error = true;
        $('#telefoonnummer').parent().append('<span class="post-error">vul een telefoonnummer in</span>')
    }
    function validateEmail($email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test($email);
    }
    if ($('#email').val() != '') {
        $email = $('#email').val();

        if (!validateEmail($email)) {
            error = true;
            $('#email').parent().append('<span class="post-error">Dit is geen correcte  email address </span>')
        }
    }
    if (!error) {
        $('.login-form').submit();
    }
}
