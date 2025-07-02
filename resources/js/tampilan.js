document.addEventListener("DOMContentLoaded", function () {
    const changePassForm = document.getElementById("form-ganti-password");
    const alertContainer = document.getElementById("password-change-alert");

    if (changePassForm) {
        changePassForm.addEventListener("submit", async function (event) {
            event.preventDefault();

            const newPassword =
                document.getElementById("editPasswordInput").value;
            // Kita butuh CSRF token Laravel untuk request ke route-nya sendiri
            const csrfToken = document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content");

            alertContainer.innerHTML = "";

            try {
                // Request sekarang dikirim ke ROUTE LARAVEL, bukan API Express
                const response = await fetch(
                    "{{ route('user.password.change') }}",
                    {
                        method: "PUT",
                        headers: {
                            "Content-Type": "application/json",
                            Accept: "application/json",
                            "X-CSRF-TOKEN": csrfToken,
                        },
                        body: JSON.stringify({ newPassword: newPassword }),
                    }
                );

                const result = await response.json();

                if (!response.ok) {
                    throw new Error(
                        result.message || "Gagal mengubah password."
                    );
                }

                alertContainer.innerHTML = `<div class="alert alert-success">${result.message}</div>`;
                changePassForm.reset();
                setTimeout(() => {
                    const modalInstance = bootstrap.Modal.getInstance(
                        document.getElementById("changePassModal")
                    );
                    if (modalInstance) modalInstance.hide();
                }, 2000);
            } catch (error) {
                alertContainer.innerHTML = `<div class="alert alert-danger">${error.message}</div>`;
            }
        });
    }

    // Pastikan juga Anda memiliki meta tag csrf-token di head halaman dashboard
    // <meta name="csrf-token" content="{{ csrf_token() }}">
});
