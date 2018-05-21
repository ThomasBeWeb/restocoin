$( document ).ready(function() {
    if(getCookie('checked') === 'wrongUsername'){
        showMeTheInscription();
    }
});

function showMeTheInscription(){

    $('#inscriptionModal').modal('show');

};
    //if(getCookie('checked') === 'true' && getCookie('fonction') === 'admin'){


//FONCTIONS COOKIES

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie(type) {
    var value = getCookie(type);
    if (value != "") {
        return true;
    } else {
        return false;
    }
}
