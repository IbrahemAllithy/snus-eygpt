/**
 * Modern Product Card Component
 * استخدام: import { ProductCard } from '@/components/ProductCard';
 */

export class ProductCard {
  constructor() {
    this.init();
  }

  init() {
    this.setupLazyLoading();
    this.setupHoverEffects();
    this.setupQuickActions();
  }

  // Lazy Loading للصور
  setupLazyLoading() {
    const images = document.querySelectorAll('img[data-src]');

    if ('IntersectionObserver' in window) {
      const imageObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            const img = entry.target;
            img.src = img.dataset.src;
            img.classList.add('loaded');
            imageObserver.unobserve(img);
          }
        });
      });

      images.forEach(img => imageObserver.observe(img));
    } else {
      // Fallback للمتصفحات القديمة
      images.forEach(img => {
        img.src = img.dataset.src;
      });
    }
  }

  // Hover Effects
  setupHoverEffects() {
    const cards = document.querySelectorAll('.product-card-modern');

    cards.forEach(card => {
      card.addEventListener('mouseenter', () => {
        card.style.transform = 'translateY(-8px)';
      });

      card.addEventListener('mouseleave', () => {
        card.style.transform = 'translateY(0)';
      });
    });
  }

  // Quick Actions (Wishlist, Compare, Quick View)
  setupQuickActions() {
    document.addEventListener('click', (e) => {
      if (e.target.closest('.action-wishlist')) {
        this.handleWishlist(e);
      } else if (e.target.closest('.action-compare')) {
        this.handleCompare(e);
      } else if (e.target.closest('.action-quick-view')) {
        this.handleQuickView(e);
      }
    });
  }

  handleWishlist(e) {
    const btn = e.target.closest('.action-wishlist');
    const productId = btn.dataset.productId;

    // Animation
    btn.classList.add('animate-pulse');

    // API Call
    this.addToWishlist(productId)
      .then(() => {
        btn.classList.remove('animate-pulse');
        btn.classList.add('active');
        this.showToast('تم الإضافة للمفضلة', 'success');
      })
      .catch(err => {
        btn.classList.remove('animate-pulse');
        this.showToast('حدث خطأ', 'error');
      });
  }

  handleCompare(e) {
    const btn = e.target.closest('.action-compare');
    const productId = btn.dataset.productId;

    this.addToCompare(productId)
      .then(() => {
        this.showToast('تم الإضافة للمقارنة', 'success');
      });
  }

  handleQuickView(e) {
    const btn = e.target.closest('.action-quick-view');
    const productId = btn.dataset.productId;

    this.showQuickView(productId);
  }

  // API Methods
  async addToWishlist(productId) {
    const response = await fetch(`/api/client/wishlist?product_id=${productId}`, {
      method: 'POST',
      headers: {
        'Authorization': `Bearer ${this.getToken()}`,
        'Content-Type': 'application/json',
      }
    });
    return response.json();
  }

  async addToCompare(productId) {
    const response = await fetch(`/api/client/compare?product_id=${productId}`, {
      method: 'POST',
      headers: {
        'Authorization': `Bearer ${this.getToken()}`,
        'Content-Type': 'application/json',
      }
    });
    return response.json();
  }

  showQuickView(productId) {
    // سيتم تطويره في المرحلة 4
    console.log('Quick View:', productId);
  }

  getToken() {
    return localStorage.getItem('customerToken') || '';
  }

  showToast(message, type = 'info') {
    // استخدام toastr الموجود
    if (typeof toastr !== 'undefined') {
      toastr[type](message);
    }
  }
}

// Export للاستخدام
export default ProductCard;
