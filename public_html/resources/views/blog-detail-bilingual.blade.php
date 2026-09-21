@extends('layouts.master')
@section('content')
<style>
/* Blog Detail Page Modern Styles */
.blog-detail-modern {
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
    line-height: 1.3;
}

.blog-detail-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 var(--space-4);
    display: grid;
    grid-template-columns: 1fr 320px;
    gap: var(--space-8);
}

.blog-detail-main {
    min-width: 0;
}

.blog-detail-card {
    background: var(--surface-1);
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-md);
    border: 2px solid var(--surface-2);
}

.blog-detail-image-wrapper {
    position: relative;
    width: 100%;
    padding-top: 56.25%;
    background: var(--surface-0);
    overflow: hidden;
}

.blog-detail-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.blog-date-badge {
    position: absolute;
    top: var(--space-4);
    right: var(--space-4);
    background: var(--color-primary);
    color: var(--surface-0);
    padding: var(--space-3) var(--space-4);
    border-radius: var(--radius-md);
    font-size: 0.875rem;
    font-weight: 700;
}

[dir="rtl"] .blog-date-badge {
    right: auto;
    left: var(--space-4);
}

.blog-detail-content {
    padding: var(--space-8);
}

.blog-detail-category {
    display: inline-block;
    background: var(--surface-2);
    color: var(--text-secondary);
    padding: var(--space-2) var(--space-4);
    border-radius: 999px;
    font-size: 0.875rem;
    font-weight: 600;
    text-transform: uppercase;
    margin-bottom: var(--space-4);
    text-decoration: none;
    transition: all 0.2s;
}

.blog-detail-category:hover {
    background: var(--color-primary);
    color: var(--surface-0);
}

.blog-detail-title {
    font-size: clamp(1.5rem, 3vw, 2rem);
    font-weight: 700;
    color: var(--text-primary);
    margin: 0 0 var(--space-6) 0;
    line-height: 1.3;
}

.blog-detail-description {
    font-size: 1rem;
    color: var(--text-primary);
    line-height: 1.8;
    margin: 0;
}

.blog-detail-description p {
    margin-bottom: var(--space-4);
}

.blog-detail-description h2,
.blog-detail-description h3,
.blog-detail-description h4 {
    margin: var(--space-6) 0 var(--space-3) 0;
    color: var(--text-primary);
}

.blog-detail-description ul,
.blog-detail-description ol {
    margin: var(--space-4) 0;
    padding-left: var(--space-6);
}

[dir="rtl"] .blog-detail-description ul,
[dir="rtl"] .blog-detail-description ol {
    padding-left: 0;
    padding-right: var(--space-6);
}

.blog-detail-description a {
    color: var(--color-primary);
    text-decoration: underline;
}

.blog-detail-description img {
    max-width: 100%;
    height: auto;
    border-radius: var(--radius-md);
    margin: var(--space-4) 0;
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

/* RTL Support */
[dir="rtl"] .breadcrumb-modern {
    direction: rtl;
}

@media (max-width: 992px) {
    .blog-detail-container {
        grid-template-columns: 1fr;
    }

    .blog-sidebar {
        position: static;
    }
}

@media (max-width: 768px) {
    .blog-detail-content {
        padding: var(--space-5);
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
            <a href="{{ url('/blog') }}">
                @if($data['direction'] === 'rtl')
                    المدونة
                @else
                    Blog
                @endif
            </a>
            <span>›</span>
            <span class="blog_name"></span>
        </nav>
        <h1 class="page-title-modern blog_name"></h1>
    </div>
</div>

<!-- Blog Detail Content -->
<section class="blog-detail-modern">
    <div class="blog-detail-container">
        <div class="blog-detail-main">
            <article class="blog-detail-card">
                <div class="blog-detail">
                    <!-- Content will be loaded here -->
                </div>
            </article>
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

@endsection

@section('script')
<script>
const isRTL = "{{ $data['direction'] }}" === 'rtl';
const slug = "{{ $slug }}";
let languageId = localStorage.getItem('languageId');

if (languageId == null || languageId == 'null') {
    localStorage.setItem("languageId", '1');
    languageId = 1;
}

$(document).ready(function() {
    fetchBlogs();
    fetchBlogCategories();
    fetchFeaturedBlogs();
});

function fetchBlogs() {
    $.ajax({
        type: 'get',
        url: "{{ url('') }}" + '/api/client/blog_news?slug=' + slug + '&language_id=' + languageId + '&getGallaryDetail=1&getBlogCategory=1',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
            clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
        },
        success: function(data) {
            if (data.status == 'Success' && data.data && data.data[0]) {
                const blog = data.data[0];
                const detail = blog.detail && blog.detail[0] ? blog.detail[0] : null;
                const category = blog.category && blog.category.blog_detail && blog.category.blog_detail[0] ? blog.category.blog_detail[0] : null;

                if (detail) {
                    $('.blog_name').html(detail.name);
                    $('#meta-title').attr('content', detail.name);
                    $('#meta-description').attr('content', detail.description);

                    let blogContent = '';
                    blogContent += '<div class="blog-detail-image-wrapper">';
                    blogContent += '<span class="blog-date-badge">' + blog.date + '</span>';
                    if (blog.gallary && blog.gallary.gallary_name) {
                        blogContent += '<img class="blog-detail-image" src="/gallary/' + blog.gallary.gallary_name + '" alt="' + detail.name + '">';
                    }
                    blogContent += '</div>';

                    blogContent += '<div class="blog-detail-content">';
                    if (category) {
                        blogContent += '<a href="/blog?category=' + blog.category.blog_category_slug + '" class="blog-detail-category">' + category.name + '</a>';
                    }
                    blogContent += '<h1 class="blog-detail-title">' + detail.name + '</h1>';
                    blogContent += '<div class="blog-detail-description">' + detail.description + '</div>';
                    blogContent += '</div>';

                    $('.blog-detail').html(blogContent);
                }
            } else {
                $('.blog-detail').html('<div class="blog-detail-content"><p>' + (isRTL ? 'المحتوى غير متوفر' : 'Content not available') + '</p></div>');
            }
        },
        error: function(data) {
            $('.blog-detail').html('<div class="blog-detail-content"><p>' + (isRTL ? 'حدث خطأ في تحميل المحتوى' : 'Error loading content') + '</p></div>');
        }
    });
}

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
                    featuredBlogs += '<img class="featured-image" src="/gallary/' + data.data[i].gallary.gallary_name + '" alt="' + data.data[i].detail[0].name + '">';
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
