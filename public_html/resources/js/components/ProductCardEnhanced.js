// Enhanced Product Card with Modern Features
export class ProductCardEnhanced {
    constructor() {
        this.init();
    }

    init() {
        this.setupLazyLoading();
        this.setupQuickView();
        this.setupHoverEffects();
        this.setupWishlistAnimation();
    }

    setupLazyLoading() {
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;

                        // Create a temporary image to load
                        const tempImg = new Image();
                        tempImg.src = img.dataset.src;

                        tempImg.onload = () => {
                            img.src = img.dataset.src;
                            img.classList.add('loaded');
                            img.style.opacity = '1';
                        };

                        observer.unobserve(img);
                    }
                });
            }, {
                rootMargin: '50px 0px',
                threshold: 0.01
            });

            // Observe all images with data-src
            document.querySelectorAll('img[data-src]').forEach(img => {
                img.style.opacity = '0';
                img.style.transition = 'opacity 0.3s ease';
                imageObserver.observe(img);
            });
        } else {
            // Fallback for browsers without IntersectionObserver
            document.querySelectorAll('img[data-src]').forEach(img => {
                img.src = img.dataset.src;
            });
        }
    }

    setupQuickView() {
        document.querySelectorAll('.quick-view-icon').forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();

                // Add loading animation
                const icon = button.querySelector('i');
                if (icon) {
                    const originalClass = icon.className;
                    icon.className = 'fas fa-spinner fa-spin';

                    // Restore after modal opens
                    setTimeout(() => {
                        icon.className = originalClass;
                    }, 500);
                }
            });
        });
    }

    setupHoverEffects() {
        document.querySelectorAll('.product-card-modern').forEach(card => {
            const image = card.querySelector('.product-card-image');
            const overlay = card.querySelector('.product-overlay');

            if (image && overlay) {
                card.addEventListener('mouseenter', () => {
                    // Add subtle scale animation
                    requestAnimationFrame(() => {
                        image.style.transform = 'scale(1.1)';
                        overlay.style.opacity = '1';
                    });
                });

                card.addEventListener('mouseleave', () => {
                    requestAnimationFrame(() => {
                        image.style.transform = 'scale(1)';
                        overlay.style.opacity = '0';
                    });
                });
            }
        });
    }

    setupWishlistAnimation() {
        document.querySelectorAll('.wishlist-icon').forEach(button => {
            button.addEventListener('click', function(e) {
                const icon = this.querySelector('i');

                if (icon) {
                    // Add heart animation
                    icon.classList.add('animate-heart');

                    // Create floating heart
                    const heart = document.createElement('i');
                    heart.className = 'fas fa-heart floating-heart';
                    heart.style.cssText = `
                        position: absolute;
                        color: #e74c3c;
                        font-size: 20px;
                        pointer-events: none;
                        animation: floatUp 1s ease-out forwards;
                        left: ${e.clientX}px;
                        top: ${e.clientY}px;
                    `;

                    document.body.appendChild(heart);

                    // Remove after animation
                    setTimeout(() => {
                        heart.remove();
                        icon.classList.remove('animate-heart');
                    }, 1000);
                }
            });
        });
    }

    // Method to refresh lazy loading for dynamically added products
    refreshLazyLoading() {
        this.setupLazyLoading();
    }

    // Method to add new product card with animation
    addProductCard(cardElement, container) {
        cardElement.style.opacity = '0';
        cardElement.style.transform = 'translateY(30px)';

        container.appendChild(cardElement);

        requestAnimationFrame(() => {
            cardElement.style.transition = 'all 0.5s ease';
            cardElement.style.opacity = '1';
            cardElement.style.transform = 'translateY(0)';
        });

        this.refreshLazyLoading();
    }
}

// Add required CSS animations
const style = document.createElement('style');
style.textContent = `
    @keyframes floatUp {
        0% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
        100% {
            opacity: 0;
            transform: translateY(-100px) scale(1.5);
        }
    }

    @keyframes heartBeat {
        0%, 100% { transform: scale(1); }
        25% { transform: scale(1.3); }
        50% { transform: scale(1.1); }
    }

    .animate-heart {
        animation: heartBeat 0.5s ease;
    }

    .product-card-image.loaded {
        opacity: 1 !important;
    }
`;
document.head.appendChild(style);

// Auto-initialize
document.addEventListener('DOMContentLoaded', () => {
    window.productCardEnhanced = new ProductCardEnhanced();
});

export default ProductCardEnhanced;
