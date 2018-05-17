$( document ).ready(function() {
    showTheUsers();
});

//Affichage liste users

function showTheUsers(){

    //Clear de la table
    $("#tableUsers").empty();

    //Recup de la liste

    var listeUsers;

    $.ajax({
        type: "GET",
        url: "https://whispering-anchorage-52809.herokuapp.com/users/get",
        async: false,
        success: function (data) {
            listeUsers = data;
        }
    });

    //Affichage lignes

    for(var i = 0 ; i < listeUsers.length ; i++){

        $("#tableUsers").append($("<tr>")
            .append($("<td>")
                .attr("scope","col")
                .text(listeUsers[i].username)
            )
            .append($("<td>")
                .attr("scope","col")
                .text(listeUsers[i].password)
            )
            .append($("<td>")
                .attr("scope","col")
                .append($("<button>")
                    .addClass("btn btn-outline-danger btn-sm ptitButton")
                    .attr("type", "button")
                    .html("<i class='far fa-times-circle'></i>")
                    .attr("onclick", "deleteUser(" + listeUsers[i].id + ");")
                )
            )
        )
    }
}

$("#username").on("input", function() {

    var testLogin = $("#username").val();
    
    if(testLogin.length > 2){

        var result;

        $.ajax({
            type: "GET",
            url: "https://whispering-anchorage-52809.herokuapp.com/users/checkname/" + testLogin,
            async: false,
            success: function (data) {
                result = data;
            }
        });

        if(result === "true"){
            $("#username").css("border","2px solid green");
        }else{
            $("#username").css("border","2px solid red");
        }
    }else{
        $("#username").css("border","");
    }

   
});

//AJOUTER UN USER
function addUser(){

    var userName =  $("#username").val();
    var userPwd =  $("#password").val();

    var flag = true;

    //Verif integrité donnees

    if($("#username").css("border-color") === "red"){
        flag = false;
    }

    if($("#password").val() === ""){
        alert("Le password ne peut être vide");
        flag = false;
    }

    //Ajout User

    if(flag){

        //creation du user:

        var newUser = {
            id: 0,
            username: userName,
            password: userPwd
            };

        //POST

        $.ajax({
            type: "POST",
            url: "https://whispering-anchorage-52809.herokuapp.com/users/add",
            data: newUser,
            async: false,
    
            success: function (data) {
                showTheUsers();
            }
        });
    }
}

//Delete a user

function deleteUser(id){

    $.ajax({
        type: "GET",
        url: "https://whispering-anchorage-52809.herokuapp.com/users/" + id + "/remove",
        async: false,
        success: function () {
            showTheUsers();
        }
    });
}
