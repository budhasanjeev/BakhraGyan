/**
 * Created by sanjeevbudha on 6/18/16.
 */

function displayMessage(message,messageType){
    noty({
        layout: 'topRight',
        text: message,
        type: messageType,
        timeout: 3000
    });
}

function customReloadWindow(delayTime){
    setTimeout(
        function()
        {
            window.location.reload()

        }, delayTime);
}


function displayLoginMessage(message,messageType){
    noty({
        layout:'topCenter',
        text:message,
        type:messageType,
        timeout:3000
    })
}

function checkDuplicate(input_id,controller,span_id) {
    
    var input_text = document.getElementById(input_id).value;

    var mode ='check';

    $.ajax({
        type:"POST",
        url:'../controller/'+controller,
        data:"mode="+mode+"&input_txt="+input_text,
        success:function(data){

            var data = JSON.parse(data);


            if(data.message == 'success'){
                document.getElementById(span_id).style.display = 'block';
                document.getElementById(span_id).style.color = 'red';

                $('button[type=submit]').attr('disabled','disabled');
            }
            else {
                document.getElementById(span_id).style.display = 'none';
                $('button[type=submit]').removeAttr('disabled');

            }

        },error: function (er) {
            alert("Error while Creating" +er);
        }
    });

    return false;
}