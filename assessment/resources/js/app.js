import './bootstrap';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import $ from 'jquery';

window.$ = window.jQuery = $;

$(document).ready(function() {
    // Initialize Bootstrap tooltips
    $('[data-bs-toggle="tooltip"]').each(function() {
        new bootstrap.Tooltip(this);
    });

    // Auto-dismiss alerts after 5 seconds
    $('.alert-dismissible').each(function() {
        const alert = this;
        setTimeout(() => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 5000);
    });

    // Skills Management
    const $skillsContainer = $('#skills-container');
    const $addSkillBtn = $('#add-skill');
    const $skillTemplate = $('#skill-template');
    const $emailInput = $('.email-input');
    const $emailValidationMessage = $('#email-validation-message');

    if ($addSkillBtn.length && $skillTemplate.length && $skillsContainer.length) {
        $addSkillBtn.on('click', function() {
            const $newSkill = $skillTemplate.find('.skill-item').clone();
            $skillsContainer.append($newSkill);
            attachRemoveHandler($newSkill);
        });

        $('.remove-skill').each(function() {
            attachRemoveHandler($(this).closest('.skill-item'));
        });
    }

    function attachRemoveHandler($skillItem) {
        const $removeBtn = $skillItem.find('.remove-skill');
        if ($removeBtn.length) {
            $removeBtn.off('click').on('click', function() {
                if ($skillsContainer.find('.skill-item').length > 1) {
                    $skillItem.remove();
                } else {
                    $skillItem.find('select').val('');
                }
            });
        }
    }

    // jQuery-based Real-time Email Validation via AJAX
    if ($emailInput.length) {
        let typingTimer;
        const doneTypingInterval = 500;

        $emailInput.on('keyup', function() {
            clearTimeout(typingTimer);
            const email = $(this).val().trim();

            if (email.length > 0) {
                typingTimer = setTimeout(() => validateEmail(email), doneTypingInterval);
            } else {
                clearEmailValidation();
            }
        });

        $emailInput.on('keydown', function() {
            clearTimeout(typingTimer);
        });
    }

    function validateEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            showEmailError('Please enter a valid email address');
            return;
        }

        const employeeId = $emailInput.data('employee-id');

        // jQuery AJAX call for email uniqueness check
        $.ajax({
            url: '/employees/check-email',
            method: 'POST',
            data: {
                email: email,
                employee_id: employeeId,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.available) {
                    showEmailSuccess('Email is available');
                } else {
                    showEmailError('This email is already registered');
                }
            },
            error: function(xhr, status, error) {
                console.error('Email validation error:', error);
            }
        });
    }

    function showEmailError(message) {
        if ($emailValidationMessage.length) {
            $emailValidationMessage.html(`<i class="bi bi-x-circle-fill text-danger me-1"></i>${message}`);
            $emailValidationMessage.attr('class', 'small mb-3 text-danger');
        }
        $emailInput.addClass('is-invalid').removeClass('is-valid');
    }

    function showEmailSuccess(message) {
        if ($emailValidationMessage.length) {
            $emailValidationMessage.html(`<i class="bi bi-check-circle-fill text-success me-1"></i>${message}`);
            $emailValidationMessage.attr('class', 'small mb-3 text-success');
        }
        $emailInput.removeClass('is-invalid').addClass('is-valid');
    }

    function clearEmailValidation() {
        if ($emailValidationMessage.length) {
            $emailValidationMessage.html('');
        }
        $emailInput.removeClass('is-invalid is-valid');
    }

    // Form submission - remove empty skills
    const $form = $('#employee-form');
    if ($form.length) {
        $form.on('submit', function(e) {
            $skillsContainer.find('select[name="skills[]"]').each(function() {
                if (!$(this).val()) {
                    $(this).closest('.skill-item').remove();
                }
            });
        });
    }
});
