<?php
function process_form() {
    $num1 = $_POST['num1'] ?? '';
    $num2 = $_POST['num2'] ?? '';
    $op = $_POST['operation'] ?? '';

    if (!is_numeric($num1) || !is_numeric($num2)) {
        print "Both inputs must be numeric.<br>";
        return;
    }

    switch ($op) {
        case 'add':
            $result = $num1 + $num2;
            $symbol = '+';
            break;
        case 'sub':
            $result = $num1 - $num2;
            $symbol = '-';
            break;
        case 'mul':
            $result = $num1 * $num2;
            $symbol = '*';
            break;
        case 'div':
            if ($num2 == 0) {
                print "Cannot divide by zero.<br>";
                return;
            }
            $result = $num1 / $num2;
            $symbol = '/';
            break;
        default:
            print "Invalid operation selected.<br>";
            return;
    }

    print "$num1 $symbol $num2 = $result<br>";
}
?>

<form method="POST">
    Operand 1: <input type="text" name="num1"><br>
    Operand 2: <input type="text" name="num2"><br>
    Operation:
    <select name="operation">
        <option value="add">Addition (+)</option>
        <option value="sub">Subtraction (-)</option>
        <option value="mul">Multiplication (*)</option>
        <option value="div">Division (/)</option>
    </select><br>
    <input type="submit" value="Calculate">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    process_form();
}
?>
