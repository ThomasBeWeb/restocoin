
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
   

//Partie connexion

var flag = false;

//Verifie si cookie contient le nom d'un user
for(var key in listeCookies){

    if(key === "username"){
        flag = true;
    }
};

if(flag){

    $('#navDiv').append($('<div>')
        .addClass('ml-auto p-2')
        .append($('<h6>')
            .addClass('titreMiddle')
            .text(listeCookies.username)
        )
    )
    $('#navDiv').append($('<div>')
        .addClass('p-2')
        .append($('<a>')
            .attr('href',racine + 'login.php')
            .html('<i class="fas fa-window-close"></i>')
        )
    )

}else{

    $('#navDiv').append($('<div>')
        .addClass('ml-auto p-2')
        .append($('<h6>')
            .addClass('titreMiddle')
            .text('Username')
        )
    )
    $('#navDiv').append($('<div>')
        .addClass('p-2')
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
        .addClass('p-2')
        .append($('<button>')
            .attr('type',"submit")
            .addClass('btn btn-primary btn-sm')
            .text('Login')
        )
    )
}
