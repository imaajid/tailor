<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{url('/')}}" class="sidebar-brand">
            Darzi.<span>PK</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{ url('/admin') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">Manage</li>
            <li class="nav-item">
                <a href="{{ url('/admin/roles') }}" class="nav-link">
                    <i class="link-icon" data-feather="shield"></i>
                    <span class="link-title">Roles</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/permissions') }}" class="nav-link">
                    <i class="link-icon" data-feather="unlock"></i>
                    <span class="link-title">Permissions</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/users') }}" class="nav-link">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/categories') }}" class="nav-link">
                    <i class="link-icon" data-feather="tag"></i>
                    <span class="link-title">Categories</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/products') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Products</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/collections') }}" class="nav-link">
                    <i class="link-icon" data-feather="shopping-bag"></i>
                    <span class="link-title">Collections</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/bookings') }}" class="nav-link">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Bookings</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/items') }}" class="nav-link">
                    <i class="link-icon" data-feather="clipboard"></i>
                    <span class="link-title">Items</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/product-types') }}" class="nav-link">
                    <i class="link-icon" data-feather="type"></i>
                    <span class="link-title">Product Types</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/product-menus') }}" class="nav-link">
                    <i class="link-icon" data-feather="menu"></i>
                    <span class="link-title">Product Menus</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/businesses') }}" class="nav-link">
                    <img src="{{asset('images/icons/shop.png')}}" alt="">
                    <span class="link-title">Businesses</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/brands') }}" class="nav-link">
                    <i class="link-icon" data-feather="bold"></i>
                    <span class="link-title">Brands</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/reviews') }}" class="nav-link">
                    <i class="link-icon" data-feather="star"></i>
                    <span class="link-title">Reviews</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
<nav class="settings-sidebar">
    <div class="sidebar-body">
        <a href="#" class="settings-sidebar-toggler">
            <i data-feather="settings"></i>
        </a>
        <h6 class="text-muted">Sidebar:</h6>
        <div class="form-group border-bottom">
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight"
                           value="sidebar-light" checked>
                    Light
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark"
                           value="sidebar-dark">
                    Dark
                </label>
            </div>
        </div>
    </div>
</nav>
