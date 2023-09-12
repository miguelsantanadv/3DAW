<?php
    $nome = "";
    $idade = "";
	$matricula = "";
    $email = "";
    $arquivoAlunoIn = fopen("Alunos.txt", "r") or die("Erro ao abrir arquivo");
    $arqDisc = fopen("AlunosNOVO.txt","w") or die("Erro ao criar arquivo");
    $x = 0;
    $msg = "";
    $linhas[] = fgets($arquivoAlunoIn);

    if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
    $procurar= $_POST["procurar"];

    while (!feof($arquivoAlunoIn)) {
    		$linhas[] = fgets($arquivoAlunoIn);
			$colunaDados = explode(";", $linhas[$x]);
			$matricula = $colunaDados[2];

            if($procurar == $matricula)
            {
                $msg = "Aluno Excluído.";
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
<h1>Excluir Aluno</h1>
<form action="excluirAluno.php" method="POST">
    Matricula: <input type="text" name="procurar">

    <input type="submit" value="Excluir Aluno">
</form>
<p><?php echo $msg ?></p>
</body>
</html>