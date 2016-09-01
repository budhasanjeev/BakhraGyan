/**
 * Created by sanjeevbudha on 7/22/16.
 */

function reply(id){

    var f_id = id;
    $('#insert-reply').modal('show');
    $('#insert-reply .modal-title').html("जावफ दिनुहोस्");
    $('#insert-reply button[type=submit]').html("पेश गर्नुहोस्");
    $('#reply-form').attr('action','../controller/queryHandler.php');
    $('#modes').attr('value','reply');
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

function showReply(id) {

    var mode = 'show';
    $.ajax({
        type:"POST",
        url:'../controller/queryHandler.php',
        data:"mode="+mode+"&id="+id,
        success:function(data){

            var data = JSON.parse(data);

            $('#replyList tbody').empty()
            for(var i = 0; i < data.length;i++) {
                var id = data[i].id;
                var reply = data[i].reply;
                var reply_from = data[i].reply_from;
                var replied_date = data[i].replied_date;

                var text = '<tr><td>'+reply+'</td><td>'+reply_from+'</td><td>'+replied_date+'</td></tr>';

                $('#replyList tbody').append(text);
            }

            $('#show-reply').modal('show');
            $('#show-reply .modal-title').html("Reply List");
            
            $('.modal').on('hidden.bs.modal', function(){
                $(this).find('form')[0].reset();
            });

        },error: function (er) {
            alert("Error while Creating" +er);
        }
    });

    return false;
}