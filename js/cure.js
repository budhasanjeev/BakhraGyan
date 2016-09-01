/**
 * Created by sanjeevbudha on 7/21/16.
 */


function deleteCure(id){

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
                    url:'../controller/cureHandler.php',
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

function editCure(id){

    var mode ='edit';

    $.ajax({
        type:"POST",
        url:'../controller/cureHandler.php',
        data:"mode="+mode+"&id="+id,
        success:function(data){
            var data = JSON.parse(data);

            var c_id = data['id'];
            $("#preventive").val(data['preventive_care']);
            $('#diseaseName').val(data['disease_id']);

            
            $('#insert-cure').modal('show');
            $('#insert-cure .modal-title').html("उपचार परिमार्जन गर्नुहोस्");
            $('#insert-cure button[type=submit]').html("पेश गर्नुहोस्");
            $('#cure-form').attr('action','../controller/cureHandler.php');
            $('#mode').attr('value','update');
            $('#cure_id').attr('value',c_id);

            $('.modal').on('hidden.bs.modal', function(){
                $(this).find('form')[0].reset();
            });

        },error: function (er) {
            alert("Error while Creating" +er);
        }
    });

    return false;
}

function detail(id){

    alert(id);

}