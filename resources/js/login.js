document.addEventListener("DOMContentLoaded", function () {
    // Pastikan URL API Anda benar
    const apiUrl = "http://localhost:3000"; // Ganti dengan URL API Express Anda jika berbeda

    const loginForm = document.getElementById("form-login");
    const alertContainer = document.getElementById("login-alert");
    const submitButton = document.getElementById("btn-login");

    // Jika form tidak ditemukan, tampilkan error di console
    if (!loginForm) {
        console.error(
            "KRITIS: Form dengan ID 'form-login' tidak ditemukan. Pastikan ID di HTML sudah benar."
        );
        return;
    }

    loginForm.addEventListener("submit", async function (event) {
        event.preventDefault(); // Mencegah form dari reload halaman

        const username = document.getElementById("username").value;
        const password = document.getElementById("password").value;

        // Tampilan loading di tombol
        submitButton.disabled = true;
        submitButton.innerText = "Logging in...";
        alertContainer.innerHTML = "";

        try {
            // Mengirim data ke API Login Anda
            const response = await fetch(`${apiUrl}/login`, {
                // Pastikan endpoint '/login' sudah benar
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ username, password }), // Sesuaikan key (username/email) dengan API Anda
            });

            const result = await response.json();

            if (!response.ok) {
                // Jika login gagal (misal: password salah)
                throw new Error(
                    result.message || "Username atau password salah."
                );
            }

            // Jika login BERHASIL dan respons mengandung token
            if (result.token) {
                // === INI ADALAH BAGIAN KUNCI ===
                // Menyimpan token ke Local Storage
                localStorage.setItem("jwtToken", result.token);

                alertContainer.innerHTML = `<p style="color: green;">Login berhasil! Mengarahkan ke dashboard...</p>`;

                // Arahkan pengguna ke halaman dashboard setelah 1 detik
                setTimeout(() => {
                    window.location.href = "/dashboard"; // Ganti '/dashboard' dengan URL dashboard Anda
                }, 1000);
            } else {
                // Jika respons sukses tapi tidak ada field 'token'
                throw new Error(
                    "Respons dari server tidak valid (token tidak ditemukan)."
                );
            }
        } catch (error) {
            // Menampilkan pesan error jika terjadi kesalahan
            alertContainer.innerHTML = `<p style="color: red;">${error.message}</p>`;
            // Kembalikan tombol ke keadaan semula
            submitButton.disabled = false;
            submitButton.innerText = "Log In";
        }
    });
});
