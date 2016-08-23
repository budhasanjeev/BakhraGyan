/**
 * Created by Arun Tamang on 8/23/2016.
 */

function deleteUser(id){

    var mode ='delete';

    var n = noty({
        layout: 'center',
        text: "Are you sure you want delete? ",
        killer: true,
        buttons: [
            {
                addClass: 'btn btn-primary', text: 'Ok', onClick: function ($noty) {
                n.close();
                $.ajax({
                    type:"POST",
                    url:'../controller/userHandler.php',
                    data:"mode="+mode+"&id="+id,
                    success:function(data){
                        var data = JSON.parse(data);

                        if(data.message=='success'){
                            displayMessage("Successfully Deleted","success");
                            customReloadWindow(2000)
                        }
                    },error: function (er) {
                        console.log(er);
                    }
                });
                return false;
            }
            },
            {
                addClass: 'btn btn-danger', text: 'Cancel', onClick: function ($noty) {
                n.close();
            }
            }
        ]
    })

}