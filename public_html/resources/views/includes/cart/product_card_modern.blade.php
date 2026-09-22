<template id="product-card-template-modern">
    <div class="div-class">
        <div class="product-card-modern" data-aos="fade-up">
            <article class="card border-0 h-100" style="border-radius: var(--radius-lg, 12px); box-shadow: 0 4px 12px rgba(0,0,0,0.08); transition: all var(--transition-base, 0.3s ease); background: var(--bg-panel, white); overflow: hidden;">
                <div class="thumb position-relative" style="overflow: hidden;">
                    <div class="badges position-absolute top-0 start-0 p-3 d-flex flex-wrap gap-2" style="z-index: 2;">
                    </div>

                    <img class="img-fluid product-card-image w-100" src="" alt="Product Image"
                         style="transition: transform 0.5s ease; object-fit: cover; aspect-ratio: 4/3;">

                    <div class="product-overlay position-absolute w-100 h-100 top-0 start-0 d-flex align-items-center justify-content-center"
                         style="background: rgba(0,0,0,0.4); opacity: 0; transition: opacity var(--transition-base, 0.3s ease); z-index: 1;">

                        <a href="javascript:void(0)" class="btn btn-light action-btn mx-2 wishlist-icon"
                           data-toggle="tooltip" data-placement="bottom" title="Add to Wishlist"
                           style="width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: transform 0.3s ease;">
                            <i class="fas fa-heart"></i>
                        </a>

                        <div class="btn btn-light action-btn mx-2 quick-view-icon"
                             data-toggle="modal" data-target="#quickViewModal"
                             data-tooltip="tooltip" data-placement="bottom" title="Quick View"
                             style="width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: transform 0.3s ease; cursor: pointer;">
                            <i class="fas fa-eye"></i>
                        </div>

                        <a href="javascript:void(0)" class="btn btn-light action-btn mx-2 compare-icon"
                           data-toggle="tooltip" data-placement="bottom" title="Compare"
                           style="width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: transform 0.3s ease;">
                            <i class="fas fa-align-right" data-fa-transform="rotate-90"></i>
                        </a>
                    </div>
                </div>

                <div class="content card-body p-4">
                    <span class="tag product-card-category text-muted small d-block mb-2" style="font-size: 0.875rem;">
                    </span>

                    <h5 class="title mb-3 fw-bold" style="color: var(--text-body, #1a3353); font-size: 1.1rem; line-height: 1.4;">
                        <a href="javascript:void(0)" class="product-card-name text-decoration-none"
                           style="color: inherit; transition: color 0.3s ease;">
                        </a>
                    </h5>

                    <p class="para product-card-desc text-muted small mb-3" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; line-height: 1.5;">
                    </p>

                    <div class="price product-card-price d-flex align-items-center gap-2 mb-3"
                         style="font-size: 1.25rem; font-weight: 700; color: var(--color-primary, #C19A49);">
                    </div>

                    <div class="product-action">
                        <a class="btn btn-primary w-100 rounded-pill product-card-link"
                           href="javascript:void(0)"
                           style="background: var(--color-primary, #C19A49); border: none; padding: 12px 24px; font-weight: 600; box-shadow: 0 4px 12px rgba(193,154,73,0.3); transition: all 0.3s ease;">
                            <i class="fas fa-shopping-cart me-2"></i> Add to Cart
                        </a>
                    </div>
                </div>

                <div class="d-none display-rating"></div>
                <div class="d-none display-rating1"></div>
                <div class="d-none add-to-card-bag"></div>
                <a href="javascript:void(0)" class="d-none wishlist-icon-2" aria-hidden="true"></a>
                <div class="input-group item-quantity d-none">
                    <input type="text" id="" name="quantity" class="form-control qty-input" value="1">
                    <span class="input-group-btn">
                        <button type="button" value="quantity21" class="quantity-plus21 btn quantity-right-plus"
                            data-type="plus" data-field="">
                            <i class="fas fa-plus"></i>
                        </button>
                        <button type="button" value="quantity21" class="quantity-minus21 btn quantity-left-minus"
                            data-type="minus" data-field="">
                            <i class="fas fa-minus"></i>
                        </button>
                    </span>
                </div>
            </article>
        </div>
    </div>
</template>

<style>
    .product-card-modern:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.15) !important;
    }

    .product-card-modern:hover .product-card-image {
        transform: scale(1.1);
    }

    .product-card-modern:hover .product-overlay {
        opacity: 1 !important;
    }

    .product-card-modern .action-btn:hover {
        transform: scale(1.15) !important;
        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }

    .product-card-modern .product-card-link:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(193,154,73,0.4) !important;
    }

    .product-card-modern .product-card-name:hover {
        color: var(--color-primary, #C19A49) !important;
    }

    .product-card-modern .badges .badge {
        backdrop-filter: blur(10px);
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }
</style>
