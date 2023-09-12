<?php
    $nome = "";
    $idade = "";
	$matricula = "";
    $email = "";
    $arquivoAlunoIn = fopen("Alunos.txt", "r") or die("Erro ao abrir arquivo");
    $arqDisc = fopen("AlunosNOVO.txt","w") or die("Erro ao criar arquivo");
    $x = 0;
	$linhas[] = fgets($arquivoAlunoIn);
    $msg = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
    $procurar= $_POST["procurar"];

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
                $linha = "nome;idade;matricula;email\n";
                $linha = $nome . ";" . $idade . ";" . $matricula . ";" . $email . "\n";
                $msg = "Aluno Alterado.";
                fwrite($arqDisc,$linha);
               
            }
            else
            {
                $nome = $colunaDados[0];
			    $idade = $colunaDados[1];
                $email= $colunaDados[3];
                $linha = "nome;idade;matricula;email";
                $linha = $nome . ";" . $idade . ";" . $matricula . ";" . $email;
                fwrite($arqDisc,$linha);
            }
            $x++;
    }
    copy("alunosNOVO.txt","alunos.txt");
    fclose($arquivoAlunoIn);
    fclose($arqDisc);
    unlink('alunosNOVO.txt');
    
}

?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Alterar Aluno</h1>
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
<p><?php echo $msg ?></p>
</body>
</html>