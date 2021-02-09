<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="">{{ site('site.name') }}</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
    <a href="#">{{ strtoupper(substr(site('site.name'), 0, 2)) }}</a>
  </div>
  <ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-columns"></i> <span>Dashboard</span></a></li>
    <li class="{{ request()->routeIs('category.*') ? 'active' : '' }}"><a href="{{ route('category.index') }}"><i class="fas fa-table"></i> <span>Kategori</span></a></li>
    <li class="{{ request()->routeIs('product*') ? 'active' : '' }}"><a href="{{ route('product.index') }}"><i class="fas fa-store"></i> <span>Produk</span></a></li>
    <li class="{{ request()->routeIs('review.*') ? 'active' : '' }}"><a href="{{ route('review.index') }}"><i class="fas fa-star"></i> <span>Review</span></a></li>
    <li class="menu-header">Pesanan</li>
    <li class="{{ request()->routeIs('order.*') ? 'active' : '' }}"><a href="{{ route('order.index') }}"><i class="fas fa-list"></i> <span>Pesanan</span></a></li>
    <li class="menu-header">Setelan</li>
    <li class="{{ request()->routeIs('page.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('page.index') }}"><i class="fas fa-pager"></i> <span>Halaman</span></a></li>
    <li class="{{ request()->routeIs('slider.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('slider.index') }}"><i class="fas fa-chalkboard"></i> <span>Slider</span></a></li>
    <li class="{{ request()->routeIs('admin.contact') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.contact') }}"><i class="fas fa-phone-alt"></i> <span>Kontak</span></a></li>
    <li class="{{ request()->routeIs('socmed') ? 'active' : '' }}"><a class="nav-link" href="{{ route('socmed') }}"><i class="fab fa-facebook-square"></i> <span>Sosial Media</span></a></li>
    <li class="{{ request()->routeIs('settings*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('settings.index') }}"><i class="fas fa-cogs"></i> <span>Website</span></a></li>
  </ul>
</aside>
