
function mostrarToast(texto, tipo = "success") {
    const cor = tipo === "success" ? "#16a34a" : "#dc2626";
    Toastify({ text: texto, duration: 3000, gravity: "top", position: "center", close: true, stopOnFocus: true,
    style: { background: cor, borderRadius: "8px" }
    }).showToast();
}
    const toggleSenha = document.getElementById("toggleSenha");
    const senha = document.getElementById("senha");
    const eyeIcon = document.getElementById("eyeIcon");
    toggleSenha.addEventListener("click", () => {
        if (senha.type === "password") {
            senha.type = "text";
            eyeIcon.innerHTML = `
                <path d="M10.733 5.076A10.744 10.744 0 0 1 12 5c5 0 8.5 7 8.5 7a13.4 13.4 0 0 1-2.17 2.9"/>
                <path d="M6.61 6.61A13.526 13.526 0 0 0 3.5 12s3.5 7 8.5 7a9.74 9.74 0 0 0 5.39-1.61"/>
                <line x1="2" y1="2" x2="22" y2="22"/>
            `;
        } else {
            senha.type = "password";
            eyeIcon.innerHTML = `
                <path d="M2.062 12.348a1 1 0 0 1 0-.696
                10.75 10.75 0 0 1 19.876 0
                1 1 0 0 1 0 .696
                10.75 10.75 0 0 1-19.876 0"/>
                <circle cx="12" cy="12" r="3"/>
            `;
        }
    });
$(document).ready(function () {
    $("#formLogin").on("submit", function (e) {
        e.preventDefault();
        const login = $("#login").val().trim();
        const senha = $("#senha").val().trim();
        if (login === "" || senha === "") {
            mostrarToast("Preencha todos os campos.", "error");
            return;
        }
        $.ajax({
            url: "../public/index.php?action=login",
            type: "POST",
            dataType: "json",
            data: {
                login: login,
                senha: senha
            },
            success: function (response) {
                if (response.success) {
                    mostrarToast(response.message);
                    setTimeout(function () {
                        window.location.href = "dashboard.php";
                    }, 1200);
                } else {
                    mostrarToast(response.message, "error");
                }
            },
            error: function () {
                mostrarToast("Erro ao conectar com o servidor.", "error");
            }
        });
    });
});