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

            if (data.datas.length > 0) {
                data.datas.forEach((item, index) => {
                    index += 1;
                    // $("#pict" + index).attr("src", url + "/" + item.picture);

                    var img = `
                    <div class="col-sm-12 col-md-4">
                        <img src="${url}/${item.picture}" id="pict${index}" class="img-thumbnail mx-1 w-50" alt="">
                    </div>
                    `;

                    $(".appendImage").append(img);
                });
            } else {
                var html = `<h1>Belum Ada Foto</h1>`;
                $(".appendImage").append(html);
            }

            console.log(data.datas.length);

            modalSeePicture.show();
        } catch (error) {
            // Tangani kesalahan jika terjadi
            console.error("Terjadi kesalahan:", error);
        }
    }

    // Panggil fungsi fetchData
    fetchData();
});
