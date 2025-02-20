<?php
class Calculadora {
    private float $num1;
    private float $num2;

    public function __construct(float $num1, float $num2) {
        $this->num1 = $num1;
        $this->num2 = $num2;
    }

    public function soma(): float {
        return $this->num1 + $this->num2;
    }

    public function subtracao(): float {
        return $this->num1 - $this->num2;
    }

    public function multiplicacao(): float {
        return $this->num1 * $this->num2;
    }

    public function divisao(): string {
        return ($this->num2 != 0) ? (string)($this->num1 / $this->num2) : "Erro: divisão por zero!";
    }
}

$resultado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = isset($_POST['num1']) ? (float)$_POST['num1'] : 0;
    $num2 = isset($_POST['num2']) ? (float)$_POST['num2'] : 0;
    $operacao = $_POST['operacao'] ?? '';

    $calculadora = new Calculadora($num1, $num2);

    if ($operacao == "soma") {
        $resultado = "Resultado: " . $calculadora->soma();
    } elseif ($operacao == "subtracao") {
        $resultado = "Resultado: " . $calculadora->subtracao();
    } elseif ($operacao == "multiplicacao") {
        $resultado = "Resultado: " . $calculadora->multiplicacao();
    } elseif ($operacao == "divisao") {
        $resultado = "Resultado: " . $calculadora->divisao();
    } else {
        $resultado = "Operação inválida.";
    }
    
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Simples</title>
</head>
<body>
    <h2>Calculadora</h2>
    <form method="post">
        <label for="num1">Número 1:</label>
        <input type="number" name="num1" required step="any"><br><br>

        <label for="num2">Número 2:</label>
        <input type="number" name="num2" required step="any"><br><br>

        <label>Operação:</label>
        <select name="operacao">
            <option value="soma">Soma</option>
            <option value="subtracao">Subtração</option>
            <option value="multiplicacao">Multiplicação</option>
            <option value="divisao">Divisão</option>
        </select><br><br>

        <button type="submit">Calcular</button>
    </form>

    <h3><?php echo $resultado; ?></h3>
</body>
</html>
