<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
    $procurar= $_POST["procurar"];
    }
    $nome = "";
    $idade = "";
	$matricula = "";
    $email = "";
    $arquivoAlunoIn = fopen("Alunos.txt", "r") or die("Erro ao abrir arquivo");
    $x = 0;
	$linhas[] = fgets($arquivoAlunoIn);

    while (!feof($arquivoAlunoIn)) {
    		$linhas[] = fgets($arquivoAlunoIn);
			$colunaDados = explode(";", $linhas[$x]);
			$matricula = $colunaDados[2];

            if($procurar == $matricula)
            {
                $nome = $_POST["novnome"];
                $matricula = $_POST["novmatricula"];
                $idade = $_POST["novidade"];
                $email = $_POST["novemail"];
                $arqDisc = fopen("AlunosNOVO.txt","a") or die("Erro ao criar arquivo");
                $linha = "nome;idade;matricula;email\n";
                $linha = $nome . ";" . $idade . ";" . $matricula . ";" . $email . "\n";
                fwrite($arqDisc,$linha);
                fclose($arqDisc);
                $msg = "Aluno Alterado.";
            }
            else
            {
                $nome = $colunaDados[0];
			    $idade = $colunaDados[1];
                $email= $colunaDados[3];
                $arqDisc = fopen("AlunosNOVO.txt","a") or die("Erro ao criar arquivo");
                $linha = "nome;idade;matricula;email\n";
                $linha = $nome . ";" . $idade . ";" . $matricula . ";" . $email;
                fwrite($arqDisc,$linha);
                fclose($arqDisc);
            }
            $x++;
    }

?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Criar Aluno</h1>
<form action="alterarAluno.php" method="POST">
    Matricula: <input type="text" name="procurar">
    <br><br>

    <h3>Insira os novos dados</h3>

    Nome: <input type="text" name="novnome">
    <br><br>
    Idade: <input type="text" name="novidade">
    <br><br>
    Matricula: <input type="text" name="novmatricula">
    <br><br>
    Email: <input type="text" name="novemail">
    <br><br>
    <input type="submit" value="Alterar Aluno">
</form>
</body>
</html>
