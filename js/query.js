/**
 * Created by sanjeevbudha on 7/22/16.
 */

function reply(id){

    var f_id = id;
    $('#insert-reply').modal('show');
    $('#insert-reply .modal-title').html("Reply");
    $('#insert-reply button[type=submit]').html("Send");
    $('#reply-form').attr('action','../controller/queryHandler.php');
    $('#mode').attr('value','reply');
    $('#query_id').attr('value',f_id);

    $('.modal').on('hidden.bs.modal', function(){
        $(this).find('form')[0].reset();
    });
}


function discard(id) {
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
                    url:'../controller/queryHandler.php',
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
function farmerQuery(){

    var input_form = $('#query-form').serialize()+'&mode=query';

    $.ajax({
        type:"POST",
        url:'../controller/queryHandler.php',
        data:input_form,
        success:function(data){
            var data = JSON.parse(data)

            alert(data.message);
            if(data.success){
                var data = JSON.parse(data);

                if(data.message=='success'){
                    displayMessage("तपाईको जिज्ञाश सफलतापूर्वक बुझिएको छ|","success");
                    customReloadWindow(2000)
                }
            }
        },error: function (err) {
            alert("Error"+Parse.error(err))
        }
    });
}