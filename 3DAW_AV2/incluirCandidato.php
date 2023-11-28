<?php
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $identidade = $_POST["identidade"];
    $email = $_POST["email"];
    $cargo = $_POST["cargo"];
    $sala = $_POST["sala"];

    $servidor = "localhost";
    $username = "root";
    $senha = "";
    $database = "DAW";
    $conn = new mysqli($servidor,$username,$senha,$database);
    if ($conn->connect_error) {
       die("Conexao falhou, avise o administrador do sistema");
    }
    $comandoSQL = "INSERT INTO `Candidatos` (nome,cpf,identidade,email,cargo,sala) values ('$nome','$cpf','$identidade','$email','$cargo','$sala')";
    $resultado = $conn->query($comandoSQL);

    $retorno=json_encode($resultado);
    echo $retorno;
?>