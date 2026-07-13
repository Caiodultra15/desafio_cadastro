$(document).ready(function () {

    listarSolicitacoes();
    $("#btnNovaSolicitacao").on("click", function () {
        $("#modalSolicitacao").addClass("active");
        $("body").css("overflow", "hidden");
    });

    $("#btnCancelar, #btnFecharModal").on("click", function () {
        $("#formSolicitacao")[0].reset();
        $("#modalSolicitacao").removeClass("active");
        $("body").css("overflow", "");
    });
    
    $("#modalSolicitacao").on("click", function (e) {
        if (e.target === this) {
            $("#formSolicitacao")[0].reset();
            $(this).removeClass("active");
            $("body").css("overflow", "");
        }
    });

   $("#btnSair").on("click", function () {
        window.location.href = "login.php";
    });

    $("#formSolicitacao").on("submit", function (e) {
        e.preventDefault();
        cadastrarSolicitacao();
    });

});