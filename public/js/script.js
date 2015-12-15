/**
 * Created by ugur on 30-11-15.
 */
$(document).ready(function(){
    $(".button-collapse").sideNav();
    $('.timepicker').pickatime({
        format:  'HH:i'
    });
    $('.datepicker').pickadate();
});