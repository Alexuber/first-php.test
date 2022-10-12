$('#formTwit').on('submit', function (e) {
  e.preventDefault();

  let form = $('#formTwit');

  let file_data = $('#twitImage').prop('files')[0];

  let form_data = new FormData($('#formTwit')[0]);
  form_data.append('file', file_data);
  console.dir(form_data);

  $.ajax({
    type: 'POST',
    url: '/modules/add_twit.php',
    contentType: false,
    processData: false,
    data: form_data,
    success: function (data) {
      $('#listTwits').prepend(data);
    },
  });
});
