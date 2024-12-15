<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymBro - Customize Diet</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <style>
        /* CSS Variables for Easy Theming */
        :root {
            --clr-primary-bg: #0E0E0E;
            --clr-secondary-bg: #282828;
            --clr-secondary-bg-light: #3C3C3C;
            --clr-light-white: #F9F9F9;
            --clr-blue-primary: #1677FF;
            --clr-blue-dark: #002E6F;
            --ff-primary: 'Poppins', sans-serif;
            --gradient-bg: radial-gradient(111.19% 141.42% at 100% 0%, #1677FF 0%, #002E6F 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--ff-primary);
            background-color: var(--clr-primary-bg);
            color: var(--clr-light-white);
            line-height: 1.6;
            background-image: url("../assets/images/BgForms.png");
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-wrapper {
            background: var(--gradient-bg);
            border-radius: 15px;
            padding: 30px;
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }

        .step-indicator {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 30px;
        }

        .step {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(22, 119, 255, 0.5);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 10px;
            font-weight: bold;
        }

        .step.active {
            background-color: var(--clr-blue-primary);
        }

        .line {
            width: 50px;
            height: 2px;
            background-color: white;
        }

        .form-section {
            display: none;
        }

        .form-section.active {
            display: block;
            animation: slideIn 0.5s ease;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateX(20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            margin-bottom: 10px;
            color: var(--clr-light-white);
        }

        .input-control {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: none;
            background-color: white;
        }

        .button-group {
            display: flex;
            gap: 15px;
        }

        .btn {
            flex: 1;
            padding: 12px;
            border-radius: 10px;
            background-color: var(--clr-secondary-bg);
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn.active {
            background-color: var(--clr-blue-primary);
        }

        .btn-next {
            background: linear-gradient(#09090A 80%, #868686 300%);
            color: white;
            width: 100%;
            margin-top: 20px;
        }

        .meal-counter {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            border-radius: 10px;
            padding: 10px;
        }

        .counter-btn {
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
        }

        @media (max-width: 480px) {
            .container {
                padding: 10px;
            }

            .form-wrapper {
                padding: 20px;
            }

            .step {
                width: 30px;
                height: 30px;
                margin: 0 5px;
            }

            .line {
                width: 30px;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="form-wrapper">
            <div class="step-indicator">
                <div class="step active">1</div>
                <div class="line"></div>
                <div class="step">2</div>
                <div class="line"></div>
                <div class="step">3</div>
            </div>

            <!-- Step 1: Basic Details -->
            <div id="step1" class="form-section active">
                <h2 class="form-title">Basic Details</h2>
                <div class="input-group">
                    <label>Height (cm)</label>
                    <input type="number" class="input-control" placeholder="Enter your height">
                </div>
                <div class="input-group">
                    <label>Current Weight (kg)</label>
                    <input type="number" class="input-control" placeholder="Enter current weight">
                </div>
                <div class="input-group">
                    <label>Ideal Weight (kg)</label>
                    <input type="number" class="input-control" placeholder="Enter ideal weight">
                </div>
                <div class="input-group">
                    <label>Age</label>
                    <input type="number" class="input-control" placeholder="Enter your age">
                </div>
                <button class="btn-next" onclick="nextStep()">Next</button>
            </div>

            <!-- Step 2: Nutrition -->
            <div id="step2" class="form-section">
                <h2 class="form-title">Nutrition</h2>
                <div class="input-group">
                    <label>Meals per Day</label>
                    <div class="meal-counter">
                        <button class="counter-btn" onclick="changeMealCount(-1)">-</button>
                        <span id="meal-count">2</span>
                        <button class="counter-btn" onclick="changeMealCount(1)">+</button>
                    </div>
                </div>
                <div class="input-group">
                    <label>Willing to Take Supplements</label>
                    <div class="button-group">
                        <button class="btn" onclick="selectSupplements(true)">Yes</button>
                        <button class="btn" onclick="selectSupplements(false)">No</button>
                    </div>
                </div>
                <button class="btn-next" onclick="nextStep()">Next</button>
            </div>

            <!-- Step 3: Fitness Goal -->
            <div id="step3" class="form-section">
                <h2 class="form-title">Fitness Goal</h2>
                <div class="input-group">
                    <label>Choose Your Goal</label>
                    <div class="button-group">
                        <button class="btn" onclick="selectGoal('bulk')">Bulk</button>
                        <button class="btn" onclick="selectGoal('cut')">Cut</button>
                        <button class="btn" onclick="selectGoal('healthy')">Stay Healthy</button>
                    </div>
                </div>
                <button class="btn-next" onclick="submitForm()">Submit</button>
            </div>
        </div>
    </div>

    <script>
        let currentStep = 1;
        let mealCount = 2;
        let supplements = null;
        let fitnessGoal = null;

        function nextStep() {
            if (currentStep < 3) {
                document.getElementById(`step${currentStep}`).classList.remove('active');
                currentStep++;
                document.getElementById(`step${currentStep}`).classList.add('active');
                updateStepIndicator();
            }
        }

        function updateStepIndicator() {
            const steps = document.querySelectorAll('.step');
            steps.forEach((step, index) => {
                if (index < currentStep) {
                    step.classList.add('active');
                } else {
                    step.classList.remove('active');
                }
            });
        }

        function changeMealCount(change) {
            mealCount = Math.max(2, Math.min(6, mealCount + change));
            document.getElementById('meal-count').textContent = mealCount;
        }

        function selectSupplements(choice) {
            supplements = choice;
            const buttons = document.querySelectorAll('#step2 .button-group .btn');
            buttons.forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');
        }

        function selectGoal(goal) {
            fitnessGoal = goal;
            const buttons = document.querySelectorAll('#step3 .button-group .btn');
            buttons.forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');
        }

        function submitForm() {
            // Collect form data
            const formData = {
                height: document.querySelector('#step1 input[type="number"]:nth-child(1)').value,
                currentWeight: document.querySelector('#step1 input[type="number"]:nth-child(2)').value,
                idealWeight: document.querySelector('#step1 input[type="number"]:nth-child(3)').value,
                age: document.querySelector('#step1 input[type="number"]:nth-child(4)').value,
                mealsPerDay: mealCount,
                supplements: supplements,
                fitnessGoal: fitnessGoal
            };

            // Validate form
            if (validateForm(formData)) {
                console.log('Form submitted:', formData);
                alert('Form submitted successfully!');
            }
        }

        function validateForm(data) {
            const requiredFields = ['height', 'currentWeight', 'idealWeight', 'age'];
            for (let field of requiredFields) {
                if (!data[field] || isNaN(data[field])) {
                    alert(`Please fill in ${field.replace(/([A-Z])/g, ' $1').toLowerCase()}`);
                    return false;
                }
            }

            if (supplements === null) {
                alert('Please select supplement preference');
                return false;
            }

            if (!fitnessGoal) {
                alert('Please select a fitness goal');
                return false;
            }

            return true;
        }
    </script>
</body>
</html>