document.addEventListener('DOMContentLoaded', function() {
    const departmentFilter = document.getElementById('department-filter');
    const resetFilter = document.getElementById('reset-filter');
    const tableBody = document.getElementById('employees-table-body');
    const filterStatus = document.getElementById('filter-status');

    if (!departmentFilter) return;

    departmentFilter.addEventListener('change', function() {
        const departmentId = this.value;
        filterEmployees(departmentId);
    });

    if (resetFilter) {
        resetFilter.addEventListener('click', function() {
            departmentFilter.value = '';
            filterEmployees('');
        });
    }

    function filterEmployees(departmentId) {
        AjaxHelpers.showLoading();

        const url = departmentId 
            ? `/employees/filter/department?department_id=${departmentId}`
            : '/employees/filter/department';

        axios.get(url)
            .then(response => {
                updateTable(response.data.employees);
                updateFilterStatus(departmentId);
                AjaxHelpers.hideLoading();
            })
            .catch(error => {
                AjaxHelpers.handleError(error);
            });
    }

    function updateTable(employees) {
        if (!tableBody) return;

        if (employees.length === 0) {
            tableBody.innerHTML = `
                <tr>
                    <td colspan="6" class="text-center py-5">
                        <div class="text-muted">
                            <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                            <p class="mb-0">No employees found</p>
                        </div>
                    </td>
                </tr>
            `;
            return;
        }

        let html = '';
        employees.forEach((employee, index) => {
            const skillsHtml = employee.skills && employee.skills.length > 0
                ? employee.skills.slice(0, 3).map(skill => 
                    `<span class="badge bg-info">${skill.name}</span>`
                  ).join(' ') + 
                  (employee.skills.length > 3 ? `<span class="badge bg-secondary">+${employee.skills.length - 3}</span>` : '')
                : '<span class="text-muted small">No skills</span>';

            html += `
                <tr>
                    <td class="text-muted">${index + 1}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                <i class="bi bi-person-fill text-primary"></i>
                            </div>
                            <div>
                                <div class="fw-semibold">${employee.first_name} ${employee.last_name}</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <i class="bi bi-envelope me-1 text-muted"></i>
                        ${employee.email}
                    </td>
                    <td>
                        <span class="badge bg-success">
                            ${employee.department.name}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex flex-wrap gap-1">
                            ${skillsHtml}
                        </div>
                    </td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group">
                            <a href="/employees/${employee.id}" class="btn btn-outline-info" title="View">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="/employees/${employee.id}/edit" class="btn btn-outline-primary" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form method="POST" action="/employees/${employee.id}" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this employee?');">
                                <input type="hidden" name="_token" value="${document.querySelector('meta[name="csrf-token"]').content}">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-outline-danger" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            `;
        });

        tableBody.innerHTML = html;
    }

    function updateFilterStatus(departmentId) {
        if (!filterStatus) return;

        if (departmentId) {
            const selectedOption = departmentFilter.options[departmentFilter.selectedIndex];
            filterStatus.innerHTML = `<i class="bi bi-funnel-fill me-1"></i>Filtered by: <strong>${selectedOption.text}</strong>`;
        } else {
            filterStatus.innerHTML = '<i class="bi bi-list-ul me-1"></i>Showing all employees';
        }
    }
});
