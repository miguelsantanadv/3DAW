<?php
    $nome = "";
    $idade = "";
	$matricula = "";
    $email = "";
    $arquivoAlunoIn = fopen("Alunos.txt", "r") or die("Erro ao abrir arquivo");
    $x = 0;
	$linhas[] = fgets($arquivoAlunoIn);
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<h1>Alunos:</h1>
<table style = "width:30%">
<tr>
    <th>Nome</th>
    <th>Idade</th>
    <th>Matrícula</th>
    <th>Email</th>
</tr>
<?php
$x = 0;
while (!feof($arquivoAlunoIn)) {
    		$linhas[] = fgets($arquivoAlunoIn);
			$colunaDados = explode(";", $linhas[$x]);
			$nome = $colunaDados[0];
			$idade = $colunaDados[1];
			$matricula = $colunaDados[2];
            $email= $colunaDados[3];
?>
<tr style="text-align: center";>
    <td><?php echo $nome ?></td>
    <td><?php echo $idade ?></td>
    <td><?php echo $matricula ?></td>
    <td><?php echo $email ?></td>
 <?php $x++;
 }
 ?>
</tr>
</table>
</body>
</html>