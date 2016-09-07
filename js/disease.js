/**
 * Created by sanjeevbudha on 7/1/16.
 */

function deleteDisease(id){

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
                    url:'../controller/diseaseHandler.php',
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

function editDisease(id){

    var mode ='edit';

    $.ajax({
        type:"POST",
        url:'../controller/diseaseHandler.php',
        data:"mode="+mode+"&id="+id,
        success:function(data){
            var data = JSON.parse(data);

            var d_id = data['id'];
            $("#diseaseName").val(data['disease_name']);
            $("#description").val(data['description']);
            $("#image").attr('value',data['picture']);

            $('#insert-disease').modal('show');
            $('#insert-disease .modal-title').html("रोग परिमार्जन गर्नुहोस्");
            $('#insert-disease button[type=submit]').html("पेश गर्नुहोस्");
            $('#disease-form').attr('action','../controller/diseaseHandler.php');
            $('#disease_mode').attr('value','update');
            $('#disease_id').attr('value',d_id);

            $('.modal').on('hidden.bs.modal', function(){
                $(this).find('form')[0].reset();
            });

        },error: function (er) {
            alert("Error while Creating" +er);
        }
    });

    return false;
}