    // Edit Data (Modal and function edit data)
    $(document).on('click', '.edit-modal', function() {
    $('#footer_action_button').text(" Update");
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('edit');
    $('.modal-title').text('Edit');
    $('.deleteContent').hide();
    $('.form-horizontal').show();
    $('#fid').val($(this).data('id'));
    $('#t').val($(this).data('title'));
    $('#d').val($(this).data('description'));
    $('#myModal').modal('show');
});
 

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
});

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
});
$(document).on('click', '#buttonFooter', function() {
    var dataId={'id':$(this).data('id')};
    alert(dataId.id);
  $.ajax({
    type: 'POST',
    url: 'delete',
    data: {
      '_token': $('input[name=_token]').val(),
      'id': $('.id').text(),
       'id': dataId,
    },
    success: function(data) {
      $('.item' + $('.id').text()).remove();
    }
  });
});

//$('#buttonFooter').on('click', '.delete', function() {
//  $.ajax({
//    type: 'DELETE',
//    url: '/delete',
//    data: {
//      '_token': $('input[name=_token]').val(),
//      'id': $('.id').text()
//    },
//    success: function(data) {
//      $('.item' + $('.id').text()).remove();
//    }
//  });
//});
