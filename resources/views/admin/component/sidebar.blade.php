
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8;" />
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" />
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" />
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
            <div class="sidebar-search-results">
                <div class="list-group">
                    <a href="#" class="list-group-item">
                        <div class="search-title">
                            <strong class="text-light"></strong>N<strong class="text-light"></strong>o<strong class="text-light"></strong> <strong class="text-light"></strong>e<strong class="text-light"></strong>l
                            <strong class="text-light"></strong>e<strong class="text-light"></strong>m<strong class="text-light"></strong>e<strong class="text-light"></strong>n<strong class="text-light"></strong>t
                            <strong class="text-light"></strong> <strong class="text-light"></strong>f<strong class="text-light"></strong>o<strong class="text-light"></strong>u<strong class="text-light"></strong>n
                            <strong class="text-light"></strong>d<strong class="text-light"></strong>!<strong class="text-light"></strong>
                        </div>
                        <div class="search-path"></div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-copy"></i>
                      <p>
                        Quản lý User
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none">
                        <li class="nav-item">
                            <a href="{{route('admin.user.index')}}" class="nav-link {{$path == 'user' ? 'active' : ''}}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-copy"></i>
                      <p>
                        Quản lý Bài viết
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none">
                        <li class="nav-item">
                            <a href="{{route('admin.category.index')}}" class="nav-link {{$path == 'category' ? 'active' : ''}}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Danh mục</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.post.index')}}" class="nav-link {{$path == 'post' ? 'active' : ''}}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Bài viết</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-copy"></i>
                      <p>
                        Quản lý Banner
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none">
                        <li class="nav-item">
                            <a href="{{route('admin.banner.index')}}" class="nav-link {{$path == 'banner' ? 'active' : ''}}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Banner</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-copy"></i>
                      <p>
                        Quản lý sản phẩm
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none">
                        <li class="nav-item">
                            <a href="{{route('admin.productcategories.index')}}" class="nav-link {{$path == 'productcategories' ? 'active' : ''}}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Danh mục sản phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.brand.index')}}" class="nav-link {{$path == 'brand' ? 'active' : ''}}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Thương hiệu sản phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.product.index')}}" class="nav-link {{$path == 'product' ? 'active' : ''}}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Sản phẩm</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>