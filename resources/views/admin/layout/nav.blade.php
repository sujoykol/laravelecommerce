<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item menu-open">
        <a href="{{ route('admin.dashboard')}}" class="nav-link active">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>

      </li>
      <li class="nav-item">
        <a href="{{ url('admin/category') }}" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Category

          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('admin/products') }}" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Product

          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('admin/coupons') }}" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Coupon
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('admin/reviews') }}" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Product Review

          </p>
        </a>
      </li>


      <li class="nav-item">
        <a href="{{ url('admin/sliders') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Sliders</p>
          </a>

      </li>

      <li class="nav-item">
        <a href="{{ url('admin/banners') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Brands</p>
          </a>

      </li>




      <li class="nav-item">
        <a href="{{ url('admin/pages') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Pages</p>
          </a>

      </li>
      <li class="nav-item">
        <a href="{{ url('admin/orders') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Orders</p>
          </a>

      </li>

      <li class="nav-item">
        <a href="{{ url('admin/payment-settings')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Payment  Setting</p>
          </a>

      </li>

      <li class="nav-item">
        <a href="{{ url('admin/shipping')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Shipping  Setting</p>
          </a>

      </li>

      <li class="nav-item">
        <a href="{{ url('admin/settings') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Site Setting</p>
          </a>

      </li>
      <li class="nav-item">
        <a href="{{ route('admin.setting')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Change Password</p>
          </a>

      </li>

      <li class="nav-item">
        <a href="{{ route('admin.logout') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Logout</p>
          </a>

      </li>

    </ul>
  </nav>
