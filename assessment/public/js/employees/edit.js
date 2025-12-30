document.addEventListener('DOMContentLoaded', function() {
    const skillsContainer = document.getElementById('skills-container');
    const addSkillBtn = document.getElementById('add-skill');
    const skillTemplate = document.getElementById('skill-template');
    const emailInput = document.querySelector('.email-input');
    const emailValidationMessage = document.getElementById('email-validation-message');
    const employeeId = emailInput ? emailInput.dataset.employeeId : null;

    if (addSkillBtn && skillTemplate && skillsContainer) {
        addSkillBtn.addEventListener('click', function() {
            const newSkill = skillTemplate.querySelector('.skill-item').cloneNode(true);
            skillsContainer.appendChild(newSkill);
            attachRemoveHandler(newSkill);
        });

        document.querySelectorAll('.remove-skill').forEach(btn => {
            attachRemoveHandler(btn.closest('.skill-item'));
        });
    }

    function attachRemoveHandler(skillItem) {
        const removeBtn = skillItem.querySelector('.remove-skill');
        if (removeBtn) {
            removeBtn.addEventListener('click', function() {
                if (skillsContainer.querySelectorAll('.skill-item').length > 1) {
                    skillItem.remove();
                } else {
                    const select = skillItem.querySelector('select');
                    if (select) select.value = '';
                }
            });
        }
    }

    if (emailInput) {
        let typingTimer;
        const doneTypingInterval = 500;

        emailInput.addEventListener('keyup', function() {
            clearTimeout(typingTimer);
            const email = this.value.trim();

            if (email.length > 0) {
                typingTimer = setTimeout(() => validateEmail(email), doneTypingInterval);
            } else {
                clearEmailValidation();
            }
        });

        emailInput.addEventListener('keydown', function() {
            clearTimeout(typingTimer);
        });
    }

    function validateEmail(email) {
        if (!ValidationHelpers.validateEmail(email)) {
            showEmailError('Please enter a valid email address');
            return;
        }

        axios.post('/employees/check-email', {
            email: email,
            employee_id: employeeId
        })
            .then(response => {
                if (response.data.available) {
                    showEmailSuccess('Email is available');
                } else {
                    showEmailError('This email is already registered');
                }
            })
            .catch(error => {
                console.error('Email validation error:', error);
            });
    }

    function showEmailError(message) {
        if (emailValidationMessage) {
            emailValidationMessage.innerHTML = `<i class="bi bi-x-circle-fill text-danger me-1"></i>${message}`;
            emailValidationMessage.className = 'small mb-3 text-danger';
        }
        if (emailInput) {
            emailInput.classList.add('is-invalid');
        }
    }

    function showEmailSuccess(message) {
        if (emailValidationMessage) {
            emailValidationMessage.innerHTML = `<i class="bi bi-check-circle-fill text-success me-1"></i>${message}`;
            emailValidationMessage.className = 'small mb-3 text-success';
        }
        if (emailInput) {
            emailInput.classList.remove('is-invalid');
            emailInput.classList.add('is-valid');
        }
    }

    function clearEmailValidation() {
        if (emailValidationMessage) {
            emailValidationMessage.innerHTML = '';
        }
        if (emailInput) {
            emailInput.classList.remove('is-invalid', 'is-valid');
        }
    }

    const form = document.getElementById('employee-form');
    if (form) {
        form.addEventListener('submit', function(e) {
            const skillSelects = skillsContainer.querySelectorAll('select[name="skills[]"]');
            
            skillSelects.forEach(select => {
                if (!select.value || select.value === '') {
                    select.closest('.skill-item').remove();
                }
            });
        });
    }
});