@extends('layouts.master')
@section('content')
<style>
/* Blog Page Modern Styles */
.blog-modern {
    padding: var(--space-10) 0;
    background: var(--surface-0);
    min-height: 60vh;
}

.page-header-modern {
    background: var(--surface-1);
    padding: var(--space-8) 0;
    margin-bottom: var(--space-8);
    border-bottom: 1px solid var(--surface-2);
}

.page-header-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 var(--space-4);
}

.breadcrumb-modern {
    display: flex;
    gap: var(--space-2);
    flex-wrap: wrap;
    margin-bottom: var(--space-3);
    font-size: 0.875rem;
}

.breadcrumb-modern a {
    color: var(--text-secondary);
    text-decoration: none;
    transition: color 0.2s;
}

.breadcrumb-modern a:hover {
    color: var(--color-primary);
}

.breadcrumb-modern span {
    color: var(--text-tertiary);
}

.page-title-modern {
    font-size: clamp(1.75rem, 4vw, 2.5rem);
    font-weight: 700;
    color: var(--text-primary);
    margin: 0;
}

.blog-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 var(--space-4);
    display: grid;
    grid-template-columns: 1fr 320px;
    gap: var(--space-8);
}

.blog-main {
    min-width: 0;
}

.blog-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: var(--space-6);
    margin-bottom: var(--space-8);
}

.blog-card {
    background: var(--surface-1);
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-md);
    border: 2px solid var(--surface-2);
    transition: all 0.3s;
    display: flex;
    flex-direction: column;
}

.blog-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-xl);
    border-color: var(--color-primary);
}

.blog-image-wrapper {
    position: relative;
    width: 100%;
    padding-top: 66.67%;
    background: var(--surface-0);
    overflow: hidden;
}

.blog-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.blog-date-badge {
    position: absolute;
    top: var(--space-3);
    right: var(--space-3);
    background: var(--color-primary);
    color: var(--surface-0);
    padding: var(--space-2) var(--space-3);
    border-radius: var(--radius-md);
    font-size: 0.75rem;
    font-weight: 700;
}

[dir="rtl"] .blog-date-badge {
    right: auto;
    left: var(--space-3);
}

.blog-content {
    padding: var(--space-5);
    flex: 1;
    display: flex;
    flex-direction: column;
}

.blog-category {
    display: inline-block;
    background: var(--surface-2);
    color: var(--text-secondary);
    padding: var(--space-1) var(--space-3);
    border-radius: 999px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    margin-bottom: var(--space-3);
}

.blog-title {
    font-size: 1.125rem;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0 0 var(--space-3) 0;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.blog-title a {
    color: var(--text-primary);
    text-decoration: none;
    transition: color 0.2s;
}

.blog-title a:hover {
    color: var(--color-primary);
}

.blog-description {
    font-size: 0.875rem;
    color: var(--text-secondary);
    line-height: 1.6;
    margin-bottom: var(--space-4);
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    flex: 1;
}

.blog-read-more {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    color: var(--color-primary);
    text-decoration: none;
    font-weight: 600;
    font-size: 0.875rem;
    transition: gap 0.2s;
}

.blog-read-more:hover {
    gap: var(--space-3);
}

.blog-sidebar {
    position: sticky;
    top: var(--space-6);
    align-self: start;
}

.sidebar-section {
    background: var(--surface-1);
    border-radius: var(--radius-lg);
    padding: var(--space-6);
    margin-bottom: var(--space-6);
    box-shadow: var(--shadow-md);
}

.sidebar-title {
    font-size: 1.125rem;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0 0 var(--space-4) 0;
}

.category-link {
    display: flex;
    align-items: center;
    gap: var(--space-3);
    padding: var(--space-3);
    border-radius: var(--radius-md);
    text-decoration: none;
    color: var(--text-primary);
    transition: all 0.2s;
    margin-bottom: var(--space-2);
}

.category-link:hover {
    background: var(--surface-2);
    color: var(--color-primary);
}

.category-image {
    width: 48px;
    height: 48px;
    border-radius: var(--radius-md);
    object-fit: cover;
}

.category-name {
    font-weight: 600;
}

.featured-post {
    display: flex;
    gap: var(--space-3);
    margin-bottom: var(--space-4);
    padding-bottom: var(--space-4);
    border-bottom: 1px solid var(--surface-2);
}

.featured-post:last-child {
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: none;
}

.featured-image {
    width: 80px;
    height: 80px;
    border-radius: var(--radius-md);
    object-fit: cover;
    flex-shrink: 0;
}

.featured-content {
    flex: 1;
    min-width: 0;
}

.featured-title {
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--text-primary);
    margin: 0 0 var(--space-2) 0;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.featured-date {
    font-size: 0.75rem;
    color: var(--text-tertiary);
    display: flex;
    align-items: center;
    gap: var(--space-1);
}

.social-links {
    display: flex;
    gap: var(--space-3);
    flex-wrap: wrap;
}

.social-link {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: all 0.2s;
    font-size: 1.125rem;
}

.social-link:hover {
    transform: translateY(-2px);
}

.social-facebook {
    background: #1877F2;
    color: white;
}

.social-twitter {
    background: #1DA1F2;
    color: white;
}

.social-instagram {
    background: linear-gradient(45deg, #F58529, #DD2A7B, #8134AF);
    color: white;
}

.social-linkedin {
    background: #0A66C2;
    color: white;
}

.social-google {
    background: #EA4335;
    color: white;
}

.blog-pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: var(--space-4);
    margin-top: var(--space-8);
}

.pagination-info {
    font-size: 0.875rem;
    color: var(--text-secondary);
}

.btn-load-more {
    padding: var(--space-3) var(--space-8);
    background: var(--color-primary);
    color: var(--surface-0);
    border: none;
    border-radius: 999px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s;
}

.btn-load-more:hover:not(:disabled) {
    background: var(--color-primary-dark);
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.btn-load-more:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

/* RTL Support */
[dir="rtl"] .blog-read-more {
    flex-direction: row-reverse;
}

@media (max-width: 992px) {
    .blog-container {
        grid-template-columns: 1fr;
    }

    .blog-sidebar {
        position: static;
    }

    .blog-grid {
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    }
}

@media (max-width: 768px) {
    .blog-grid {
        grid-template-columns: 1fr;
    }

    .page-header-modern {
        padding: var(--space-6) 0;
        margin-bottom: var(--space-6);
    }
}
</style>

<!-- Page Header -->
<div class="page-header-modern">
    <div class="page-header-content">
        <nav class="breadcrumb-modern">
            <a href="{{ url('/') }}">
                @if($data['direction'] === 'rtl')
                    الرئيسية
                @else
                    Home
                @endif
            </a>
            <span>›</span>
            <span>
                @if($data['direction'] === 'rtl')
                    المدونة
                @else
                    Blog
                @endif
            </span>
        </nav>
        <h1 class="page-title-modern">
            @if($data['direction'] === 'rtl')
                المدونة
            @else
                Blog
            @endif
        </h1>
    </div>
</div>

<!-- Blog Content -->
<section class="blog-modern">
    <div class="blog-container">
        <div class="blog-main">
            <div class="blog-grid blogs_div">
                <!-- Blog posts will be loaded here -->
            </div>

            <div class="blog-pagination">
                <!-- Pagination will be loaded here -->
            </div>
        </div>

        <aside class="blog-sidebar">
            <div class="sidebar-section">
                <h3 class="sidebar-title">
                    @if($data['direction'] === 'rtl')
                        التصنيفات
                    @else
                        Categories
                    @endif
                </h3>
                <div class="category-list">
                    <!-- Categories will be loaded here -->
                </div>
            </div>

            <div class="sidebar-section">
                <h3 class="sidebar-title">
                    @if($data['direction'] === 'rtl')
                        مقالات مميزة
                    @else
                        Featured Posts
                    @endif
                </h3>
                <div class="featured-blog">
                    <!-- Featured posts will be loaded here -->
                </div>
            </div>

            @if(isset(getSetting()['facebook_url']) || isset(getSetting()['twitter_url']) || isset(getSetting()['instagram_url']) || isset(getSetting()['linkedin_url']) || isset(getSetting()['google_url']))
            <div class="sidebar-section">
                <h3 class="sidebar-title">
                    @if($data['direction'] === 'rtl')
                        تابعنا
                    @else
                        Follow Us
                    @endif
                </h3>
                <div class="social-links">
                    @if(isset(getSetting()['facebook_url']) && !empty(getSetting()['facebook_url']))
                    <a href="{{ getSetting()['facebook_url'] }}" class="social-link social-facebook" target="_blank" rel="noopener">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    @endif
                    @if(isset(getSetting()['twitter_url']) && !empty(getSetting()['twitter_url']))
                    <a href="{{ getSetting()['twitter_url'] }}" class="social-link social-twitter" target="_blank" rel="noopener">
                        <i class="fab fa-twitter"></i>
                    </a>
                    @endif
                    @if(isset(getSetting()['instagram_url']) && !empty(getSetting()['instagram_url']))
                    <a href="{{ getSetting()['instagram_url'] }}" class="social-link social-instagram" target="_blank" rel="noopener">
                        <i class="fab fa-instagram"></i>
                    </a>
                    @endif
                    @if(isset(getSetting()['linkedin_url']) && !empty(getSetting()['linkedin_url']))
                    <a href="{{ getSetting()['linkedin_url'] }}" class="social-link social-linkedin" target="_blank" rel="noopener">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    @endif
                    @if(isset(getSetting()['google_url']) && !empty(getSetting()['google_url']))
                    <a href="{{ getSetting()['google_url'] }}" class="social-link social-google" target="_blank" rel="noopener">
                        <i class="fab fa-google"></i>
                    </a>
                    @endif
                </div>
            </div>
            @endif
        </aside>
    </div>
</section>

<!-- Blog Template -->
<template id="blog-template">
    <div class="blog-card">
        <div class="blog-image-wrapper">
            <span class="blog-date-badge blog-template-date"></span>
            <a href="" class="blog-template-image-link">
                <img class="blog-image blog-template-image" src="" alt="Blog post">
            </a>
        </div>
        <div class="blog-content">
            <span class="blog-category blog-template-category"></span>
            <h3 class="blog-title">
                <a class="blog-template-title" href=""></a>
            </h3>
            <p class="blog-description blog-template-description"></p>
            <a class="blog-read-more blog-template-readmore-link" href="">
                <span class="readmore-text"></span>
                <span>→</span>
            </a>
        </div>
    </div>
</template>

@endsection

@section('script')
<script>
const isRTL = "{{ $data['direction'] }}" === 'rtl';
let languageId = localStorage.getItem('languageId');

if (languageId == null || languageId == 'null') {
    localStorage.setItem("languageId", '1');
    languageId = 1;
}

$(document).ready(function() {
    fetchBlogs(1);
    fetchBlogCategories();
    fetchFeaturedBlogs();
});

function fetchBlogs(page) {
    const category = "{{ isset($_GET['category']) ? $_GET['category'] : '' }}";
    let url = "{{ url('') }}" + '/api/client/blog_news?limit=10&page=' + page + '&getGallaryDetail=1&getBlogCategory=1&language_id=' + languageId;

    if (category != "") {
        url += '&category_slug=' + category;
    }

    $.ajax({
        type: 'get',
        url: url,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
            clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
        },
        success: function(data) {
            if (data.status == 'Success') {
                if (data.meta.last_page < page) {
                    $('.load-more-products').attr('disabled', true);
                    $('.load-more-products').html(isRTL ? 'لا توجد مقالات أخرى' : 'No More Posts');
                    return;
                }

                const showingText = isRTL ? 'عرض من' : 'Showing';
                const ofText = isRTL ? 'من' : 'of';
                const resultsText = isRTL ? 'نتيجة' : 'results';

                let pagination = '<div class="pagination-info">' + showingText + ' ' + data.meta.to + ' ' + ofText + ' ' + data.meta.total + ' ' + resultsText + '</div>';

                const nextPage = parseInt(data.meta.current_page) + 1;
                pagination += '<button class="btn-load-more load-more-products" data-page="' + nextPage + '">';
                pagination += isRTL ? 'تحميل المزيد' : 'Load More';
                pagination += '</button>';

                $('.blog-pagination').html(pagination);

                const templ = document.getElementById("blog-template");
                for (let i = 0; i < data.data.length; i++) {
                    const clone = templ.content.cloneNode(true);

                    clone.querySelector(".blog-template-date").innerHTML = data.data[i].date;
                    clone.querySelector(".blog-template-image-link").setAttribute('href', '/blog-detail/' + data.data[i].slug);
                    clone.querySelector(".blog-template-readmore-link").setAttribute('href', '/blog-detail/' + data.data[i].slug);
                    clone.querySelector(".readmore-text").textContent = isRTL ? 'اقرأ المزيد' : 'Read More';

                    if (data.data[i].gallary != null) {
                        clone.querySelector(".blog-template-image").setAttribute('src', '/gallary/' + data.data[i].gallary.gallary_name);
                    }

                    if (data.data[i].category != null && data.data[i].category.blog_detail != null) {
                        clone.querySelector(".blog-template-category").innerHTML = data.data[i].category.blog_detail[0].name;
                    }

                    if (data.data[i].detail != null) {
                        clone.querySelector(".blog-template-title").innerHTML = data.data[i].detail[0].name;
                        clone.querySelector(".blog-template-title").setAttribute('href', '/blog-detail/' + data.data[i].slug);
                        clone.querySelector(".blog-template-description").innerHTML = data.data[i].detail[0].description;
                    }

                    $(".blogs_div").append(clone);
                }
            }
        },
        error: function(data) {}
    });
}

$(document).on('click', '.load-more-products', function() {
    const pageToLoad = $(this).attr('data-page');
    fetchBlogs(pageToLoad);
});

function fetchBlogCategories() {
    $.ajax({
        type: 'get',
        url: "{{ url('') }}" + '/api/client/blog_category?getGallaryDetail=1&language_id=' + languageId + '&getDetail=1',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
            clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
        },
        success: function(data) {
            if (data.status == 'Success') {
                let blogCategory = '';
                if (data.data.length > 0) {
                    for (let i = 0; i < data.data.length; i++) {
                        blogCategory += '<a class="category-link" href="/blog?category=' + data.data[i].blog_category_slug + '">';
                        blogCategory += '<img class="category-image" src="/gallary/' + data.data[i].blog_category_gallary_id.gallary_name + '" alt="' + data.data[i].blog_detail[0].name + '">';
                        blogCategory += '<span class="category-name">' + data.data[i].blog_detail[0].name + '</span>';
                        blogCategory += '</a>';
                    }
                } else {
                    blogCategory = '<p style="color: var(--text-tertiary); text-align: center;">' + (isRTL ? 'لا توجد تصنيفات' : 'No categories') + '</p>';
                }
                $('.category-list').html(blogCategory);
            }
        },
        error: function(data) {}
    });
}

function fetchFeaturedBlogs() {
    const url = "{{ url('') }}" + '/api/client/blog_news?limit=5&getGallaryDetail=1&getBlogCategory=1&is_featured=1&language_id=' + languageId;

    $.ajax({
        type: 'get',
        url: url,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
            clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
        },
        success: function(data) {
            if (data.status == 'Success') {
                let featuredBlogs = '';
                for (let i = 0; i < data.data.length; i++) {
                    featuredBlogs += '<div class="featured-post">';
                    featuredBlogs += '<img class="featured-image" src="/gallary/thumbnail' + data.data[i].gallary.gallary_name + '" alt="' + data.data[i].detail[0].name + '">';
                    featuredBlogs += '<div class="featured-content">';
                    featuredBlogs += '<h5 class="featured-title">' + data.data[i].detail[0].name + '</h5>';
                    featuredBlogs += '<div class="featured-date">';
                    featuredBlogs += '<i class="fa fa-calendar"></i>';
                    featuredBlogs += '<span>' + data.data[i].date + '</span>';
                    featuredBlogs += '</div>';
                    featuredBlogs += '</div>';
                    featuredBlogs += '</div>';
                }
                $('.featured-blog').html(featuredBlogs);
            }
        },
        error: function(data) {}
    });
}
</script>
@endsection
