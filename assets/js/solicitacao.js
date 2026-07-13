let acaoConfirmada = null;

function abrirConfirmacao(titulo, texto, callback) {
    $("#confirmTitulo").text(titulo);
    $("#confirmTexto").text(texto);
    acaoConfirmada = callback;
    $("#modalConfirmacao").addClass("active");
    $("body").css("overflow","hidden");
}
$("#btnCancelarConfirm").on("click", function () {
    $("#modalConfirmacao").removeClass("active");
    $("body").css("overflow","");
    acaoConfirmada = null;
});

$("#btnConfirmar").on("click", function () {
    $("#modalConfirmacao").removeClass("active");
    $("body").css("overflow","");
    if (acaoConfirmada) {
        acaoConfirmada();
    }
    acaoConfirmada = null;
});

function mostrarToast(texto, tipo = "success") {
    const cor = tipo === "success" ? "#16a34a" : "#dc2626";
    Toastify({ text:texto, duration:3000, gravity:"top", position:"center", close:true, stopOnFocus:true,
        style:{ background:cor, borderRadius:"8px"
        }
    }).showToast();
}
function formatarData(data) {
    if (!data) return "-";
    const dt = new Date(data);
    if (isNaN(dt.getTime())) {
        return data;
    }
    return dt.toLocaleString("pt-BR", {
        day: "2-digit",
        month: "2-digit",
        year: "numeric",
        hour: "2-digit",
        minute: "2-digit"
    });
}
function listarSolicitacoes() {
    $.ajax({
        url: "../public/index.php?action=listar",
        type: "GET",
        dataType: "json",
        success: function (dados) {
        const total = dados.length;
        const abertos = dados.filter(item =>  item.status !== "Concluido").length;
        const concluidos = dados.filter(item => item.status === "Concluido" ).length;
        $("#total").text(total);
        $("#abertos").text(abertos);
        $("#concluidos").text(concluidos);
            let html = "";
            if (dados.length === 0) {
                html = `
                    <tr>
                        <td colspan="6">
                            <div class="empty">
                                <div class="empty-icon">
                                    📋
                                </div>
                                <div class="empty-title">
                                    Nenhuma solicitação encontrada
                                </div>
                                <div class="empty-text">
                                    Clique em "Nova Solicitação" para começar.
                                </div>
                            </div>
                        </td>
                    </tr>
                `;

            } else {

                dados.forEach(function (item) {
                    html += `
                        <tr>
                            <td>
                                <span class="id">
                                    #${String(item.id).padStart(3, "0")}
                                </span>
                            </td>
                            <td>
                                <span class="titulo">
                                    ${item.titulo}
                                </span>
                            </td>
                            <td>
                                <div class="desc">
                                    ${item.descricao}
                                </div>
                            </td>
                            <td>
                                <span class="badge ${item.status === "Concluido" ? "badge-concluido" : "badge-aberto"}">
                                    ${item.status}
                                </span>
                            </td>
                            <td>
                               ${formatarData(item.created_at)}
                            </td>
                            <td>
                                <div class="actions">
                                    ${
                                        item.status !== "Concluido"
                                        ?
                                        `
                                        <button
                                            class="btn btn-success btn-sm"
                                            onclick="concluirSolicitacao(${item.id})">
                                            Finalizar
                                        </button>
                                        `
                                        :
                                        ""
                                    }
                                    <button
                                        class="btn btn-danger btn-sm"
                                        onclick="excluirSolicitacao(${item.id})">
                                        Cancelar
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;
                });
            }
            $("#tabelaSolicitacoes").html(html);
        }
    });
}

function cadastrarSolicitacao() {
    const titulo = $("#titulo").val().trim();
    const descricao = $("#descricao").val().trim();
    if (titulo === "" || descricao === "") {
         mostrarToast( "Preencha todos os campos.", "error");
        return;
    }
    $.ajax({
        url: "../public/index.php?action=cadastrar_solicitacao",
        type: "POST",
        dataType: "json",
        data: {
            titulo: titulo,
            descricao: descricao
        },
        success: function (response) {
            if (response.success) {
                mostrarToast(response.message, "success");
                $("#formSolicitacao")[0].reset();
                $("#modalSolicitacao").removeClass("active");
                $("body").css("overflow", "");
                listarSolicitacoes();
            } else {
                mostrarToast(response.message, "success");
            }
        },
        error: function () {
            mostrarToast("Erro ao cadastrar solicitação.", "error");
        }
    });
}

function concluirSolicitacao(id) {

    abrirConfirmacao(
        "Finalizar solicitação",
        "Deseja realmente marcar esta solicitação como concluída?",
        function () {
            $.ajax({
                url: "../public/index.php?action=concluir",
                type: "POST",
                dataType: "json",
                data: { id },
                success: function (response) {
                    mostrarToast(response.message, "success");
                    listarSolicitacoes();
                },
                error: function () {
                    mostrarToast("Erro ao concluir solicitação.", "error");
                }
            });
        }
    );
}

function excluirSolicitacao(id) {
    abrirConfirmacao(
        "Excluir solicitação",
        "Esta ação não poderá ser desfeita. Deseja continuar?",
        function () {
            $.ajax({
                url: "../public/index.php?action=excluir",
                type: "POST",
                dataType: "json",
                data: { id },
                success: function (response) {
                    mostrarToast(response.message, "success");
                    listarSolicitacoes();
                },
                error: function () {
                    mostrarToast("Erro ao excluir solicitação.", "error");
                }
            });
        }
    );
}