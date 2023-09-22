$(document).ready(function () {
    window.addEventListener("load", function () {
        updateRemaining();
    });

    // Fungsi untuk menghitung ulang sisa nilai pekerjaan
    function updateRemaining() {
        var remaining =
            parseFloat($("#work_value").val().replace("%", "")) / 100;
        var inputElements = $(".progress-value");

        inputElements.each(function () {
            var progress = parseFloat($(this).val().replace("%", "")) / 100;
            if (!isNaN(progress)) {
                remaining -= progress;
            }
        });

        $("#remaining").val((remaining * 100).toFixed(2) + "%");
    }

    // Event listener untuk input "progress-value" saat keyup
    $("body").on("keyup", ".progress-value", function () {
        var key = $(this).data("key");
        var remaining =
            parseFloat($("#remaining").val().replace("%", "")) / 100;
        var progress = parseFloat($(this).val().replace("%", "")) / 100;

        if (progress < 0) {
            progress = 0;
            $(this).val("0%");
        } else if (progress > 100) {
            progress = 100;
            $(this).val("100%");
        }

        console.log(progress > remaining);
        console.log(progress);
        console.log(remaining);

        // Tampilkan pesan peringatan jika progress melebihi sisa nilai pekerjaan
        if (progress > remaining) {
            $(".warning" + key).text(
                "Progress Tidak Boleh Melebihi Sisa Nilai Pekerjaan"
            );
            $(".btn-submit").attr("disabled", true);
        } else {
            $(".warning" + key).text("");
            $(".btn-submit").attr("disabled", false);
        }

        console.log(remaining);
    });

    // Event listener untuk tombol "Simpan" atau elemen lain yang sesuai
    $("body").on("click", ".btn-submit", function () {
        updateRemaining(); // Panggil fungsi untuk menghitung ulang sisa nilai pekerjaan
    });
});
