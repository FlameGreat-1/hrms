const AjaxHelpers = {
    showLoading() {
        const indicator = document.getElementById('loading-indicator');
        if (indicator) {
            indicator.classList.remove('d-none');
        }
    },

    hideLoading() {
        const indicator = document.getElementById('loading-indicator');
        if (indicator) {
            indicator.classList.add('d-none');
        }
    },

    showError(message) {
        const alertHtml = `
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `;
        const container = document.querySelector('main .container-fluid') || document.querySelector('main');
        if (container) {
            container.insertAdjacentHTML('afterbegin', alertHtml);
        }
    },

    showSuccess(message) {
        const alertHtml = `
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `;
        const container = document.querySelector('main .container-fluid') || document.querySelector('main');
        if (container) {
            container.insertAdjacentHTML('afterbegin', alertHtml);
        }
    },

    handleError(error) {
        this.hideLoading();
        
        if (error.response) {
            if (error.response.status === 422) {
                const errors = error.response.data.errors;
                let errorMessage = 'Validation errors:<ul class="mb-0 mt-2">';
                for (let field in errors) {
                    errorMessage += `<li>${errors[field][0]}</li>`;
                }
                errorMessage += '</ul>';
                this.showError(errorMessage);
            } else {
                this.showError(error.response.data.message || 'An error occurred');
            }
        } else {
            this.showError('Network error. Please check your connection.');
        }
    }
};

window.AjaxHelpers = AjaxHelpers;
