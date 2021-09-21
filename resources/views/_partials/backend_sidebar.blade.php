<div class="sidebar-wrapper">
    <div>
      <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light" src="{{asset('backend_assets/assets/images/logo/logo.png')}}" alt=""><img class="img-fluid for-dark" src="{{asset('backend_assets/assets/images/logo/logo_dark.png')}}" alt=""></a>
        <div class="back-btn"><i class="fa fa-angle-left"></i></div>
        <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
      </div>
      <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="{{asset('backend_assets/assets/images/logo/logo-icon.png')}}" alt=""></a></div>
      <nav class="sidebar-main">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div id="sidebar-menu">
          <ul class="sidebar-links" id="simple-bar">
            <li class="back-btn"><a href="index.html"><img class="img-fluid" src="{{asset('backend_assets/assets/images/logo/logo-icon.png')}}" alt=""></a>
              <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
            </li>
            <li class="sidebar-main-title">
              <div>
                <h6 class="lan-1">General</h6>
                <p class="lan-2">Dashboards,widgets & layout.</p>
              </div>
            </li>
            <li class="sidebar-list">
              <label class="badge badge-success">2</label><a class="sidebar-link sidebar-title" href="{{route('dashboard')}}"><i data-feather="home"></i><span class="lan-3">Dashboard              </span></a>
              <ul class="sidebar-submenu">
                <li><a class="lan-4" href="index.html">Default</a></li>
                <li><a class="lan-5" href="dashboard-02.html">Ecommerce</a></li>
              </ul>
            </li>
            <li class="sidebar-list">
              <label class="badge badge-danger">New</label><a class="sidebar-link sidebar-title" href="#"><i data-feather="box"></i><span>Category </span></a>
              <ul class="sidebar-submenu">
                <li><a href="{{route('categories.index')}}">Category List</a></li>
                <li><a href="{{route('categories.create')}}">Add Category</a></li>
              </ul>
            </li>
            <li class="sidebar-list">
              <label class="badge badge-danger">New</label><a class="sidebar-link sidebar-title" href="#"><i data-feather="box"></i><span>Sub Category </span></a>
              <ul class="sidebar-submenu">
                <li><a href="{{route('subCategories.index')}}">Sub Category List</a></li>
                <li><a href="{{route('subCategories.create')}}">Add SubCategory</a></li>
              </ul>
            </li>
            <li class="sidebar-list">
              <label class="badge badge-danger">New</label><a class="sidebar-link sidebar-title" href="#"><i data-feather="box"></i><span>Brand </span></a>
              <ul class="sidebar-submenu">
                <li><a href="{{route('brands.index')}}">Brands List</a></li>
                <li><a href="{{route('brands.create')}}">Add Brand</a></li>
              </ul>
            </li>
            <li class="sidebar-list">
              <label class="badge badge-danger">New</label><a class="sidebar-link sidebar-title" href="#"><i data-feather="box"></i><span>Product </span></a>
              <ul class="sidebar-submenu">
                <li><a href="{{route('products.index')}}">Products List</a></li>
                <li><a href="{{route('products.create')}}">Add Product</a></li>
              </ul>
            </li>
            <li class="sidebar-list">
              <label class="badge badge-danger">New</label><a class="sidebar-link sidebar-title" href="#"><i data-feather="box"></i><span>Setting </span></a>
              <ul class="sidebar-submenu">
                <li><a href="{{route('settings.create')}}">Add Setting</a></li>
              </ul>
            </li>
            <li class="sidebar-list">
              <label class="badge badge-danger">New</label><a class="sidebar-link sidebar-title" href="#"><i data-feather="box"></i><span>Social Icon </span></a>
              <ul class="sidebar-submenu">
                <li><a href="{{route('socialIcon.index')}}">SocialIcon List</a></li>
                <li><a href="{{route('socialIcon.create')}}">Add SocialIcon</a></li>
              </ul>
            </li>
            <li class="sidebar-list">
              <label class="badge badge-danger">New</label><a class="sidebar-link sidebar-title" href="#"><i data-feather="box"></i><span>SubsCription</span></a>
              <ul class="sidebar-submenu">
                <li><a href="{{route('subscribe.index')}}">Subscribe List</a></li>
              </ul>
            </li>
            <li class="sidebar-list">
              <label class="badge badge-danger">New</label><a class="sidebar-link sidebar-title" href="#"><i data-feather="box"></i><span>Review</span></a>
              <ul class="sidebar-submenu">
                <li><a href="{{route('reting.index')}}">Review List</a></li>
              </ul>
            </li>
            <li class="sidebar-list">
              <label class="badge badge-danger">New</label><a class="sidebar-link sidebar-title" href="#"><i data-feather="box"></i><span>Comment Reply</span></a>
              <ul class="sidebar-submenu">
                <li><a href="{{route('comments.index')}}">comments List</a></li>
                {{-- <li><a href="{{route('replies.create')}}">Add Reply</a></li> --}}
              </ul>
              <br><br>
            </li>
          </ul>
          <br><br>
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
      </nav>
    </div>
  </div>