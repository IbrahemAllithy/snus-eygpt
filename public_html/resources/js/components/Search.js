/**
 * Search Component with Autocomplete
 */

export class Search {
  constructor() {
    this.searchInput = document.getElementById('search-input');
    this.searchResults = document.getElementById('search-results');
    this.debounceTimer = null;
    this.init();
  }

  init() {
    if (!this.searchInput) return;

    this.searchInput.addEventListener('input', (e) => {
      this.handleSearch(e.target.value);
    });

    // Close results on click outside
    document.addEventListener('click', (e) => {
      if (!e.target.closest('.search-wrapper')) {
        this.hideResults();
      }
    });
  }

  handleSearch(query) {
    clearTimeout(this.debounceTimer);

    if (query.length < 2) {
      this.hideResults();
      return;
    }

    // Show loading
    this.showLoading();

    // Debounce search
    this.debounceTimer = setTimeout(() => {
      this.fetchResults(query);
    }, 300);
  }

  async fetchResults(query) {
    try {
      const response = await fetch(`/api/client/products?searchParameter=${query}&limit=5&getDetail=1`);
      const data = await response.json();

      if (data.status === 'Success') {
        this.displayResults(data.data);
      }
    } catch (error) {
      console.error('Search error:', error);
      this.hideResults();
    }
  }

  displayResults(products) {
    if (!products || products.length === 0) {
      this.showNoResults();
      return;
    }

    const html = products.map(product => `
      <a href="/product/${product.product_id}/${product.product_slug}" class="search-result-item">
        <img src="${product.product_gallary?.detail?.[0]?.gallary_path || '/default.png'}"
             alt="${product.detail?.[0]?.title || ''}"
             loading="lazy">
        <div class="result-info">
          <h6>${product.detail?.[0]?.title || ''}</h6>
          <span class="result-price">${product.product_price_symbol || ''}</span>
        </div>
      </a>
    `).join('');

    this.searchResults.innerHTML = html;
    this.showResults();
  }

  showLoading() {
    this.searchResults.innerHTML = '<div class="search-loading">جاري البحث...</div>';
    this.showResults();
  }

  showNoResults() {
    this.searchResults.innerHTML = '<div class="search-no-results">لا توجد نتائج</div>';
    this.showResults();
  }

  showResults() {
    if (this.searchResults) {
      this.searchResults.classList.add('active');
    }
  }

  hideResults() {
    if (this.searchResults) {
      this.searchResults.classList.remove('active');
    }
  }
}

export default Search;
