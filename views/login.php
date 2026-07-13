<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/global.css">
</head>

<body>

<div class="auth-wrapper">
    <div class="card">
        <h1>
            Bem-vindo de volta
        </h1>
        <p class="subtitle">  Entre com sua conta para gerenciar solicitações. </p>
        <div id="alert" class="alert"></div>
        <form id="formLogin">
            <div class="form-group">
                <label for="login">  Usuário </label>
                <input type="text" id="login" name="login" placeholder="usuario"  autocomplete="username" >
            </div>
          <div class="form-group">
            <label for="senha">
                Senha
            </label>

            <div class="password-wrapper">
                <input  type="password"  id="senha"  name="senha"  placeholder="••••••••"  autocomplete="current-password" >
              <button  type="button"  class="toggle-password"  id="toggleSenha" aria-label="Mostrar senha" >
                    <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"   stroke-width="2" 
                        stroke-linecap="round"  stroke-linejoin="round">
                        <path d="M2.062 12.348a1 1 0 0 1 0-.696 
                        10.75 10.75 0 0 1 19.876 0 
                        1 1 0 0 1 0 .696 
                        10.75 10.75 0 0 1-19.876 0"/>
                        <circle cx="12" cy="12" r="3"/>
                    </svg>
                </button>
            </div>
        </div>
            <div class="btn-row">
                <button type="submit" class="btn btn-primary" >
                    Entrar
                </button>
                <a href="cadastro_usuario.php" class="btn btn-secondary" >
                    Cadastrar
                </a>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="../assets/js/login.js"></script>
</body>
</html>