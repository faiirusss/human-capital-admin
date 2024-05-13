// $("#tombol-cari").hide();

// AJAX JQUERY
$(document).ready(function () {
  // event ketika keyword ditulis
  $("#keyword").on("keyup", function () {
    $("#containers").load(
      "../ajax/peserta.php?keyword=" + encodeURIComponent($("#keyword").val())
    );
  });
});
