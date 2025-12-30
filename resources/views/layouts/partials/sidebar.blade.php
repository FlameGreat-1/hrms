<nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <i class="bi bi-speedometer2"></i>
                    Dashboard
                </a>
            </li>
            
            <li class="nav-item mt-3">
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                    <span class="small fw-bold">Management</span>
                </h6>
            </li>
            
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('employees.*') ? 'active' : '' }}" href="{{ route('employees.index') }}">
                    <i class="bi bi-people-fill"></i>
                    Employees
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('departments.*') ? 'active' : '' }}" href="{{ route('departments.index') }}">
                    <i class="bi bi-building"></i>
                    Departments
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('skills.*') ? 'active' : '' }}" href="{{ route('skills.index') }}">
                    <i class="bi bi-star-fill"></i>
                    Skills
                </a>
            </li>
        </ul>
    </div>
</nav>
