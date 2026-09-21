@extends('layouts.master')
@section('content')

{{-- Page Header --}}
<section class="page-header-modern">
    <div class="container">
        <div class="page-header-content">
            @if($data['direction'] === 'rtl')
                <h1 class="page-header-title">متجرنا</h1>
                <p class="page-header-description">استكشف مجموعتنا الواسعة من المنتجات الأصلية</p>
            @else
                <h1 class="page-header-title">Our Shop</h1>
                <p class="page-header-description">Explore our wide range of original products</p>
            @endif
            <nav class="breadcrumb-modern" aria-label="breadcrumb">
                <ol class="breadcrumb-list">
                    <li class="breadcrumb-item">
                        <a href="/">
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                            </svg>
                            <span>{{ $data['direction'] === 'rtl' ? 'الرئيسية' : 'Home' }}</span>
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        <span>{{ $data['direction'] === 'rtl' ? 'المتجر' : 'Shop' }}</span>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</section>

{{-- Shop Section --}}
<section class="shop-section-modern">
    <div class="container">
        <div class="shop-layout">
            {{-- Filters Sidebar --}}
            <aside class="shop-filters" id="shopFilters">
                <div class="filters-header">
                    <h3 class="filters-title">
                        {{ $data['direction'] === 'rtl' ? 'تصفية النتائج' : 'Filter Results' }}
                    </h3>
                    <button type="button" class="filters-close" id="closeFilters">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <div class="filters-body">
                    {{-- Categories Filter --}}
                    <div class="filter-group">
                        <h4 class="filter-group-title">
                            {{ $data['direction'] === 'rtl' ? 'التصنيفات' : 'Categories' }}
                        </h4>
                        <div class="filter-group-content" id="categoriesFilter">
                            {{-- Categories will be loaded dynamically --}}
                        </div>
                    </div>

                    {{-- Price Range Filter --}}
                    <div class="filter-group">
                        <h4 class="filter-group-title">
                            {{ $data['direction'] === 'rtl' ? 'نطاق السعر' : 'Price Range' }}
                        </h4>
                        <div class="filter-group-content">
                            <div class="price-range-inputs">
                                <input type="number" class="input-modern" id="minPrice" placeholder="{{ $data['direction'] === 'rtl' ? 'من' : 'Min' }}">
                                <span class="price-range-separator">-</span>
                                <input type="number" class="input-modern" id="maxPrice" placeholder="{{ $data['direction'] === 'rtl' ? 'إلى' : 'Max' }}">
                            </div>
                            <button type="button" class="btn-modern btn-modern-primary btn-modern-sm" id="applyPriceFilter">
                                {{ $data['direction'] === 'rtl' ? 'تطبيق' : 'Apply' }}
                            </button>
                        </div>
                    </div>

                    {{-- Availability Filter --}}
                    <div class="filter-group">
                        <h4 class="filter-group-title">
                            {{ $data['direction'] === 'rtl' ? 'التوفر' : 'Availability' }}
                        </h4>
                        <div class="filter-group-content">
                            <label class="filter-checkbox">
                                <input type="checkbox" id="inStockOnly">
                                <span class="filter-checkbox-label">
                                    {{ $data['direction'] === 'rtl' ? 'متوفر فقط' : 'In Stock Only' }}
                                </span>
                            </label>
                        </div>
                    </div>

                    {{-- Clear Filters --}}
                    <button type="button" class="btn-modern btn-modern-ghost btn-modern-sm" id="clearFilters">
                        {{ $data['direction'] === 'rtl' ? 'مسح الفلاتر' : 'Clear Filters' }}
                    </button>
                </div>
            </aside>

            {{-- Products Grid --}}
            <div class="shop-content">
                {{-- Toolbar --}}
                <div class="shop-toolbar">
                    <div class="toolbar-left">
                        <button type="button" class="btn-modern btn-modern-secondary btn-modern-sm" id="toggleFilters">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                            </svg>
                            <span>{{ $data['direction'] === 'rtl' ? 'الفلاتر' : 'Filters' }}</span>
                        </button>
                        <span class="products-count" id="productsCount">
                            {{ $data['direction'] === 'rtl' ? 'جاري التحميل...' : 'Loading...' }}
                        </span>
                    </div>

                    <div class="toolbar-right">
                        <div class="sort-dropdown">
                            <select class="input-modern" id="sortProducts">
                                <option value="default">{{ $data['direction'] === 'rtl' ? 'الترتيب الافتراضي' : 'Default Sorting' }}</option>
                                <option value="price-asc">{{ $data['direction'] === 'rtl' ? 'السعر: من الأقل للأعلى' : 'Price: Low to High' }}</option>
                                <option value="price-desc">{{ $data['direction'] === 'rtl' ? 'السعر: من الأعلى للأقل' : 'Price: High to Low' }}</option>
                                <option value="name-asc">{{ $data['direction'] === 'rtl' ? 'الاسم: أ-ي' : 'Name: A-Z' }}</option>
                                <option value="newest">{{ $data['direction'] === 'rtl' ? 'الأحدث' : 'Newest' }}</option>
                            </select>
                        </div>

                        <div class="view-toggle">
                            <button type="button" class="view-toggle-btn active" data-view="grid">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM13 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2h-2z"/>
                                </svg>
                            </button>
                            <button type="button" class="view-toggle-btn" data-view="list">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Products Grid --}}
                <div class="products-grid" id="productsGrid" data-view="grid">
                    {{-- Products will be loaded dynamically --}}
                    <div class="loading-state">
                        <div class="loading-spinner"></div>
                        <p>{{ $data['direction'] === 'rtl' ? 'جاري تحميل المنتجات...' : 'Loading products...' }}</p>
                    </div>
                </div>

                {{-- Pagination --}}
                <div class="pagination-modern" id="pagination">
                    {{-- Pagination will be loaded dynamically --}}
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Page Header */
.page-header-modern {
    padding: var(--space-16) 0 var(--space-12);
    background: linear-gradient(135deg, var(--bg-elevated) 0%, var(--bg-page) 100%);
    border-bottom: 1px solid rgba(0, 0, 0, 0.06);
}

.page-header-content {
    text-align: center;
}

.page-header-title {
    font-size: var(--text-4xl);
    font-weight: 800;
    color: var(--text-primary);
    margin-bottom: var(--space-4);
}

.page-header-description {
    font-size: var(--text-lg);
    color: var(--text-secondary);
    margin-bottom: var(--space-6);
}

.breadcrumb-modern {
    display: flex;
    justify-content: center;
}

.breadcrumb-list {
    display: flex;
    align-items: center;
    gap: var(--space-2);
    list-style: none;
    padding: 0;
    margin: 0;
}

.breadcrumb-item {
    display: flex;
    align-items: center;
    gap: var(--space-2);
}

.breadcrumb-item a {
    display: flex;
    align-items: center;
    gap: var(--space-2);
    color: var(--text-secondary);
    text-decoration: none;
    font-size: var(--text-sm);
    transition: color var(--transition-base);
}

.breadcrumb-item a:hover {
    color: var(--color-primary);
}

.breadcrumb-item.active span {
    color: var(--text-primary);
    font-weight: 600;
    font-size: var(--text-sm);
}

.breadcrumb-item:not(:last-child)::after {
    content: '/';
    color: var(--text-muted);
    margin-left: var(--space-2);
}

/* Shop Layout */
.shop-section-modern {
    padding: var(--space-16) 0;
}

.shop-layout {
    display: grid;
    grid-template-columns: 280px 1fr;
    gap: var(--space-8);
}

/* Filters Sidebar */
.shop-filters {
    background: var(--bg-elevated);
    border-radius: var(--radius-xl);
    padding: var(--space-6);
    height: fit-content;
    position: sticky;
    top: var(--space-6);
    box-shadow: var(--shadow-sm);
}

.filters-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: var(--space-6);
    padding-bottom: var(--space-4);
    border-bottom: 1px solid rgba(0, 0, 0, 0.06);
}

.filters-title {
    font-size: var(--text-lg);
    font-weight: 700;
    color: var(--text-primary);
    margin: 0;
}

.filters-close {
    display: none;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    background: transparent;
    border: none;
    color: var(--text-secondary);
    cursor: pointer;
    border-radius: var(--radius-md);
    transition: all var(--transition-base);
}

.filters-close:hover {
    background: var(--bg-hover);
    color: var(--text-primary);
}

.filters-body {
    display: flex;
    flex-direction: column;
    gap: var(--space-6);
}

.filter-group {
    padding-bottom: var(--space-6);
    border-bottom: 1px solid rgba(0, 0, 0, 0.06);
}

.filter-group:last-child {
    border-bottom: none;
    padding-bottom: 0;
}

.filter-group-title {
    font-size: var(--text-base);
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: var(--space-4);
}

.filter-group-content {
    display: flex;
    flex-direction: column;
    gap: var(--space-3);
}

.filter-checkbox {
    display: flex;
    align-items: center;
    gap: var(--space-3);
    cursor: pointer;
    font-size: var(--text-sm);
}

.filter-checkbox input[type="checkbox"] {
    width: 18px;
    height: 18px;
    cursor: pointer;
}

.price-range-inputs {
    display: flex;
    align-items: center;
    gap: var(--space-2);
}

.price-range-separator {
    color: var(--text-muted);
}

/* Shop Content */
.shop-content {
    display: flex;
    flex-direction: column;
    gap: var(--space-6);
}

.shop-toolbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: var(--space-5);
    background: var(--bg-elevated);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-sm);
    flex-wrap: wrap;
    gap: var(--space-4);
}

.toolbar-left {
    display: flex;
    align-items: center;
    gap: var(--space-4);
}

.toolbar-right {
    display: flex;
    align-items: center;
    gap: var(--space-4);
}

.products-count {
    font-size: var(--text-sm);
    color: var(--text-secondary);
}

.sort-dropdown select {
    min-width: 200px;
}

.view-toggle {
    display: flex;
    gap: var(--space-2);
    background: var(--bg-page);
    padding: var(--space-1);
    border-radius: var(--radius-lg);
}

.view-toggle-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    background: transparent;
    border: none;
    color: var(--text-secondary);
    cursor: pointer;
    border-radius: var(--radius-md);
    transition: all var(--transition-base);
}

.view-toggle-btn.active {
    background: var(--bg-elevated);
    color: var(--color-primary);
    box-shadow: var(--shadow-sm);
}

/* Products Grid */
.products-grid {
    display: grid;
    gap: var(--space-6);
}

.products-grid[data-view="grid"] {
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
}

.products-grid[data-view="list"] {
    grid-template-columns: 1fr;
}

.loading-state {
    grid-column: 1 / -1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: var(--space-20);
}

.loading-spinner {
    width: 48px;
    height: 48px;
    border: 4px solid var(--bg-hover);
    border-top-color: var(--color-primary);
    border-radius: 50%;
    animation: spin 0.8s linear infinite;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

/* Pagination */
.pagination-modern {
    display: flex;
    justify-content: center;
    gap: var(--space-2);
    padding: var(--space-8) 0;
}

.pagination-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 40px;
    height: 40px;
    padding: 0 var(--space-3);
    background: var(--bg-elevated);
    border: 1px solid rgba(0, 0, 0, 0.08);
    border-radius: var(--radius-md);
    color: var(--text-primary);
    font-weight: 600;
    text-decoration: none;
    transition: all var(--transition-base);
}

.pagination-btn:hover {
    background: var(--color-primary);
    color: white;
    border-color: var(--color-primary);
}

.pagination-btn.active {
    background: var(--color-primary);
    color: white;
    border-color: var(--color-primary);
}

/* Responsive */
@media (max-width: 1200px) {
    .shop-layout {
        grid-template-columns: 260px 1fr;
    }
}

@media (max-width: 992px) {
    .shop-layout {
        grid-template-columns: 1fr;
    }

    .shop-filters {
        position: fixed;
        top: 0;
        left: -100%;
        width: 320px;
        max-width: 90vw;
        height: 100vh;
        z-index: 1000;
        overflow-y: auto;
        transition: left var(--transition-base);
    }

    .shop-filters.show {
        left: 0;
    }

    [dir="rtl"] .shop-filters {
        left: auto;
        right: -100%;
    }

    [dir="rtl"] .shop-filters.show {
        right: 0;
    }

    .filters-close {
        display: flex;
    }

    .products-grid[data-view="grid"] {
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
    }
}

@media (max-width: 768px) {
    .page-header-title {
        font-size: var(--text-3xl);
    }

    .shop-toolbar {
        flex-direction: column;
        align-items: stretch;
    }

    .toolbar-left,
    .toolbar-right {
        width: 100%;
        justify-content: space-between;
    }

    .sort-dropdown select {
        min-width: auto;
        flex: 1;
    }

    .products-grid[data-view="grid"] {
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    }
}

@media (max-width: 576px) {
    .products-grid[data-view="grid"] {
        grid-template-columns: 1fr;
    }
}
</style>

@endsection

@section('script')
<script>
$(document).ready(function() {
    // Toggle filters on mobile
    $('#toggleFilters').click(function() {
        $('#shopFilters').addClass('show');
    });

    $('#closeFilters').click(function() {
        $('#shopFilters').removeClass('show');
    });

    // View toggle
    $('.view-toggle-btn').click(function() {
        $('.view-toggle-btn').removeClass('active');
        $(this).addClass('active');
        const view = $(this).data('view');
        $('#productsGrid').attr('data-view', view);
    });

    // Load products
    loadProducts();
    loadCategories();
});

function loadProducts() {
    var url = "{{ url('') }}" +
        '/api/client/products?limit=12&getCategory=1&getDetail=1&language_id=' + languageId +
        '&currency=' + localStorage.getItem("currency");

    $.ajax({
        type: 'get',
        url: url,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
            clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
        },
        success: function(data) {
            if (data.status == 'Success' && Array.isArray(data.data) && data.data.length) {
                renderProducts(data.data);
                $('#productsCount').text(data.data.length + ' {{ $data['direction'] === 'rtl' ? 'منتج' : 'products' }}');
            } else {
                $('#productsGrid').html('<div class="loading-state"><p>{{ $data['direction'] === 'rtl' ? 'لا توجد منتجات' : 'No products found' }}</p></div>');
            }
        },
        error: function() {
            $('#productsGrid').html('<div class="loading-state"><p>{{ $data['direction'] === 'rtl' ? 'حدث خطأ في تحميل المنتجات' : 'Error loading products' }}</p></div>');
        }
    });
}

function renderProducts(products) {
    let html = '';
    products.forEach((product, index) => {
        const image = product.product_gallary?.detail?.[0]?.gallary_path || '';
        const title = product.detail?.[0]?.title || '';
        const price = product.product_discount_price_symbol || product.product_price_symbol || '';
        const oldPrice = product.product_discount_price ? product.product_price_symbol : '';

        html += `
            <div class="product-card-modern">
                <div class="product-card-modern__image-wrapper">
                    <img src="${image}" alt="${title}" class="product-card-modern__image">
                    <div class="product-card-modern__actions">
                        <button class="product-action-btn" onclick="addWishlist(this)" data-id="${product.product_id}" data-type="${product.product_type}">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="product-card-modern__content">
                    <h3 class="product-card-modern__title">
                        <a href="/product/${product.product_id}/${product.product_slug}">${title}</a>
                    </h3>
                    <div class="product-card-modern__footer">
                        <div class="product-card-modern__price">
                            <span class="product-price-current">${price}</span>
                            ${oldPrice ? `<span class="product-price-old">${oldPrice}</span>` : ''}
                        </div>
                        <button class="product-card-modern__cart-btn" onclick="addToCart(this)" data-id="${product.product_id}" data-type="${product.product_type}" data-field="${index}">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        `;
    });

    $('#productsGrid').html(html);
}

function loadCategories() {
    var url = "{{ url('') }}" +
        '/api/client/category?getDetail=1&page=1&limit=20&language_id=' + languageId;

    $.ajax({
        type: 'get',
        url: url,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
            clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
        },
        success: function(data) {
            if (data.status == 'Success' && Array.isArray(data.data) && data.data.length) {
                let html = '';
                data.data.forEach(category => {
                    html += `
                        <label class="filter-checkbox">
                            <input type="checkbox" value="${category.id}" class="category-filter">
                            <span class="filter-checkbox-label">${category.name}</span>
                        </label>
                    `;
                });
                $('#categoriesFilter').html(html);
            }
        }
    });
}
</script>
@endsection
