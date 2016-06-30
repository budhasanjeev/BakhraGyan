/**
 * Created by sanjeevbudha on 6/6/16.
 */

function loginCheck(){

    var data = $('#login-form').serialize();

    $.ajax({
        type:"POST",
        url:'../controller/auth.php',
        data:data,
        success:function(data){
            var data = JSON.parse(data)

            alert(data.message);
            if(data.success){
                window.location = "../views/dashboard";

            }else{
                //displayLoginMessage("incorrect username or password","error")

            }
        },error: function (err) {
          alert("Error"+Parse.error(err))
        }
    });
    return false;

}