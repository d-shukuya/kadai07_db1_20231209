$("#book_memo").on("change", function () {
  const bookMemo = $(this).val();
  const bookId = $(this).data("book_id");
  $.ajax({
    url: "../php/update_script.php",
    type: "post",
    data: { book_memo: bookMemo, book_id: bookId },
    success: function (response) {
      console.log(response);
    },
  });
});
