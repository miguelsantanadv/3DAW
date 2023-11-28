<?php
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $sala = $_POST["sala"];

    $servidor = "localhost";
    $username = "root";
    $senha = "";
    $database = "DAW";
    $conn = new mysqli($servidor,$username,$senha,$database);
    if ($conn->connect_error) {
       die("Conexao falhou, avise o administrador do sistema");
    }
    $comandoSQL = "INSERT INTO `Fiscais` (nome,cpf,sala) values ('$nome','$cpf',$sala)";
    $resultado = $conn->query($comandoSQL);

    $retorno=json_encode($resultado);
    echo $retorno;
?>