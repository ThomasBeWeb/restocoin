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
    }

   
});