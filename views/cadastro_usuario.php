<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário — Chamados Internos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="../assets/css/cadastro.css">

</head>

<body>

<div class="auth-wrapper">
    <div class="card">
        <a href="login.php" class="back-link">
            ← Voltar
        </a>
        <h1>
            Criar conta
        </h1>
        <p class="subtitle">
            Preencha seus dados para começar.
        </p>
        <div id="alert" class="alert"></div>
        <form id="formCadastro">
            <div class="form-group">
                <label for="nome">
                    Nome completo
                </label>
                <input type="text" id="nome"  name="nome" placeholder="Como quer ser chamado" >
            </div>
            <div class="form-group">
                <label for="cep">
                    CEP
                </label>
                <input type="text" id="cep" name="cep" placeholder="00000-000" maxlength="9" >
                <div class="hint" id="cepMensagem">
                    
                </div>
            </div>

            <div class="form-group">
                <label for="login">
                    Login
                </label>
                <input type="text" id="login"  name="login" placeholder="usuario" autocomplete="username">
            </div>
           <div class="form-group">
                <label for="senha">  Senha </label>
                <div class="password-wrapper">
                    <input type="password"  id="senha"   name="senha"  placeholder="••••••••"  autocomplete="new-password" >
                    <button type="button" class="toggle-password" id="toggleSenha" >
                        <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M2.062 12.348a1 1 0 0 1 0-.696
                            10.75 10.75 0 0 1 19.876 0
                            1 1 0 0 1 0 .696
                            10.75 10.75 0 0 1-19.876 0"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                    </button>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block" >
                Cadastrar
            </button>
            <div class="form-footer">
                Já tem uma conta?
                <a href="login.php">  Entrar  </a>
            </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="../assets/js/cadastro.js"></script>
</body> 

</html>