<x-app-layout>
    @section('title', 'Create Skill')
    @section('subtitle', 'Add a new skill to the system')

    <x-breadcrumb :items="[
        ['label' => 'Skills', 'url' => route('skills.index')],
        ['label' => 'Create']
    ]" />

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0 fw-semibold">
                        <i class="bi bi-star me-2"></i>Skill Information
                    </h5>
                </div>
                <div class="card-body p-4">
                    @include('skills.partials.form', [
                        'action' => route('skills.store'),
                        'method' => 'POST'
                    ])
                </div>
            </div>

            <div class="card border-0 shadow-sm mt-3">
                <div class="card-body">
                    <h6 class="fw-semibold mb-3">
                        <i class="bi bi-info-circle me-2"></i>Guidelines
                    </h6>
                    <ul class="small text-muted mb-0">
                        <li>Skill name must be unique</li>
                        <li>Use clear and specific skill names</li>
                        <li>Examples: PHP, Laravel, JavaScript, Project Management</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
