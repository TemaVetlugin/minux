<div class="p-3 text-bg-dark col-4 d-flex flex-column flex-shrink-0" style="width: 280px;">
    <a href="{{ route('admin.index') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi pe-none me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-4">Админ</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        
        
        <li>
            <a href="{{ route('admin.user.index') }}" class="nav-link text-white">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#speedometer2"></use>
                </svg>
                Пользователи
            </a>
        </li>
        <li>
            <a href="{{ route('admin.device.index') }}" class="nav-link text-white">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#speedometer2"></use>
                </svg>
                Устройства
            </a>
        </li>
        
    </ul>
    <hr>
    
</div>