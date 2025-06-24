document.addEventListener("DOMContentLoaded", function () {
    const toggle = document.getElementById("downloadAllSwitch");
    const fields = [
        document.getElementById("jumlahFile"),
        document.getElementById("formatFile"),
        document.getElementById("tanggalMulai"),
        document.getElementById("tanggalSampai"),
    ];

    toggle.addEventListener("change", function () {
        const disabled = toggle.checked;
        fields.forEach((field) => (field.disabled = disabled));
    });
});
