$(document).ready(function () {
    $('.field').hide();
    $('.fields').hide();
    $('#type_of_the_page').on('change', function () {
        var select = $("#type_of_the_page option:selected").val();

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
    $('#project').change(function ()
{
    var category_id=$('#project :selected').parent().attr('value');
     $(".invisibleId").val(category_id);
      var subcategory_id=$('#project :selected').attr('value');
     $(".invisibleSubcategoryId").val(subcategory_id);
});

});






