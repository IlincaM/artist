
 

//delete function
$(document).on('click', '.delete-modal', function() {
  $('#footer_action_button').text(" Delete");
  $('#footer_action_button').removeClass('glyphicon-check');
  $('#footer_action_button').addClass('glyphicon-trash');
  $('.actionBtn').removeClass('btn-success');
  $('.actionBtn').addClass('btn-danger');
  $('.actionBtn').addClass('delete');
  $('.modal-title').text('Delete');
  $('.id').text($(this).data('id'));
  $('.deleteContent').show();
  $('.form-horizontal').hide();
  $('.title').html($(this).data('title'));
  $('#myModal').modal('show');
  $('.modal-footer').on('click', '.delete', function() {
  $.ajax({
    type: 'delete',
    url: 'delete',
    data: {
      '_token': $('input[name=_token]').val(),
      'id': $('.id').text(),
      '_method':'delete'
    },
    success: function(data) {
      $('.item' + $('.id').text()).remove();
    }
  });
});
});

