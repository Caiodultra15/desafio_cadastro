function mostrarToast(texto, tipo = "success") {
    const cor = tipo === "success" ? "#16a34a" : "#dc2626";
    Toastify({ text:texto, duration:3000, gravity:"top", position:"center", close:true, stopOnFocus:true,
        style:{ background:cor, borderRadius:"8px"
        }
    }).showToast();
}
const toggleSenha = document.getElementById("toggleSenha");
const senha = document.getElementById("senha");
const eyeIcon = document.getElementById("eyeIcon");
if(toggleSenha){
    toggleSenha.addEventListener("click",()=>{
        if(senha.type === "password"){
            senha.type="text";
            eyeIcon.innerHTML=`
            <path d="M17.94 17.94A10.94 10.94 0 0 1 12 20c-5 0-9.27-3.11-11-8
            a18.36 18.36 0 0 1 5.06-6.94"/>
            <path d="M1 1l22 22"/>
            <path d="M9.9 9.9a3 3 0 0 0 4.2 4.2"/>
            `;
        }else{
            senha.type="password";
            eyeIcon.innerHTML=`
            <path d="M2.062 12.348a1 1 0 0 1 0-.696
            10.75 10.75 0 0 1 19.876 0
            1 1 0 0 1 0 .696
            10.75 10.75 0 0 1-19.876 0"/>
            <circle cx="12" cy="12" r="3"/>
            `;
        }
    });
}
$(document).ready(function(){
    $("#cep").on("input", function () {
        let cep = $(this).val().replace(/\D/g, "");
        if (cep.length > 8) {
            cep = cep.substring(0, 8);
        }
        if (cep.length > 5) {
            cep = cep.replace(/^(\d{5})(\d)/, "$1-$2");
        }
        $(this).val(cep);
    });
    $("#cep").on("blur", function(){
        let cep = $(this).val().replace(/\D/g,'');
        if(cep.length !== 8){
            $("#cepMensagem").text("CEP inválido.").css("color","#dc2626");
            return;
        }
        $.ajax({
            url:`https://viacep.com.br/ws/${cep}/json/`,
            method:"GET",
            dataType:"json",
            success:function(data){
                if(data.erro){
                    $("#cepMensagem").text("CEP não encontrado.").css("color","#dc2626");
                    return;
                }
                $("#cepMensagem")
                    .text( `${data.logradouro} - ${data.localidade}/${data.uf}`)
                    .css("color","#16a34a");
            },
            error:function(){
                $("#cepMensagem")
                    .text("Erro ao consultar CEP.")
                    .css("color","#dc2626");
            }
        });
    });

    $("#formCadastro").submit(function(e){
        e.preventDefault();
        let nome = $("#nome").val().trim();
        let cep = $("#cep").val().trim();
        let login = $("#login").val().trim();
        let senha = $("#senha").val().trim();
        if( nome === "" || cep === "" || login === "" || senha === ""){
           mostrarToast( "Preencha todos os campos.", "error");
            return;
        }
        $.ajax({
            url:"../public/index.php?action=cadastrar_usuario",
            method:"POST",
            dataType:"json",
            data:{ nome:nome, cep:cep,login:login,senha:senha },
            success:function(response){
                if(response.success){
                    mostrarToast( response.message, "success");
                    window.location.href="login.php";
                }else{
                   mostrarToast( response.message, "error");
                }
            },
            error:function(){
               mostrarToast( "Erro ao cadastrar usuário.", "error");
            }
        });
    });
});