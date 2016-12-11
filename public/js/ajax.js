$(document).ready(function () {
    $('.field').hide();

    $('#type-page_id').on('change', function () {
        var select = $("#type-page_id option:selected").val();

        switch (select) {
           case '':
                $('.field').hide(); 
            case "1":
                $('.field').hide();
                $('#artOption').show();

                break;
            case "2":
                $('.field').hide();
                $('#simpleOption').show();

                break;
            
            default:                
                $('.field').hide();


        }
    });
});



    
     
 
