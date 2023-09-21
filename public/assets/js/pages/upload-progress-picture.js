var myModal = new bootstrap.Modal(
    document.getElementById("modalUploadPicture"),
    {}
);

$("body").on("click", "#uploadPicture", function () {
    var date = $(this).data("date");
    var scheduleid = $(this).data("scheduleid");
    $("#datePicture").val(date);
    $("#scheduleid").val(scheduleid);

    myModal.show();
});
