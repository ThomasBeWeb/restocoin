//Affichage en temps réel la dispo de usernameInscrit

$("#usernameInscrit").on("input", function() {

    var testLogin = $("#usernameInscrit").val();
    
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
            $("#usernameInscrit").css("border","2px solid green");
        }else{
            $("#usernameInscrit").css("border","2px solid red");
        }
    }else{
        $("#usernameInscrit").css("border","");
    }
});
