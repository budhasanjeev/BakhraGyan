/**
 * Created by sanjeevbudha on 6/6/16.
 */

function loginCheck(){

    var data = $('#login-form').serialize();

    alert(data);
    $.ajax({
        type:"POST",
        url:'controller/login.php',
        data:data,
        success:function(data){
            var data = JSON.parse(data)

            if(data.success){
                alert(data);
                document.location = "../views/dashboard";

            }else{
                alert("Unable to login");
            }
        },error: function (er) {
            alert("Error while Creating" +er);
        }
    });
    return false;

}