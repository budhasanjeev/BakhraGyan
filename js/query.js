/**
 * Created by sanjeevbudha on 7/22/16.
 */

function reply(id){

    alert("Reply To"+id);
}

function farmerQuery(){

    var input_form = $('#query-form').serialize()+'&mode=query';

    alert(input_form);
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