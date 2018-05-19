
var racine = "http://localhost/restocoin/";

//Liste des liens

var linksListe = [
    {
        name: "Home",
        link: racine
    },
    {
        name: "Nos cartes",
        link: racine + "?page=cartes"
    },
    {
        name: "Contact",
        link: racine + "?page=contact"
    },
    {
        name: "Livre d'Or",
        link: racine + "?page=livredor"
    }
];

//Ajout des liens admins cartes et users si connecté
var listeCookies = document.cookie;

if(listeCookies.includes('checked') && listeCookies.includes('admin')){
    var addCartes = 
    {
    name: "Gestion cartes",
    link: racine + "?page=gestionCartes"
    };

    linksListe.push(addCartes);

    var addUsers = 
    {
    name: "Gestion users",
    link: racine + "?page=gestionUsers"
    };

    linksListe.push(addUsers);
}

//Creation et affichage
for(var i = 0 ; i < linksListe.length ; i++){

    //Si page affichee lien actif
    var selectionOrNot;

    if($(location).attr('href') === linksListe[i].link){
        selectionOrNot = "p-2 pageSelected";
    }else{
        selectionOrNot = "p-2";
    }

    $('#navDiv').append($('<div>')
            .addClass(selectionOrNot)
            .append($('<a>')
                .attr('href',linksListe[i].link)
                .text(linksListe[i].name)
            )
    );
};

showMeTheConnectAreaOrNot();


function showMeTheConnectAreaOrNot(){

    var listeCookies = document.cookie;

    //Supression des elements de connection si existent
    $(".connectPart").remove();

    //Verifie si cookie contient le nom d'un user et affiche la partie connection en fonction

    if(checkCookie('username')){

        var userName = getCookie('username');

        $('#navDiv').append($('<div>')
            .addClass('ml-auto p-2 connectPart')
            .append($('<h6>')
                .addClass('titreMiddle')
                .text(userName)
            )
        )
        $('#navDiv').append($('<div>')
            .addClass('p-2 connectPart')
            .append($('<a>')
                .attr('href','#')
                .attr("onclick", "disconnectMePlease();")
                .html('<i class="fas fa-window-close"></i>')
            )
        )

    }else{

        $('#navDiv').append($('<div>')
            .addClass('ml-auto p-2 connectPart')
            .append($('<h6>')
                .addClass('titreMiddle')
                .text('Username')
            )
        )
        $('#navDiv').append($('<div>')
            .addClass('p-2 connectPart')
            .append($('<input>')
                .attr('type',"text")
                .addClass("form-control form-control-sm")
                .attr('name','username')
                .attr('id','username')            
                .attr('placeholder','Enter your Username')
                .attr('value','administrateur')
            )
        )
        $('#navDiv').append($('<div>')
            .addClass('p-2 connectPart')
            .append($('<button>')
                .attr('type',"button")
                .addClass('btn btn-primary btn-sm')
                .attr("onclick", "goCheckConnect();")
                .text('Login')
            )
        )
    }
};

function goCheckConnect(){
   
    //Check Login

    var userName = $('#username').val();

    document.cookie = "username=" + userName + "; expires=Thu, 18 Dec 2019 12:00:00 UTC; path=/";

    //Verif si admin

    var typeUser;

    $.ajax({
        type: "GET",
        url: "https://whispering-anchorage-52809.herokuapp.com/use/" + userName,
        async: false,
        success: function (data) {
            typeUser = data;
            document.cookie = "fonction=" + typeUser + "; expires=Thu, 18 Dec 2019 12:00:00 UTC; path=/";
        }
    });

    if(typeUser === "admin"){  //Si admin affichage de la page login

        console.log("Verif login");

    }else{
        showMeTheConnectAreaOrNot();
    };
    
}

//Disconnect

function disconnectMePlease(){

    //Suppression des cookies
    document.cookie = "username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
    document.cookie = "fonction=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";

    //Reload de la partie connect
    showMeTheConnectAreaOrNot();

    console.log("disconnect");
}

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
