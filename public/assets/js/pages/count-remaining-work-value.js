$("#myForm").on("submit", function () {
    var progressValue = $(".progress-value");
    var workValue = parseFloat($("#work_value").val().replace("%", "")) / 100;

    // Variabel untuk menyimpan hasil penjumlahan
    var total = 0;

    // Loop melalui semua elemen input dan menambahkan nilainya ke total
    progressValue.each(function () {
        total += parseFloat($(this).val().replace("%", "")) / 100 || 0; // Menambahkan nilai dengan konversi ke float, atau 0 jika tidak valid.
    });

    if (total > workValue) {
        alert("Total Progress Tidak Boleh Melebihi Nilai Pekerjaan!");
        return false;
    }
});
