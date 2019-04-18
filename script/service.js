$(document).ready(function(){
    /*$('#service').on('change',function(){
        var serviceID = $(this).val();
        if(serviceID){
            $.ajax({
                type:'POST',
                url:'addserviceprovider.php',
                data:'service_id='+serviceID,
                success:function(html){
                    $('#subservice').html(html);
                }
            }); 
        }else{
            $('#subservice').html('<option value="">Select service first</option>');
        }
    }); */

    $('#service').change(function(){
                var serviceID = $(this).val();
                if(serviceID){
                $.ajax({
                type:'POST',
                url:'showsub.php',
                data:'service_id='+serviceID,
                success:function(html){
                    $('#subservice').html(html);
                    }
                }); 
            }
            else{
                $('#subservice').html('<option value="">Select service first</option>');
            }       
            });

    $('#subservice').change(function(){
        alert();
                var serviceproviderID = $(this).val();
                if(serviceproviderID){
                $.ajax({
                type:'POST',
                url:'showproviders.php',
                data:'service_id='+serviceproviderID,
                success:function(html){
                    $('#serviceprovider').html(html);
                    }
                }); 
            }
            else{
                $('#serviceprovider').html('<option value="">Select sub service first</option>');
            }       
            });




    });

