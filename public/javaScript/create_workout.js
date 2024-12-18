document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('workout-form');
    const steps = form.querySelectorAll('.form-step');
    const nextButtons = form.querySelectorAll('.btn-next');
    const workoutDaysDisplay = document.getElementById('workout-days');
    const workoutDaysInput = document.getElementById('workout-days-input');
    const menuToggle = document.querySelector('.menu-toggle');
    const navMenu = document.querySelector('.nav-menu');
  
    let currentStep = 0;
    let workoutDays = 2;
  
    // Number selector functionality
    const decreaseBtn = form.querySelector('.decrease');
    const increaseBtn = form.querySelector('.increase');
  
    function updateWorkoutDays(value) {
      workoutDays = value;
      workoutDaysDisplay.textContent = workoutDays;
      workoutDaysInput.value = workoutDays;
    }
  
    decreaseBtn.addEventListener('click', () => {
      if (workoutDays > 2) {
        updateWorkoutDays(workoutDays - 1);
      }
    });
  
    increaseBtn.addEventListener('click', () => {
      if (workoutDays < 6) {
        updateWorkoutDays(workoutDays + 1);
      }
    });
  
    // Intensity selector
    const intensityButtons = form.querySelectorAll('.intensity-btn');
    intensityButtons.forEach(button => {
      button.addEventListener('click', function() {
        intensityButtons.forEach(btn => {
          btn.classList.remove('active');
          btn.querySelector('input[type="radio"]').checked = false;
        });
        this.classList.add('active');
        this.querySelector('input[type="radio"]').checked = true;
      });
    });
  
    // Objective selector
    const objectiveButtons = form.querySelectorAll('.objective-btn');
    objectiveButtons.forEach(button => {
      button.addEventListener('click', function() {
        objectiveButtons.forEach(btn => {
          btn.classList.remove('active');
          btn.querySelector('input[type="radio"]').checked = false;
        });
        this.classList.add('active');
        this.querySelector('input[type="radio"]').checked = true;
      });
    });
  
    // Next step buttons
    nextButtons.forEach(button => {
      button.addEventListener('click', function() {
        const nextStepNumber = this.getAttribute('data-next-step');
        goToStep(parseInt(nextStepNumber) - 1);
      });
    });
  
    // Step navigation
    function goToStep(stepIndex) {
      try {
        // Validate current step before moving
        if (!validateCurrentStep()) return;
  
        // Hide current step
        steps[currentStep].classList.remove('active');
  
        // Show next step
        steps[stepIndex].classList.add('active');
  
        // Update progress indicator
        updateProgressIndicator(stepIndex);
  
        currentStep = stepIndex;
      } catch (error) {
        console.error('Error navigating to step:', error);
      }
    }
  
    // Progress indicator update
    function updateProgressIndicator(currentStepIndex) {
      const stepIndicators = document.querySelectorAll('.progress-indicator .step');
      stepIndicators.forEach((step, index) => {
        if (index < currentStepIndex) {
          step.classList.add('completed');
        } else if (index === currentStepIndex) {
          step.classList.remove('completed');
        }
      });
    }
  
    // Step validation
    function validateCurrentStep() {
      try {
        switch (currentStep) {
          case 0: // Workout Days - always valid
            return true;
          case 1: // Intensity
            const activeIntensity = form.querySelector('input[name="workout_intensity"]:checked');
            if (!activeIntensity) {
              alert('Please select an intensity level');
              return false;
            }
            return true;
          case 2: // Objective
            const activeObjective = form.querySelector('input[name="workout_objective"]:checked');
            if (!activeObjective) {
              alert('Please select a fitness objective');
              return false;
            }
            return true;
          default:
            return false;
        }
      } catch (error) {
        console.error('Error validating current step:', error);
        return false;
      }
    }
  
    // Mobile menu toggle
    menuToggle.addEventListener('click', function() {
      navMenu.classList.toggle('active');
    });
  
    // Prevent form submission if validation fails
    form.addEventListener('submit', function(event) {
      try {
        if (!validateCurrentStep()) {
          event.preventDefault();
        }
      } catch (error) {
        console.error('Error handling form submission:', error);
        event.preventDefault();
      }
    });
  
    // Initial setup - show first step
    steps[0].classList.add('active');
  });