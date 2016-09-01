/**
 * Created by sanjeevbudha on 6/30/16.
 */
function deleteFood(id){

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
                    url:'../controller/foodHandler.php',
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

function editFood(id){

    var mode ='edit';

    $.ajax({
        type:"POST",
        url:'../controller/foodHandler.php',
        data:"mode="+mode+"&id="+id,
        success:function(data){
            var data = JSON.parse(data);

            var f_id = data['id'];
            $("#feedName").val(data['title']);
            $("#description").val(data['description']);

            $('#insert-food').modal('show');
            $('#insert-food .modal-title').html("आहारा परिमार्जन गर्नुहोस्");
            $('#insert-food button[type=submit]').html("पेश गर्नुहोस्");
            $('#food-form').attr('action','../controller/foodHandler.php');
            $('#mode').attr('value','update');
            $('#food_id').attr('value',f_id);

            $('.modal').on('hidden.bs.modal', function(){
                $(this).find('form')[0].reset();
            });

        },error: function (er) {
            alert("Error while Creating" +er);
        }
    });

    return false;
}