
$(".images img").click(function(){
  $("#full-image").attr("src", $(this).attr("src"));
  $('#image-viewer').show();
});

$("#image-viewer .close").click(function(){
  $('#image-viewer').hide();
});

$('#image-viewer img').click(function() {
  return false;
});

$('#image-viewer').click(function() {
  $('#image-viewer').hide();
});