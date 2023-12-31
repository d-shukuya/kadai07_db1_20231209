$("#book_list").on("click", ".book_item", function () {
  const bookId = $(this).data("book_id");
  let path = `./books/${bookId}`;
  window.location.href = path;
});

$("#book_cover_box").on("click", "#book_cover_img", function () {
  $("#img_upload").click();
});

$("#img_upload").on("change", function (e) {
  const reader = new FileReader();
  reader.onload = function (e) {
    $("#book_cover_img").attr("src", e.target.result);
  };
  reader.readAsDataURL(e.target.files[0]);
});
