const ValidationHelpers = {
    validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(String(email).toLowerCase());
    },

    validateRequired(value) {
        return value !== null && value !== undefined && value.trim() !== '';
    },

    showFieldError(fieldName, message) {
        const field = document.querySelector(`[name="${fieldName}"]`);
        if (field) {
            field.classList.add('is-invalid');
            
            let feedback = field.parentElement.querySelector('.invalid-feedback');
            if (!feedback) {
                feedback = document.createElement('div');
                feedback.className = 'invalid-feedback d-block';
                field.parentElement.appendChild(feedback);
            }
            feedback.textContent = message;
        }
    },

    clearFieldError(fieldName) {
        const field = document.querySelector(`[name="${fieldName}"]`);
        if (field) {
            field.classList.remove('is-invalid');
            const feedback = field.parentElement.querySelector('.invalid-feedback');
            if (feedback) {
                feedback.remove();
            }
        }
    },

    clearAllErrors() {
        document.querySelectorAll('.is-invalid').forEach(field => {
            field.classList.remove('is-invalid');
        });
        document.querySelectorAll('.invalid-feedback').forEach(feedback => {
            feedback.remove();
        });
    },

    checkEmailAvailability(email, employeeId = null) {
        return axios.post('/employees/check-email', {
            email: email,
            employee_id: employeeId
        });
    }
};

window.ValidationHelpers = ValidationHelpers;
