<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitações</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/global.css">
</head>

<body>

<div class="app">

    <header class="app-header">
        <div style="display:flex;align-items:center;gap:14px;">
            <div>
                <h1>  Solicitações </h1>
                <div class="subtitle">   Painel de chamados internos </div>
            </div>
        </div>
        <button  id="btnSair" class="btn btn-secondary btn-sm" >
            Sair
        </button>
    </header>
    <div class="toolbar">
        <div style="display:flex;gap:8px;flex-wrap:wrap;">
            <span class="stat">
                Total
                <strong id="total">0</strong>
            </span>
            <span class="stat">
                Abertos
                <strong id="abertos">0</strong>
            </span>
            <span class="stat">
                Concluídos
                <strong id="concluidos">0</strong>
            </span>
        </div>
        <button id="btnNovaSolicitacao"  class="btn btn-primary">
            + Nova Solicitação
        </button>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Data</th>
                    <th style="text-align:right">
                        Ações
                    </th>
                </tr>
            </thead>
            <tbody id="tabelaSolicitacoes">
            </tbody>
        </table>
    </div>
</div>

<div class="modal" id="modalSolicitacao">
    <div class="card modal-card">
        <h1>
            Nova Solicitação
        </h1>
        <p class="subtitle">  Descreva o chamado com clareza para agilizar o atendimento.  </p>
        <div id="alertSolicitacao" class="alert"></div>
        <form id="formSolicitacao">
            <div class="form-group">
                <label for="titulo"> Título </label>
                <input type="text" id="titulo" name="titulo" placeholder="Ex: Trocar cartucho da impressora" >
            </div>
            <div class="form-group">
                <label for="descricao">
                    Descrição
                </label>
                <textarea id="descricao" name="descricao" placeholder="Detalhe o problema, local e urgência..." rows="5"></textarea>
            </div>
            <div class="btn-row">
                <button type="button" class="btn btn-secondary" id="btnCancelar" >
                    Cancelar
                </button>
                <button type="submit"  class="btn btn-primary" >
                    Cadastrar
                </button>
            </div>
        </form>
    </div>
</div>
<div class="modal" id="modalConfirmacao">
    <div class="card modal-card">

        <h1 id="confirmTitulo">
            Confirmar ação
        </h1>

        <p class="subtitle" id="confirmTexto">
            Deseja realmente continuar?
        </p>

        <div class="btn-row">
            <button
                type="button"
                class="btn btn-secondary"
                id="btnCancelarConfirm">
                Cancelar
            </button>

            <button
                type="button"
                class="btn btn-danger"
                id="btnConfirmar">
                Confirmar
            </button>
        </div>

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="../assets/js/solicitacao.js"></script>
<script src="../assets/js/dashboard.js"></script>

</body>
</html>