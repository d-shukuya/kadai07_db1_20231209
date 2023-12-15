$("#book_list").on("click", ".book_item", function () {
  const bookId = $(this).data("book_id");
  let path = `./books/${bookId}`;
  window.location.href = path;
});
