// $("#submit").click(function () {

//     var gitBranch = $("input[name=gitbranch]").val();
//     $.ajax({
//             url: '/cost/project_cost/import_file',
//             type: 'POST',
//             processData: false,
//             dataType: 'json',
//             data: data,
//             contentType: false,
//             mimeType:"multipart/form-data",
//         }).done( function(message) {
//                 if (message != 1) {
//                     $(".ajax-loader").hide();
//                     $('#errorMessage').removeClass('hide');
//                     $('#errorMessage #message').text(message["content"]);
//                 } else {
//                     $('.ajax-loader').show();
//                     window["reload_timer"] = setTimeout(function() {
//                         $('.ajax-loader').hide();
//                         $('#message-import-delay').show();
//                     }, 30000);
//                 }
//         });
// });