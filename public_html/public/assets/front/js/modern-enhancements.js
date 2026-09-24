/**
 * Modern Enhancements JavaScript
 * Snus Egypt E-Commerce
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        initLazyLoading();
        initSmoothScroll();
        initBackToTop();
        initCartAnimations();
        initSearchEnhancements();
        initQuantityControls();
        enhanceProductCards();
        initNewsletterForm();
    });

    function initLazyLoading() {
        if ('loading' in HTMLImageElement.prototype) {
            const images = document.querySelectorAll('img[loading="lazy"]');
            images.forEach(img => {
                img.addEventListener('load', function() {
                    this.classList.add('loaded');
                });
            });
        } else {
            const images = document.querySelectorAll('img[data-src]');
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.add('loaded');
                        observer.unobserve(img);
                    }
                });
            });

            images.forEach(img => imageObserver.observe(img));
        }
    }

    function initSmoothScroll() {
        $('a[href^="#"]').on('click', function(e) {
            const target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 80
                }, 600, 'swing');
            }
        });
    }

    function initBackToTop() {
        const $backToTop = $('#back-to-top');

        $(window).on('scroll', function() {
            if ($(this).scrollTop() > 300) {
                $backToTop.fadeIn(300).css('display', 'flex');
            } else {
                $backToTop.fadeOut(300);
            }
        });

        $backToTop.on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({ scrollTop: 0 }, 600, 'swing');
        });
    }

    function initCartAnimations() {
        // Animate cart count on update
        const originalMenuCart = window.menuCart;
        if (originalMenuCart) {
            window.menuCart = function(cartSession) {
                originalMenuCart.call(this, cartSession);

                // Animate cart icon
                $('.total-menu-cart-product-count').each(function() {
                    $(this).addClass('animate-pulse');
                    setTimeout(() => {
                        $(this).removeClass('animate-pulse');
                    }, 600);
                });
            };
        }

        const style = document.createElement('style');
        style.textContent = `
            @keyframes pulse {
                0%, 100% { transform: scale(1); }
                50% { transform: scale(1.2); }
            }
            .animate-pulse {
                animation: pulse 0.6s ease-in-out;
            }
        `;
        document.head.appendChild(style);
    }

    function initSearchEnhancements() {
        const $searchInput = $('#search-input');
        let searchTimeout;

        $searchInput.on('input', function() {
            clearTimeout(searchTimeout);
            const query = $(this).val();

            if (query.length > 2) {
                searchTimeout = setTimeout(() => {
                    console.log('Search query:', query);
                }, 300);
            }
        });

        $searchInput.on('keypress', function(e) {
            if (e.which === 13) {
                e.preventDefault();
                $('#search_button').trigger('click');
            }
        });
    }

    function initQuantityControls() {
        $(document).on('click', '.quantity-plus, .quantity-right-plus', function(e) {
            e.preventDefault();
            const $input = $(this).siblings('input[type="number"]').length
                ? $(this).siblings('input[type="number"]')
                : $('#quantity-input');

            const currentVal = parseInt($input.val()) || 1;
            const max = parseInt($input.attr('max')) || 999;

            if (currentVal < max) {
                $input.val(currentVal + 1).trigger('change');
                animateQuantityChange($input);
            }
        });

        $(document).on('click', '.quantity-minus, .quantity-left-minus', function(e) {
            e.preventDefault();
            const $input = $(this).siblings('input[type="number"]').length
                ? $(this).siblings('input[type="number"]')
                : $('#quantity-input');

            const currentVal = parseInt($input.val()) || 1;
            const min = parseInt($input.attr('min')) || 1;

            if (currentVal > min) {
                $input.val(currentVal - 1).trigger('change');
                animateQuantityChange($input);
            }
        });

        function animateQuantityChange($input) {
            $input.addClass('quantity-changed');
            setTimeout(() => {
                $input.removeClass('quantity-changed');
            }, 300);
        }

        const style = document.createElement('style');
        style.textContent = `
            input.quantity-changed {
                animation: quantityChange 0.3s ease;
            }
            @keyframes quantityChange {
                0%, 100% { transform: scale(1); }
                50% { transform: scale(1.1); background-color: #fff3cd; }
            }
        `;
        document.head.appendChild(style);
    }

    function enhanceProductCards() {
        const originalAddToCart = window.addToCartFun;
        if (originalAddToCart) {
            window.addToCartFun = function(product_id, product_combination_id, cartSession, qty) {
                const $btn = $('[data-id="' + product_id + '"]').filter('.product-card-link, .add-to-card-bag');
                $btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i>');

                originalAddToCart.call(this, product_id, product_combination_id, cartSession, qty);

                setTimeout(() => {
                    $btn.prop('disabled', false).html('<i class="fas fa-shopping-cart"></i>');
                }, 1000);
            };
        }

        $(document).on('click', '.wishlist-icon, .wishlist-icon-2', function() {
            const $icon = $(this).find('i');
            $icon.removeClass('far').addClass('fas').css('color', '#ef4444');

            setTimeout(() => {
                $icon.css('color', '');
            }, 1000);
        });
    }

    function initNewsletterForm() {
        $('#newsletter').on('click', function(e) {
            e.preventDefault();

            const $email = $('#news_email');
            const $name = $('#news_name');
            const $btn = $(this);

            if (!$email.val() || !isValidEmail($email.val())) {
                toastr.error('يرجى إدخال بريد إلكتروني صحيح');
                $email.focus();
                return;
            }

            const originalText = $btn.html();
            $btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> جاري الاشتراك...');

            const url = window.location.origin + '/api/client/newslettercontact';

            $.ajax({
                type: 'post',
                url: url,
                data: {
                    name: $name.val() || 'User',
                    email: $email.val(),
                },
                headers: {
                    'Authorization': 'Bearer ' + (localStorage.getItem("customerToken") || ''),
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: $('meta[name="client-id"]').attr('content') || '',
                    clientsecret: $('meta[name="client-secret"]').attr('content') || '',
                },
                success: function(data) {
                    if (data.status == 'Success') {
                        toastr.success('تم الاشتراك بنجاح! شكراً لك');
                        $email.val('');
                        $name.val('');
                    } else {
                        toastr.error('حدث خطأ، يرجى المحاولة مرة أخرى');
                    }
                },
                error: function() {
                    toastr.error('حدث خطأ، يرجى المحاولة مرة أخرى');
                },
                complete: function() {
                    $btn.prop('disabled', false).html(originalText);
                }
            });
        });

        function isValidEmail(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }
    }

    $(document).on('click', '.mobile-menu-toggle', function() {
        $('.mobile-overlay').toggleClass('active');
        $('body').toggleClass('menu-open');
    });

    $('.mobile-overlay').on('click', function() {
        $(this).removeClass('active');
        $('body').removeClass('menu-open');
    });

    if (window.performance && window.performance.timing) {
        window.addEventListener('load', function() {
            setTimeout(() => {
                const perfData = window.performance.timing;
                const pageLoadTime = perfData.loadEventEnd - perfData.navigationStart;
                console.log('Page load time:', pageLoadTime + 'ms');
            }, 0);
        });
    }

    window.addEventListener('error', function(e) {
        console.error('JavaScript Error:', e.message);
    });

    if ('serviceWorker' in navigator) {
        let refreshing = false;
        navigator.serviceWorker.addEventListener('controllerchange', function () {
            if (refreshing) {
                return;
            }
            refreshing = true;
            window.location.reload();
        });

        window.addEventListener('load', () => {
            navigator.serviceWorker.register('/service-worker.js')
                .then(registration => {
                    console.log('SW registered:', registration);
                })
                .catch(error => {
                    console.log('SW registration failed:', error);
                });
        });
    }

})(jQuery);
