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
                console.log("user ajouté");
            }
        });
    }
}