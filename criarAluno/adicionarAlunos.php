<?php
    $msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $matricula = $_POST["matricula"];
    $email = $_POST["email"];
    $arqDisc = fopen("Alunos.txt","a") or die("Erro ao criar arquivo");
    $linha = "nome;idade;matricula;email\n";
    $linha = $nome . ";" . $idade . ";" . $matricula . ";" . $email . "\n";
    fwrite($arqDisc,$linha);
    fclose($arqDisc);
    $msg = "Aluno adicionado ao arquivo.";
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Criar Aluno</h1>
<form action="adicionarAlunos.php" method="POST">
    Nome: <input type="text" name="nome">
    <br><br>
    Idade: <input type="text" name="idade">
    <br><br>
    Matricula: <input type="text" name="matricula">
    <br><br>
    Email: <input type="text" name="email">
    <br><br>
    <input type="submit" value="Criar Aluno">
</form>
<p><?php echo $msg ?></p>
<br>
</body>
</html>