let currentStep = 1;

function nextStep() {
    // Validate current step before moving to next
    const currentStepElement = document.getElementById(`step${currentStep}`);
    const inputs = currentStepElement.querySelectorAll('input:required');
    
    for (let input of inputs) {
        if (!input.checkValidity()) {
            input.reportValidity();
            return false;
        }
    }

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
    const mealCountInput = document.getElementById('meal-count');
    let currentCount = parseInt(mealCountInput.value);
    
    // Ensure meal count stays between 2 and 6
    currentCount = Math.max(2, Math.min(6, currentCount + change));
    mealCountInput.value = currentCount;
}

// Add click event listeners to radio button labels to toggle active state
document.addEventListener('DOMContentLoaded', () => {
    const radioLabels = document.querySelectorAll('label.btn');
    
    radioLabels.forEach(label => {
        label.addEventListener('click', () => {
            // Remove active class from all labels in the same group
            const siblingLabels = label.closest('.button-group').querySelectorAll('label.btn');
            siblingLabels.forEach(sibling => sibling.classList.remove('active'));
            
            // Add active class to clicked label
            label.classList.add('active');
        });
    });
});