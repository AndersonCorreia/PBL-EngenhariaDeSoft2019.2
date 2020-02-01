function verificacao(){
    var nome = document.getElementById("nome")
    var sobrenome = document.getElementById("sobrenome")
    var email = document.getElementById("emailCadastro")
    var cpf = document.getElementById("cpfCadastro")
    var senha1 = document.getElementById("senha1")
    var senha2 = document.getElementById("senha2")
    
    nome.style.backgroundColor = 'white'
    sobrenome.style.backgroundColor = 'white'
    email.style.backgroundColor = 'white'
    cpf.style.backgroundColor = 'white'
    senha1.style.backgroundColor = 'white'
    senha2.style.backgroundColor = 'white'
    
    if(nome.value == ""){
        alert("Insira um nome!")
        nome.style.backgroundColor = 'Salmon'
        return
    }
    if(sobrenome.value == ""){
        alert("Insira um sobrenome!")
        sobrenome.style.backgroundColor = 'Salmon'
        return
    }
    if(email.value == ""){
        alert("Insira um email!")
        email.style.backgroundColor = 'Salmon'
        return
    }
    if(cpf.value == ""){
        alert("Insira um cpf!")
        cpf.style.backgroundColor = 'Salmon'
        return
    }
    if(senha1.value == ""){
        alert("Insira uma senha!")
        senha1.style.backgroundColor = 'Salmon'
        return
    }
    if(senha1.value != senha2){
        alert("As senhas não conhecidem! Verifique e tente novamente.")
        senha1.style.backgroundColor = 'Salmon'
        senha2.style.backgroundColor = 'Salmon'
        return
    }
}