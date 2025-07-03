<!-- Judul -->
<div class="offcanvas-header text-center w-100">
    <h5 class="title-bold" id="sidebarMenuLabel">
        Breast Cancer<br>
        <span class="title-light">Prediction</span>
    </h5>
</div>

<!-- Menu Navigasi -->
<div class="offcanvas-body w-100">
    <ul class="nav flex-column nav-pills">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" aria-current="page"
                href="{{ route('dashboard') }}"><i class="bi bi-house me-2"></i>Dashboar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('prediction') ? 'active' : '' }}" aria-current="page"
                href="{{ route('prediction') }}"><i class="bi bi-graph-up-arrow me-2"></i>Prediction</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('document') ? 'active' : '' }}" aria-current="page"
                href="{{ route('document') }}">
                <i class="bi bi-box2-heart me-2"></i>Patients
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('training') ? 'active' : '' }}" aria-current="page"
                href="{{ route('training') }}">
                <i class="bi bi-arrow-down-square me-2"></i>Training
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('account') ? 'active' : '' }}" aria-current="page"
                href="{{ route('account.index') }}"><i class="bi bi-people me-2"></i>Account</a>
        </li>
    </ul>
</div>
