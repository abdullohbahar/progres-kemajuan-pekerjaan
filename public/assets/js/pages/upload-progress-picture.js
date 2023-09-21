var modalUploadPicture = new bootstrap.Modal(
    document.getElementById("modalUploadPicture"),
    {}
);

$("body").on("click", "#uploadPicture", function () {
    var date = $(this).data("date");
    var scheduleid = $(this).data("scheduleid");
    $("#datePicture").val(date);
    $("#scheduleid").val(scheduleid);

    modalUploadPicture.show();
});

var modalSeePicture = new bootstrap.Modal(
    document.getElementById("modalSeePicture"),
    {}
);

$("body").on("click", "#seePicture", function () {
    var id = $(this).data("scheduleid");
    var url = window.location.origin;
    // Fungsi async untuk mengirim permintaan AJAX
    async function fetchData() {
        try {
            const response = await fetch("/admin/get-progress-picture/" + id); // Ganti URL dengan URL yang sesuai
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }

            const data = await response.json(); // Mengambil data JSON dari respons

            data.datas.forEach((item, index) => {
                index += 1;
                $("#pict" + index).attr("src", url + "/" + item.picture);
            });

            console.log(data.count);

            modalSeePicture.show();
        } catch (error) {
            // Tangani kesalahan jika terjadi
            console.error("Terjadi kesalahan:", error);
        }
    }

    // Panggil fungsi fetchData
    fetchData();
});
