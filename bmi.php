<?php
class BMICalculator {
    private $weight;
    private $height;

    public function __construct($weight, $height) {
        $this->weight = $weight;
        $this->height = $height / 100; // Convert height from centimeters to meters
    }

    public function calculateBMI() {
        $bmi = $this->weight / ($this->height ** 2);
        return $bmi;
    }

    public function interpretBMI($bmi, $lang) {
        if ($bmi < 18.5) {
            return $lang === 'th' ? 'น้ำหนักน้อยกว่าเกณฑ์ (Underweight)' : 'Underweight';
        } else if ($bmi < 25) {
            return $lang === 'th' ? 'น้ำหนักปกติ (Normal weight)' : 'Normal weight';
        } else if ($bmi < 30) {
            return $lang === 'th' ? 'น้ำหนักมากกว่าปกติ (ท้วม) (Overweight)' : 'Overweight';
        } else {
            return $lang === 'th' ? 'อ้วน (Obese)' : 'Obese';
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $weight = isset($_POST['weight']) ? floatval($_POST['weight']) : 0;
    $height = isset($_POST['height']) ? floatval($_POST['height']) : 0;

    if ($weight <= 0 || $height <= 0) {
        echo 'Please enter valid weight and height values.';
        exit;
    }

    $calculator = new BMICalculator($weight, $height);
    $bmi = $calculator->calculateBMI();
    $classificationEN = $calculator->interpretBMI($bmi, 'en');
    $classificationTH = $calculator->interpretBMI($bmi, 'th');

    echo "BMI: " . number_format($bmi, 2) . "<br>";
    echo "Classification (English): " . $classificationEN . "<br>";
    echo "Classification (Thai): " . $classificationTH . "<br>";
}
?>
<!DOCTYPE html>
<html>
     <link rel="stylesheet" href="index.css">
<head>
     <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
    <div class="content">
    <title>BMI Calculator</title>
    <meta charset="UTF-8">
</head>
<body>
    <h1>BMI Calculator</h1>
    <form method="post" action="">
        <label for="weight">Weight (kg):</label>
        <input type="number" id="weight" name="weight" required><br><br>

        <label for="height">Height (cm):</label>
        <input type="number" id="height" name="height" required><br><br>

        <input type="submit" value="Calculate">
    </form>
</body>
</html>
