<!-- Dashboard -->
<li class="menu-item {{ Request::is('home') ? 'active':'' }}">
    <a href="{{ route('home') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-home-circle"></i>
    <div data-i18n="Dashboard">Dashboard</div>
    </a>
</li>

<!-- Layouts -->

<li class="menu-header small text-uppercase">
    <span class="menu-header-text">Master</span>
</li>
<li class="menu-item {{ Request::is('users*') ? 'active':'' }}">
    <a href="{{ route('users.index') }}" class="menu-link ">
    <i class="menu-icon tf-icons bx bxs-user-account"></i>
    <div data-i18n="Users">Users</div>
    </a>
</li>
<li class="menu-item {{ Request::is('supplier*') ? 'active':'' }}">
    <a href="{{ route('supplier.index') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-user-voice"></i>
    <div data-i18n="Supplier">Supplier</div>
    </a>
</li>
<li class="menu-item {{ Request::is('karyawan*') ? 'active':'' }}">
    <a href="{{ route('karyawan.index') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-user"></i>
    <div data-i18n="Karyawan">Karyawan</div>
    </a>
</li>
<li class="menu-item {{ Request::is('customer*') ? 'active':'' }}">
    <a href="{{ route('customer.index') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bxs-user-detail"></i>
    <div data-i18n="Customer">Customer</div>
    </a>
</li>
<li class="menu-item {{ Request::is('bank-pembayaran*') ? 'active':'' }}">
    <a href="{{ route('bank-pembayaran.index') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-credit-card"></i>
    <div data-i18n="Bank Pembayaran">Bank Pembayaran</div>
    </a>
</li>
<li class="menu-item {{ Request::is('outlet*') ? 'active':'' }}">
    <a href="{{ route('outlet.index') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-store-alt"></i>
    <div data-i18n="Outlet">Outlet</div>
    </a>
</li>

<li class="menu-item">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
    <i class="menu-icon tf-icons bx bx-box"></i>
    <div data-i18n="Authentications">Produk</div>
    </a>
    <ul class="menu-sub">
    <li class="menu-item {{ Request::is('satuan*') ? 'active':'' }}">
        <a href="{{ route('satuan.index') }}" class="menu-link">
        <div data-i18n="Satuan Produk">Satuan Produk</div>
        </a>
    </li>
    <li class="menu-item {{ Request::is('kategori*') ? 'active':'' }}">
        <a href="{{{ route('kategori.index') }}}" class="menu-link">
        <div data-i18n="Kategori Produk">Kategori Produk</div>
        </a>
    </li>
    <li class="menu-item {{ Request::is('produk*') ? 'active':'' }}">
        <a href="{{ route('produk.index') }}" class="menu-link">
        <div data-i18n="Produk">Produk</div>
        </a>
    </li>
    <li class="menu-item {{ Request::is('master-stok*') ? 'active':'' }}">
        <a href="{{ route('master-stok.index') }}" class="menu-link">
        <div data-i18n="Master Stok">Master Stok</div>
        </a>
    </li>
    </ul>
</li>

<!-- PURCHASE -->
<li class="menu-header small text-uppercase"><span class="menu-header-text">Purchase</span></li>
<li class="menu-item">
    <a href="{{ route('transaksi-pembelian.index') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bxs-cart-add"></i>
    <div data-i18n="Basic">Pembelian</div>
    </a>
</li>
<li class="menu-item">
    <a href="cards-basic.html" class="menu-link">
    <i class="menu-icon tf-icons bx bx-archive-out"></i>
    <div data-i18n="Basic">Pengeluaran</div>
    </a>
</li>

<!-- SALES -->
<li class="menu-header small text-uppercase"><span class="menu-header-text">Sales</span></li>
<li class="menu-item">
    <a href="cards-basic.html" class="menu-link">
    <i class="menu-icon tf-icons bx bx-cart"></i>
    <div data-i18n="Basic">Penjualan</div>
    </a>
</li>

<!-- Other -->
<li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
<li class="menu-item">
    <a href="javascript:void(0)" class="menu-link menu-toggle">
    <i class="menu-icon tf-icons bx bxs-report"></i>
    <div data-i18n="User interface">Laporan</div>
    </a>
    <ul class="menu-sub">
    <li class="menu-item">
        <a href="auth-login-basic.html" class="menu-link" target="_blank">
        <div data-i18n="Basic">Laporan Penjualan</div>
        </a>
    </li>
    <li class="menu-item">
        <a href="auth-register-basic.html" class="menu-link" target="_blank">
        <div data-i18n="Basic">Laporan Pembelian</div>
        </a>
    </li>
    <li class="menu-item">
        <a href="auth-forgot-password-basic.html" class="menu-link" target="_blank">
        <div data-i18n="Basic">Laporan Pengeluaran</div>
        </a>
    </li>
    <li class="menu-item">
        <a href="auth-forgot-password-basic.html" class="menu-link" target="_blank">
        <div data-i18n="Basic">Laporan Stok</div>
        </a>
    </li>
    </ul>
</li>
<li class="menu-item">
    <a href="javascript:void(0)" class="menu-link ">
    <i class="menu-icon tf-icons bx bx-money"></i>
    <div data-i18n="User interface">Pembayaran</div>
    </a>
</li>