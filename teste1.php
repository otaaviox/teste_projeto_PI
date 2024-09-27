<?php
// Verifique se o formulário foi enviado corretamente
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];

    // Conectar ao banco de dados MySQL
    $servername = "SERVER"; // Nome do servidor (em ambiente local, geralmente é localhost)
    $username = "devweb";        // Nome de usuário do banco de dados
    $password = "$uporte22";            // Senha do banco de dados (geralmente vazio em servidores locais como XAMPP/WAMP)
    $dbname = "APOLA";      // Nome do banco de dados

    // Criar conexão com o MySQL
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar se a conexão foi bem-sucedida
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Criptografar a senha antes de salvar no banco de dados
    $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);

    // Criar a instrução SQL para inserir os dados no banco
    $sql = "INSERT INTO usuarios (nome, email, telefone, senha) VALUES ('$nome', '$email', '$telefone', '$senha_criptografada')";

    // Executar o SQL e verificar se foi bem-sucedido
    if ($conn->query($sql) === TRUE) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
}
?>
