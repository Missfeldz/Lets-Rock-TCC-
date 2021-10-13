function validarCadastro () {
    var nome = formCadastro.nome.value;
    var email = formCadastro.email.value;
    var password = formCadastro.password.value;
    var pais = formCadastro.pais.value;
    var estado = formCadastro.estado.value;
    var cidade = formCadastro.cidade.value;


    if(nome == ''){
        alertify.alert('Preencha o campo nome.');
        formCadastro.nome.focus();
        return false;
    }

    if(email == '' || email.indexOf('@') == -1 || email.indexOf('.com') == -1){
        alert('Preencha o campo com um email válido.');
        formCadastro.email.focus();
        return false;
    }

    if(password == ''){
        alert('Preencha a senha');
        formCadastro.password.focus();
        return false;
    }

    if(password.length <= 5){
        alert('A senha deve conter ao minimo 6 caracteres');
        formCadastro.password.focus();
        return false;
    }


    if(pais == ''){
        alert('Preencha o campo pais.');
        formCadastro.pais.focus();
        return false;
    }

    if(estado == ''){
        alert('Preencha o campo estado.');
        formCadastro.estado.focus();
        return false;
    }

    if(cidade == ''){
        alert('Preencha o campo cidade.');
        formCadastro.cidade.focus();
        return false;
    }
}

function validarLogin (){
    var email = formLogin.email.value;
    var senha = formLogin.senha.value;

    if(email == '' || email.indexOf('@') == -1 || email.indexOf('.com') == -1){
        alert('Preencha o campo com um email válido.');
        formCadastro.email.focus();
        return false;
    }

    if(password == '' || password.length <= 5){
        alert('Preencha o campo com sua senha');
        formCadastro.senha.focus();
        return false;
    }

}