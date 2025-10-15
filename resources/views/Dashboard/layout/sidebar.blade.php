<!-- ======= Start Sidebar ======= -->
<section class="sidebar open">
    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
        <!-- زر إغلاق السايدبار -->
        <button id="closeSidebarBtn">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <!-- اللوجو -->
        <div class="img-log">
            <img src="{{ asset('Dashboard/assets/image/default-car.png') }}" alt="" />
        </div>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}">
                <i class="fas fa-users"></i>
                <span>المستخدمين</span>
            </a>
        </li>


        <!-- قسم المنتجات -->
        <li class="nav-item dropdown">
            <a href="#productsSubmenu" data-bs-toggle="collapse" class="nav-link align-middle" aria-expanded="false">
                <i class="fa-solid fa-box-open ico"></i>
                <span>{{ __('dashboard.products') }}</span>
            </a>
            <ul class="collapse nav flex-column ms-1" id="productsSubmenu" data-bs-parent="#menu">
                <li class="w-100">
                    <a href="{{ url('/producttable') }}" class="nav-link px-0">
                        <i class="fa-solid fa-cube"></i>
                        <span>كل المنتجات</span>
                    </a>
                </li>
                <li class="w-100">
                    <a href="{{ url('/addproduct') }}" class="nav-link px-0">
                        <i class="fa-solid fa-plus"></i>
                        <span>إضافة منتج</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- قسم الأقسام -->
        <li class="nav-item dropdown">
            <a href="#categoriesSubmenu" data-bs-toggle="collapse" class="nav-link align-middle" aria-expanded="false">
                <i class="fa-solid fa-tags ico"></i>
                <span>{{ __('dashboard.categories') }}</span>
            </a>
            <ul class="collapse nav flex-column ms-1" id="categoriesSubmenu" data-bs-parent="#menu">
                <li class="w-100">
                    <a href="{{ url('/categorytable') }}" class="nav-link px-0">
                        <i class="fa-solid fa-layer-group"></i>
                        <span>كل الأقسام</span>
                    </a>
                </li>
                <li class="w-100">
                    <a href="{{ url('/addcategory') }}" class="nav-link px-0">
                        <i class="fa-solid fa-plus"></i>
                        <span>إضافة قسم</span>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</section>
<!-- ======= End Sidebar ======= -->
