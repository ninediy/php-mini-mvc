$(function () {
    encrypt = function(){
        $('#password').val(sha1($('#password').val()));
        return true;
    }
});
