<?php

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'chacara_eventos';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("erro" . $conn->connect_error);
}

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$tipo_evento = $_POST['tipo_evento'];
$data = $_POST['data'];
$num_pessoas = $_POST['num_pessoas'];
$mensagem = $_POST['mensagem'];


$stmt = $conn->prepare("INSERT INTO contatos (nome, email, telefone, tipo_evento, data, num_pessoas, mensagem) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssis", $nome, $email, $telefone, $tipo_evento, $data, $num_pessoas, $mensagem);

if ($stmt->execute()) {
    echo " formulario enviado";
} else {
    echo "Erro: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
