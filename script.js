class BMICalculator {
    constructor(weight, height) {
      this.weight = weight;
      this.height = height / 100; // Convert height from centimeters to meters
    }
  
    calculateBMI() {
      const bmi = this.weight / (this.height ** 2);
      return bmi;
    }
  
    interpretBMI(bmi, lang) {
      if (bmi < 18.5) {
        return lang === 'th' ? 'น้ำหนักน้อยกว่าเกณฑ์ (Underweight)' : 'Underweight';
      } else if (bmi < 25) {
        return lang === 'th' ? 'น้ำหนักปกติ (Normal weight)' : 'Normal weight';
      } else if (bmi < 30) {
        return lang === 'th' ? 'น้ำหนักมากกว่าปกติ (ท้วม) (Overweight)' : 'Overweight';
      } else {
        return lang === 'th' ? 'อ้วน (Obese)' : 'Obese';
      }
    }
  }
  
  function calculateBMI() {
    const weight = parseFloat(document.getElementById('weight').value);
    const height = parseFloat(document.getElementById('height').value);
  
    if (isNaN(weight) || isNaN(height)) {
      alert('Please enter valid weight and height values.');
      return;
    }
  
    const calculator = new BMICalculator(weight, height);
    const bmi = calculator.calculateBMI();

  
    const resultDiv = document.getElementById('result');
    resultDiv.innerHTML = `
      <p>BMI: ${bmi.toFixed(2)}</p>
      <p>Classification:</p>
      <ul>
        <li>English: ${calculator.interpretBMI(bmi, 'en')}</li>
        <li>Thai: ${calculator.interpretBMI(bmi, 'th')}</li>
      </ul>
    `;
  }
  