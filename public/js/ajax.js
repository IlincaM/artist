$(document).ready(function () {
    $('.field').hide();
 $('.fields').hide();
    $('#type-page_id').on('change', function () {
        var select = $("#type-page_id option:selected").val();

        switch (select) {
            case '':
                $('.field').hide();
            case "1":
                $('.field').hide();
                $('#artOption').show();
               
                $(".invisible").val(1);

                break;
            case "2":
                $('.field').hide();
                $('#simpleOption').show();
                $(".invisible").val(2);

                break;

            default:
                $('.field').hide();


        }
    });
     $('#category_id').on('change', function () {
        var select = $("#category_id option:selected").val();

        switch (select) {
            case '':
                $('.fields').hide();
            case "1":
                $('.fields').hide();
                $('#galeriaArtistului').show();
               
             

                break;
            case "2":
                $('.fields').hide();
                $('#fotografie').show();
              

                break;

            default:
                $('.fields').hide();


        }
    });
    
});






