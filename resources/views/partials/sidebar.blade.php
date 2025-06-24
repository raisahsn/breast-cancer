<!-- Judul -->
<div class="offcanvas-header text-center w-100">
    <h5 class="title-bold" id="sidebarMenuLabel">
        Breast Cancer<br>
        <span class="title-light">Prediction</span>
    </h5>
</div>

<!-- Akun -->
<div class="dropdown w-100">
    <a href="#" class="d-flex align-items-center text-decoration-none gap-2" data-bs-toggle="dropdown"
        aria-expanded="false">
        <i class="bi bi-person-circle" style="font-size: 1.5rem; color: cornflowerblue;"></i>
        <span class="fw-semibold">nama account</span>
    </a>
    <ul class="dropdown-menu">
        <li><button class="dropdown-item" type="button">Logout</button></li>
    </ul>
</div>


<!-- Menu Navigasi -->
<div class="offcanvas-body w-100">
    <ul class="nav flex-column nav-pills">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('prediction') ? 'active' : '' }}" aria-current="page"
                href="{{ route('prediction') }}"><i class="bi bi-graph-up-arrow me-2"></i>Prediction</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('document') || request()->routeIs('documents') || request()->routeIs('download') ? 'active' : '' }}"
                href="{{ route('document') }}">
                <i class="bi bi-folder2-open me-2"></i>Document
            </a>

        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('account') ? 'active' : '' }}" href="{{ route('account') }}"><i
                    class="bi bi-people me-2"></i>Accounts</a>
        </li>
    </ul>
</div>
