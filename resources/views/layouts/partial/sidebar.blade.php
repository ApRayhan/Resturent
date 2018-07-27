<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Creative Tim
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('admin/slider*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('slider.index') }}">
              <i class="material-icons">monochrome_photos</i>
              <p>Slider</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('admin/category*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('category.index') }}">
              <i class="material-icons">content_paste</i>
              <p>Category</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('admin/item*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('item.index') }}">
              <i class="material-icons">content_paste</i>
              <p>Items</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('admin/reservation*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('reservation') }}">
              <i class="material-icons">assignment</i>
              <p>Reservation</p>
            </a>
          </li>
          </li>
          <li class="nav-item {{ Request::is('admin/message*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('message.index') }}">
              <i class="material-icons">message</i>
              <p>Message</p>
            </a>
          </li>
          <!-- <li class="nav-item active-pro ">
                <a class="nav-link" href="./upgrade.html">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li> -->
        </ul>
      </div>
    </div>