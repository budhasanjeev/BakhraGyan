/**
 * Created by Arun Tamang on 7/23/2016.
 */

function deleteShed(id){

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
                    url:'../controller/shedHandler.php',
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

function editShed(id){

    var mode ='edit';

    $.ajax({
        type:"POST",
        url:'../controller/shedHandler.php',
        data:"mode="+mode+"&id="+id,
        success:function(data){
            var data = JSON.parse(data);

            var s_id = data['id'];
            $("#image").attr('value',data['image']);
            $("#description").val(data['description']);
            $('#shedTitle').val(data['shed_title']);


            $('#insert-shed').modal('show');
            $('#insert-shed .modal-title').html("खोर परिमार्जन गर्नुहोस्");
            $('#insert-shed button[type=submit]').html("पेश गर्नुहोस्");
            $('#shed-form').attr('action','../controller/shedHandler.php');
            $('#mode').attr('value','update');
            $('#shed_id').attr('value',s_id);

            $('.modal').on('hidden.bs.modal', function(){
                $(this).find('form')[0].reset();
            });

        },error: function (er) {
            alert("Error while Creating" +er);
        }
    });

    return false;
}