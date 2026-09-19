// Modern Search Component with Debouncing and Autocomplete
export class SearchModern {
    constructor() {
        this.searchInput = document.querySelector('.search-input-modern');
        this.searchResults = document.querySelector('.search-results-modern');
        this.debounceTimer = null;
        this.minChars = 2;

        if (this.searchInput) {
            this.init();
        }
    }

    init() {
        this.searchInput.addEventListener('input', (e) => {
            this.handleSearch(e.target.value);
        });

        // Close results when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.search-wrapper-modern')) {
                this.hideResults();
            }
        });
    }

    handleSearch(query) {
        clearTimeout(this.debounceTimer);

        if (query.length < this.minChars) {
            this.hideResults();
            return;
        }

        // Show loading state
        this.showLoading();

        this.debounceTimer = setTimeout(() => {
            this.fetchResults(query);
        }, 300);
    }

    showLoading() {
        if (this.searchResults) {
            this.searchResults.innerHTML = `
                <div class="search-loading p-3 text-center">
                    <div class="spinner-border spinner-border-sm text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <span class="ms-2">Searching...</span>
                </div>
            `;
            this.searchResults.classList.add('show');
        }
    }

    hideResults() {
        if (this.searchResults) {
            this.searchResults.classList.remove('show');
        }
    }

    async fetchResults(query) {
        const languageId = localStorage.getItem('languageId');
        const currency = localStorage.getItem('currency');
        const baseUrl = window.location.origin;

        try {
            const response = await fetch(
                `${baseUrl}/api/client/products?searchParameter=${encodeURIComponent(query)}&limit=5&getDetail=1&language_id=${languageId}&currency=${currency}`,
                {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'clientid': window.clientId || '',
                        'clientsecret': window.clientSecret || '',
                    }
                }
            );

            const data = await response.json();

            if (data.status === 'Success' && data.data.length > 0) {
                this.displayResults(data.data);
            } else {
                this.showNoResults();
            }
        } catch (error) {
            console.error('Search error:', error);
            this.showError();
        }
    }

    displayResults(products) {
        if (!this.searchResults) return;

        let html = '<div class="search-results-list">';

        products.forEach(product => {
            const title = product.detail?.[0]?.title || 'No title';
            const image = product.product_gallary?.detail?.[2]?.gallary_path || 'https://via.placeholder.com/80';
            const price = product.product_price_symbol || product.product_price;
            const url = `/product/${product.product_id}/${product.product_slug}`;

            html += `
                <a href="${url}" class="search-result-item d-flex align-items-center p-3 text-decoration-none"
                   style="border-bottom: 1px solid var(--border-color, #e9ecef); transition: background 0.2s ease;">
                    <img src="${image}" alt="${title}"
                         class="search-result-image me-3"
                         style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                    <div class="flex-grow-1">
                        <div class="search-result-title fw-bold mb-1"
                             style="color: var(--text-body, #1a3353); font-size: 0.95rem;">
                            ${title}
                        </div>
                        <div class="search-result-price"
                             style="color: var(--color-primary, #ae69f5); font-weight: 600;">
                            ${price}
                        </div>
                    </div>
                    <i class="fas fa-arrow-right" style="color: var(--text-muted, #6c757d);"></i>
                </a>
            `;
        });

        html += `
            <div class="search-view-all p-3 text-center" style="background: var(--bg-page, #f8f9fa);">
                <a href="/shop?search=${encodeURIComponent(this.searchInput.value)}"
                   class="btn btn-sm btn-primary rounded-pill px-4"
                   style="background: var(--color-primary, #ae69f5); border: none;">
                    View All Results
                </a>
            </div>
        `;

        html += '</div>';

        this.searchResults.innerHTML = html;
        this.searchResults.classList.add('show');

        // Add hover effects
        this.addHoverEffects();
    }

    addHoverEffects() {
        const items = this.searchResults.querySelectorAll('.search-result-item');
        items.forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.background = 'var(--bg-page, #f8f9fa)';
            });
            item.addEventListener('mouseleave', function() {
                this.style.background = 'transparent';
            });
        });
    }

    showNoResults() {
        if (this.searchResults) {
            this.searchResults.innerHTML = `
                <div class="search-no-results p-4 text-center">
                    <i class="fas fa-search mb-3" style="font-size: 2rem; color: var(--text-muted, #6c757d);"></i>
                    <p class="mb-0" style="color: var(--text-muted, #6c757d);">
                        No products found
                    </p>
                </div>
            `;
            this.searchResults.classList.add('show');
        }
    }

    showError() {
        if (this.searchResults) {
            this.searchResults.innerHTML = `
                <div class="search-error p-4 text-center">
                    <i class="fas fa-exclamation-circle mb-3" style="font-size: 2rem; color: #dc3545;"></i>
                    <p class="mb-0" style="color: var(--text-muted, #6c757d);">
                        Search error. Please try again.
                    </p>
                </div>
            `;
            this.searchResults.classList.add('show');
        }
    }
}

// Auto-initialize
document.addEventListener('DOMContentLoaded', () => {
    new SearchModern();
});
