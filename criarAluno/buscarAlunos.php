<?php
        $nome = "";
        $idade = "";
		$matricula = "";
        $email = "";
        $encontrado = 0;
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
<h1>Buscar Aluno</h1>

<form action="buscarAlunos.php" method="POST">
    Matricula: <input type="text" name="busca">
    <br><br>
    <input type="submit" value="Buscar Aluno">
</form>
<br>
<table style = "width:30%">
<tr>
    <th>Nome</th>
    <th>Idade</th>
    <th>Matrícula</th>
    <th>Email</th>
</tr>
<?php
$x = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
    $busca = $_POST["busca"];
    while (!feof($arquivoAlunoIn)) {


    $linhas[] = fgets($arquivoAlunoIn);
	$colunaDados = explode(";", $linhas[$x]);
    $matricula = $colunaDados[2];

    if($matricula == $busca)
    {
		$nome = $colunaDados[0];
		$idade = $colunaDados[1];
        $email= $colunaDados[3]; 
        echo"<tr>";
        echo"<td>" . $nome ."</td>";
        echo "<td>". $idade. "</td>";
        echo"<td>" . $matricula . "</td>";
        echo "<td>" . $email . "</td>";
        $encontrado++;
    }
    $x++;
 } 
 fclose($arquivoAlunoIn);
 echo "Aluno(s) encontrado(s): ". $encontrado;
}
?>
</table>
</body>
</html>