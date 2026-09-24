<?php

use App\Http\Controllers\API;
use App\Http\Controllers\Web;
use App\Models\Admin\Customer;
use App\Models\Admin\Product;
use App\Models\Web\CustomerAddressBook;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Admin\CurrentThemeController;
use App\Http\Controllers\API\Admin\MenuBuilderController;
use App\Http\Controllers\API\Admin\NewsletterController;
use App\Http\Controllers\API\Admin\CustomCssJsController;
use App\Http\Controllers\API\Admin\UserController;
use App\Http\Controllers\API\Admin\AccountController;
use App\Http\Controllers\API\Admin\DeliveryBoyController;
use App\Http\Controllers\API\Admin\PageController;
use App\Http\Controllers\API\Admin\MenuController;
use App\Http\Controllers\API\Admin\CountryController;
use App\Http\Controllers\API\Admin\DefaultAccountController;
use App\Http\Controllers\API\Admin\RoleController;
use App\Http\Controllers\API\Admin\PermissionRoleController;
use App\Http\Controllers\API\Admin\PermissionController;
use App\Http\Controllers\API\Admin\AttributeController;
use App\Http\Controllers\API\Admin\VariationController;
use App\Http\Controllers\API\Admin\LanguageController;
use App\Http\Controllers\API\Admin\CurrencyController;
use App\Http\Controllers\API\Admin\UnitController;
use App\Http\Controllers\API\Admin\CategoryController;
use App\Http\Controllers\API\Admin\CoaController;
use App\Http\Controllers\API\Admin\WarehouseController;
use App\Http\Controllers\API\Admin\ShippingMethodController;
use App\Http\Controllers\API\Admin\BrandController;
use App\Http\Controllers\API\Admin\SettingController;
use App\Http\Controllers\API\Admin\SiteContentController;
use App\Http\Controllers\API\Admin\CouponSettingController;
use App\Http\Controllers\API\Admin\TaxController;
use App\Http\Controllers\API\Admin\TaxRateController;
use App\Http\Controllers\API\Admin\StateController;
use App\Http\Controllers\API\Admin\CityController;
use App\Http\Controllers\API\Admin\ShippmentWithCityController;
use App\Http\Controllers\API\Admin\PaymentMethodController;
use App\Http\Controllers\API\Admin\GallaryController;

use App\Http\Controllers\API\Admin\PurchaserController;
use App\Http\Controllers\API\Admin\SupplierController;
use App\Http\Controllers\API\Admin\BillerController;
use App\Http\Controllers\API\Admin\QuotationController;
use App\Http\Controllers\API\Admin\CustomerController;
use App\Http\Controllers\API\Admin\SliderController;
use App\Http\Controllers\API\Admin\BannerController;
use App\Http\Controllers\API\Admin\ConstantBannerController;
use App\Http\Controllers\API\Admin\HomeBannerController;
use App\Http\Controllers\API\Admin\SliderTypeController;
use App\Http\Controllers\API\Admin\SliderNavigationController;
use App\Http\Controllers\API\Admin\PurchaseController;
use App\Http\Controllers\API\Admin\PurchaseReturnController;
use App\Http\Controllers\API\Admin\ProductController;
use App\Http\Controllers\API\Admin\SaleController;
use App\Http\Controllers\API\Admin\SaleQuotationController;
use App\Http\Controllers\API\Admin\SaleReturnController;
use App\Http\Controllers\API\Admin\BlogCategoryController;
use App\Http\Controllers\API\Admin\TimezoneController;
use App\Http\Controllers\API\Admin\StockTransferController;
use App\Http\Controllers\API\Admin\StockController;
use App\Http\Controllers\API\Admin\BlogNewsController;
use App\Http\Controllers\API\Admin\EmailTemplateSettingController;
use App\Http\Controllers\API\Admin\BusinessSettingController;
use App\Http\Controllers\API\Admin\BarCodeSettingController;
use App\Http\Controllers\API\Admin\TagController;
use App\Http\Controllers\API\Admin\MembershipController;
use App\Http\Controllers\API\Web\ReviewController;

use App\Http\Controllers\API\Admin\OrderController;
use App\Http\Controllers\API\Web\CustomerAddressBookController;
use App\Http\Controllers\API\Admin\ImportExportController;
use App\Http\Controllers\API\Web\CartController;

use App\Http\Controllers\API\Web\WishlistController;
use App\Http\Controllers\API\Web\CompareController;
use App\Http\Controllers\API\Web\CouponController;
use App\Http\Middleware\AuthenticateClient;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::post('/login', [API\Admin\AuthController::class, 'login']);
Route::post('/register', [API\Admin\AuthController::class, 'register']);

Route::get('/login', function () {
    return response()->json(['status' => 'Error', 'message' => 'Unauthorized, please login to get access to specfied route!'], 401);
})->name('login');

Route::get('pages', [API\Admin\PageController::class, 'index']);
Route::get('pages/{page}', [API\Admin\PageController::class, 'show']);

Route::prefix('admin')
    ->middleware(['auth:user-api', 'scopes:user'])
    ->group(function () {
        Route::post('/token-validate', [API\Admin\AuthController::class, 'tokenValidate']);

        Route::post('/logout', [API\Admin\AuthController::class, 'logout']);
        Route::get('/barcode', [API\Admin\BarcodeController::class, 'index']);

        Route::resource('current-theme', CurrentThemeController::class)
            ->only(['index', 'store'])
            ->names([
                'index' => 'admin.current-theme.index',
                'store' => 'admin.current-theme.store',
            ]);
        Route::resource('menu-builder', MenuBuilderController::class)
            ->only(['index', 'store'])
            ->names([
                'index' => 'admin.menu-builder.index',
                'store' => 'admin.menu-builder.store',
            ]);

        Route::resource('newsletter', NewsletterController::class)
            ->only(['index', 'store'])
            ->names([
                'index' => 'admin.newsletter.index',
                'store' => 'admin.newsletter.store',
                'update' => 'admin.newsletter.update',
                'destroy' => 'admin.newsletter.delete',
            ]);

        Route::resource('custom-css-js', CustomCssJsController::class)
            ->only(['index', 'store'])
            ->names([
                'index' => 'admin.custom_css_js.index',
                'store' => 'admin.custom_css_js.store',
                'update' => 'admin.custom_css_js.update',
                'destroy' => 'admin.custom_css_js.delete',
            ]);

        Route::resource('user', UserController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.user.index',
                'store' => 'admin.user.store',
                'update' => 'admin.user.update',
                'destroy' => 'admin.user.delete',
            ]);

        Route::resource('account', AccountController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.account.index',
                'store' => 'admin.account.store',
                'update' => 'admin.account.update',
                'destroy' => 'admin.account.delete',
            ]);

        Route::resource('delivery_boy', DeliveryBoyController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.delivery_boy.index',
                'store' => 'admin.delivery_boy.store',
                'update' => 'admin.delivery_boy.update',
                'destroy' => 'admin.delivery_boy.delete',
            ]);

        Route::resource('pages', PageController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.pages.index',
                'store' => 'admin.pages.store',
                'update' => 'admin.pages.update',
                'destroy' => 'admin.pages.delete',
            ]);

        Route::resource('menu', MenuController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.menu.index',
                'store' => 'admin.menu.store',
                'update' => 'admin.menu.update',
                'destroy' => 'admin.menu.delete',
            ]);

        Route::resource('country', CountryController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.country.index',
                'store' => 'admin.country.store',
                'update' => 'admin.country.update',
                'destroy' => 'admin.country.delete',
            ]);

        Route::resource('default_account', DefaultAccountController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.default_account.index',
                'store' => 'admin.default_account.store',
                'update' => 'admin.default_account.update',
                'destroy' => 'admin.default_account.delete',
            ]);

        Route::resource('role', RoleController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.role.index',
                'store' => 'admin.role.store',
                'update' => 'admin.role.update',
                'destroy' => 'admin.role.delete',
            ]);

        Route::resource('permission_role', PermissionRoleController::class)->names([
            'index' => 'admin.permission_role.index',
            'store' => 'admin.permission_role.store',
            'update' => 'admin.permission_role.update',
            'destroy' => 'admin.permission_role.delete',
        ]);

        Route::resource('permission', PermissionController::class)
            ->only(['store'])
            ->names([
                'store' => 'admin.permission.store',
            ]);

        Route::resource('attribute', AttributeController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.attribute.index',
                'store' => 'admin.attribute.store',
                'update' => 'admin.attribute.update',
                'destroy' => 'admin.attribute.delete',
            ]);

        Route::resource('variation', VariationController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.variation.index',
                'store' => 'admin.variation.store',
                'update' => 'admin.variation.update',
                'destroy' => 'admin.variation.delete',
            ]);

        Route::resource('language', LanguageController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.language.index',
                'store' => 'admin.language.store',
                'update' => 'admin.language.update',
                'destroy' => 'admin.language.delete',
            ]);
        Route::post('language/is_default', [API\Admin\LanguageController::class, 'isDefault']);
        Route::post('currency/is_default', [API\Admin\CurrencyController::class, 'isDefault']);
        Route::get('store-version', [API\Admin\SettingController::class, 'version']);
        Route::resource('currency', CurrencyController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.currency.index',
                'store' => 'admin.currency.store',
                'update' => 'admin.currency.update',
                'destroy' => 'admin.currency.delete',
            ]);

        Route::resource('unit', UnitController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.unit.index',
                'store' => 'admin.unit.store',
                'update' => 'admin.unit.update',
                'destroy' => 'admin.unit.delete',
            ]);

        Route::resource('category', CategoryController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.category.index',
                'store' => 'admin.category.store',
                'update' => 'admin.category.update',
                'destroy' => 'admin.category.delete',
            ]);

        Route::resource('coa', CoaController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.coa.index',
                'store' => 'admin.coa.store',
                'update' => 'admin.coa.update',
                'destroy' => 'admin.coa.delete',
            ]);

        Route::resource('warehouse', WarehouseController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.warehouse.index',
                'store' => 'admin.warehouse.store',
                'update' => 'admin.warehouse.update',
                'destroy' => 'admin.warehouse.delete',
            ]);

        Route::resource('shipping_method', ShippingMethodController::class)
            ->only(['index', 'show', 'update'])
            ->names([
                'index' => 'admin.shipping_method.index',
                'update' => 'admin.shipping_method.update',
            ]);

        Route::resource('brand', BrandController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.brand.index',
                'store' => 'admin.brand.store',
                'update' => 'admin.brand.update',
                'destroy' => 'admin.brand.delete',
            ]);

        Route::resource('setting', SettingController::class)
            ->only(['index', 'update'])
            ->names([
                'index' => 'admin.setting.index',
                'update' => 'admin.setting.update',
            ]);

        Route::get('site-content/products', [SiteContentController::class, 'products'])->name('admin.site-content.products');
        Route::get('site-content', [SiteContentController::class, 'index'])->name('admin.site-content.index');
        Route::put('site-content', [SiteContentController::class, 'update'])->name('admin.site-content.update');
        Route::post('site-content/upload', [SiteContentController::class, 'upload'])->name('admin.site-content.upload');

        Route::resource('coupon_setting', CouponSettingController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.coupon_setting.index',
                'store' => 'admin.coupon_setting.store',
                'update' => 'admin.coupon_setting.update',
                'destroy' => 'admin.coupon_setting.delete',
            ]);

        Route::resource('tax', TaxController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.tax.index',
                'store' => 'admin.tax.store',
                'update' => 'admin.tax.update',
                'destroy' => 'admin.tax.delete',
            ]);

        Route::resource('tax_rate', TaxRateController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.tax_rate.index',
                'store' => 'admin.tax_rate.store',
                'update' => 'admin.tax_rate.update',
                'destroy' => 'admin.tax_rate.delete',
            ]);

        Route::resource('state', StateController::class)
            ->only(['index', 'show', 'store', 'update', 'destroy'])
            ->names([
                'index' => 'admin.state.index',
                'show' => 'admin.state.show',
                'store' => 'admin.state.store',
                'update' => 'admin.state.update',
                'destroy' => 'admin.state.destroy',
            ]);

        Route::resource('city', CityController::class)
            ->only(['index', 'show', 'store', 'update', 'destroy'])
            ->names([
                'index' => 'admin.city.index',
                'show' => 'admin.city.show',
                'store' => 'admin.city.store',
                'update' => 'admin.city.update',
                'destroy' => 'admin.city.destroy',
            ]);

        Route::resource('shippmentWithCity', ShippmentWithCityController::class)
            ->only(['index', 'show', 'store', 'update', 'destroy'])
            ->names([
                'index' => 'admin.shippmentWithCity.index',
                'show' => 'admin.shippmentWithCity.show',
                'store' => 'admin.shippmentWithCity.store',
                'update' => 'admin.shippmentWithCity.update',
                'destroy' => 'admin.shippmentWithCity.destroy',
            ]);

        Route::resource('payment_method', PaymentMethodController::class)
            ->only(['index', 'show', 'update'])
            ->names([
                'index' => 'admin.payment_method.index',
                'show' => 'admin.payment_method.show',
                'update' => 'admin.payment_method.update',
            ]);

        Route::resource('gallary', GallaryController::class)
            ->except(['edit', 'create', 'destroy'])
            ->names([
                'index' => 'admin.gallary.index',
                'store' => 'admin.gallary.store',
            ]);
        Route::delete('gallary', [API\Admin\GallaryController::class, 'destroy'])->name('admin.gallary.delete');
        Route::post('gallary/resize_single_image', [API\Admin\GallaryController::class, 'resizeSingleImage'])->name('gallary.resize');
        Route::post('gallary/regenrate_all_images', [API\Admin\GallaryController::class, 'regenrateAllImages'])->name('gallary.regenrateAllImages');
        Route::get('available_qty', [API\Admin\AvailableQtyController::class, 'index']);
        Route::get('transaction', [API\Admin\TransactionController::class, 'index']);
        Route::post('transaction', [API\Admin\TransactionController::class, 'store']);
        Route::put('purchase_status/{purchase}', [API\Admin\PurchaseController::class, 'updateStatus']);
        Route::post('product/sku', [API\Admin\ProductController::class, 'sku']);
        Route::get('deleted_products', [API\Admin\ProductController::class, 'deleted_products']);
        Route::get('restore_deleted/{id}', [API\Admin\ProductController::class, 'restore_deleted']);
        Route::post('set-timezone', [API\Admin\TimezoneController::class, 'setTimezone']);
        Route::post('updateLocation', [API\Admin\BusinessSettingController::class, 'updateLocation']);
        Route::put('review', [API\Web\ReviewController::class, 'index']);
        Route::post('review/status', [API\Web\ReviewController::class, 'status'])->name('admin.review.status');
        Route::post('comment/reply', [API\Web\CommentController::class, 'reply']);
        Route::get('comment', [API\Web\CommentController::class, 'index']);
        Route::get('/points', [API\Web\PointController::class, 'index'])->name('admin.points.index');
        Route::resource('purchaser', PurchaserController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.purchaser.index',
                'store' => 'admin.purchaser.store',
                'update' => 'admin.purchaser.update',
                'destroy' => 'admin.purchaser.delete',
            ]);

        Route::resource('supplier', SupplierController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.supplier.index',
                'store' => 'admin.supplier.store',
                'update' => 'admin.supplier.update',
                'destroy' => 'admin.supplier.delete',
            ]);

        Route::resource('biller', BillerController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.biller.index',
                'store' => 'admin.biller.store',
                'update' => 'admin.biller.update',
                'destroy' => 'admin.biller.delete',
            ]);

        Route::resource('quotation', QuotationController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.quotation.index',
                'store' => 'admin.quotation.store',
                'update' => 'admin.quotation.update',
                'destroy' => 'admin.quotation.delete',
            ]);

        Route::resource('customer', CustomerController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.customer.index',
                'store' => 'admin.customer.store',
                'update' => 'admin.customer.update',
                'destroy' => 'admin.customer.delete',
            ]);

        Route::resource('slider', SliderController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.slider.index',
                'store' => 'admin.slider.store',
                'update' => 'admin.slider.update',
                'destroy' => 'admin.slider.delete',
            ]);

        Route::resource('banner', BannerController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.banner.index',
                'store' => 'admin.banner.store',
                'update' => 'admin.banner.update',
                'destroy' => 'admin.banner.delete',
            ]);

        Route::resource('constant_banner', ConstantBannerController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.constant_banner.index',
                'store' => 'admin.constant_banner.store',
                'update' => 'admin.constant_banner.update',
                'destroy' => 'admin.constant_banner.delete',
            ]);

        Route::resource('home_banner', HomeBannerController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.home_banner.index',
                'store' => 'admin.home_banner.store',
                'update' => 'admin.home_banner.update',
                'destroy' => 'admin.home_banner.delete',
            ]);

        Route::resource('slider_type', SliderTypeController::class)
            ->only(['index', 'show'])
            ->names([
                'index' => 'admin.slider_type.index',
                'show' => 'admin.slider_type.show',
            ]);

        Route::resource('slider_navigation', SliderNavigationController::class)
            ->only(['index', 'show'])
            ->names([
                'index' => 'admin.slider_navigation.index',
                'show' => 'admin.slider_navigation.show',
            ]);

        Route::resource('purchase', PurchaseController::class)
            ->except(['edit', 'create', 'update'])
            ->names([
                'index' => 'admin.purchase.index',
                'store' => 'admin.purchase.store',
                'destroy' => 'admin.purchase.delete',
            ]);

        Route::resource('purchase_return', PurchaseReturnController::class)
            ->except(['edit', 'create', 'update'])
            ->names([
                'index' => 'admin.purchase_return.index',
                'store' => 'admin.purchase_return.store',
                'destroy' => 'admin.purchase_return.delete',
            ]);

        Route::resource('product', ProductController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.product.index',
                'store' => 'admin.product.store',
                'update' => 'admin.product.update',
                'destroy' => 'admin.product.delete',
            ]);

        Route::resource('sale', SaleController::class)
            ->only(['index', 'store', 'destroy'])
            ->middleware('store')
            ->names([
                'index' => 'admin.sale.index',
                'store' => 'admin.sale.store',
                'destroy' => 'admin.sale.delete',
            ]);

        Route::resource('sale_quotation', SaleQuotationController::class)
            ->only(['index', 'store', 'destroy'])
            ->middleware('store')
            ->names([
                'index' => 'admin.sale_quotation.index',
                'store' => 'admin.sale_quotation.store',
                'destroy' => 'admin.sale_quotation.delete',
            ]);

        Route::resource('sale_return', SaleReturnController::class)
            ->only(['index', 'store', 'destroy'])
            ->middleware('store')
            ->names([
                'index' => 'admin.sale_return.index',
                'store' => 'admin.sale_return.store',
                'destroy' => 'admin.sale_return.delete',
            ]);

        Route::resource('blog_category', BlogCategoryController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.blog_category.index',
                'store' => 'admin.blog_category.store',
                'update' => 'admin.blog_category.update',
                'destroy' => 'admin.blog_category.delete',
            ]);

        Route::resource('timezone', TimezoneController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.timezone.index',
                'show' => 'admin.timezone.show',
                'store' => 'admin.timezone.store',
                'update' => 'admin.timezone.update',
                'destroy' => 'admin.timezone.delete',
            ]);

        Route::resource('stock_transfer', StockTransferController::class)
            ->except(['edit', 'create', 'update'])
            ->names([
                'index' => 'admin.stock_transfer.index',
                'store' => 'admin.stock_transfer.store',
                'destroy' => 'admin.stock_transfer.delete',
            ]);

        Route::resource('stock', StockController::class)
            ->except(['edit', 'create', 'destroy', 'update'])
            ->names([
                'index' => 'admin.stock.index',
                'store' => 'admin.stock.store',
            ]);

        Route::resource('blog_news', BlogNewsController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.blog_news.index',
                'store' => 'admin.blog_news.store',
                'update' => 'admin.blog_news.update',
                'destroy' => 'admin.blog_news.delete',
            ]);

        Route::resource('email_template_setting', EmailTemplateSettingController::class)
            ->except(['edit', 'create', 'update'])
            ->names([
                'index' => 'admin.email_template_setting.index',
                'store' => 'admin.email_template_setting.store',
                'destroy' => 'admin.email_template_setting.delete',
            ]);

        Route::resource('business_setting', BusinessSettingController::class)
            ->only(['store', 'show'])
            ->names([
                'store' => 'admin.business_setting.store',
                'show' => 'admin.business_setting.show',
            ]);

        Route::resource('bar_code_setting', BarCodeSettingController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.bar_code_setting.index',
                'store' => 'admin.bar_code_setting.store',
                'update' => 'admin.bar_code_setting.update',
                'destroy' => 'admin.bar_code_setting.delete',
            ]);

        Route::resource('tag', TagController::class)
            ->only(['index'])
            ->names([
                'index' => 'admin.tag.index',
            ]);

        Route::resource('membership', MembershipController::class)
            ->only(['index', 'store'])
            ->names([
                'index' => 'admin.membership.index',
                'store' => 'admin.membership.store',
            ]);

        Route::resource('review', ReviewController::class)
            ->except(['edit', 'create', 'store', 'destroy'])
            ->names([
                'index' => 'admin.review.index',
                'update' => 'admin.review.update',
            ]);

        Route::resource('order', OrderController::class)
            ->only(['index', 'show', 'update'])
            ->names([
                'index' => 'admin.order.index',
                'show' => 'admin.order.show',
                'update' => 'admin.order.update',
            ]);

        Route::resource('customer_address_book', CustomerAddressBookController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.customer_address_book.index',
                'store' => 'admin.customer_address_book.store',
                'update' => 'admin.customer_address_book.update',
                'destroy' => 'admin.customer_address_book.delete',
            ]);

        Route::resource('importexport', ImportExportController::class)
            ->only(['store'])
            ->names([
                'store' => 'admin.importexport.store',
            ]);

        Route::resource('cart', CartController::class)
            ->except(['edit', 'create', 'update', 'index', 'destroy'])
            ->names([
                'store' => 'client.cart.store',
            ]);
        Route::get('export', [API\Admin\ImportExportController::class, 'export']);
        Route::get('sample', [API\Admin\ImportExportController::class, 'sample']);
        Route::post('verifyPurchaseCode', [API\Admin\ImportExportController::class, 'verifyPurchaseCode']);

        Route::get('get-updates', [API\Admin\UpdateMergeController::class, 'get_updates']);
        Route::get('download-zip', [API\Admin\UpdateMergeController::class, 'download_zip']);
        Route::get('merge', [API\Admin\UpdateMergeController::class, 'merge']);

        Route::post('add_notes', [API\Admin\OrderController::class, 'addOrderNotes']);
        Route::post('add_comments', [API\Admin\OrderController::class, 'addOrderComments']);

        Route::get('user/{id}', [API\Admin\AuthController::class, 'show'])->name('admin.auth.show');
        Route::put('user/{id}', [API\Admin\AuthController::class, 'update'])->name('admin.auth.update');
        Route::get('/dashboard', [Web\IndexController::class, 'orderStats']);

        Route::post('order', [API\Web\OrderController::class, 'store']);

        Route::prefix('reports')->group(function () {
            Route::get('stock-on-hand', [API\Admin\ReportController::class, 'stockOnHand']);
            Route::get('out-of-stock', [API\Admin\ReportController::class, 'outOfStock']);
            Route::get('purchase-report', [API\Admin\ReportController::class, 'purchaseReport']);
            Route::get('expense-report', [API\Admin\ReportController::class, 'expenseReport']);
        });
        Route::get('/newslettercontact', [API\Web\NewsletterContactController::class, 'index'])->name('newslettercontact.index');
        Route::delete('/newslettercontact/{id}', [API\Web\NewsletterContactController::class, 'destroy'])->name('newslettercontact.destroy');
        Route::get('/newslettercontact-csv', [API\Web\NewsletterContactController::class, 'get_csv'])->name('newslettercontact.get_csv');
    });

// Route::get('paywithpaypal', array('as' => 'paywithpaypal','uses' => 'API\Web\PaypalController@payWithPaypal',));
// Route::post('paypal', array('as' => 'paypal','uses' => 'API\Web\PaypalController@postPaymentWithpaypal',));
// Route::get('paypal', array('as' => 'status','uses' => 'API\Web\PaypalController@getPaymentStatus',));

Route::prefix('client')->group(function () {
    Route::post('/customer_login', [API\Web\CustomerAuthController::class, 'login']);
    Route::post('/verifyNumber', [API\Web\CustomerAuthController::class, 'verifyNumber']);
    Route::post('/sendCode', [API\Web\CustomerAuthController::class, 'sendCode']);
    Route::post('/verifyCode', [API\Web\CustomerAuthController::class, 'verifyCode']);
    Route::get('customer_login/{provider}', [API\Web\CustomerAuthController::class, 'redirect']);
    Route::get('customer_login/{provider}/callback', [API\Web\CustomerAuthController::class, 'Callback']);
    Route::post('/customer_register', [API\Web\CustomerAuthController::class, 'register']);
    Route::post('/forget_password', [API\Web\CustomerAuthController::class, 'forgetPassword']);
    Route::post('/reset_password', [API\Web\CustomerAuthController::class, 'resetPassword']);

    Route::put('order_status_by_delivery_boy/{order}', [API\Web\OrderController::class, 'update']);
});

Route::prefix('client')
    ->middleware('auth:customer-api', 'scopes:customer')
    ->group(function () {
        Route::post('/customer_logout', [API\Web\CustomerAuthController::class, 'logout']);
        Route::post('/get-braintree-auth-token', [API\Web\OrderController::class, 'getBraintreeAuthToken']);
        Route::post('/isDefaultShipping', [API\Admin\ShippingMethodController::class, 'isDefault'])->name('shipping_method.isDefault');
        Route::get('/checkShippingMethod', [API\Admin\ShippingMethodController::class, 'shippingMethod'])->name('shipping_method.checkShippingMethod');
        Route::post('/shippingWithCity', [API\Admin\ShippingMethodController::class, 'shippingWithCity'])->name('shipping_method.shippingWithCity');
        Route::post('paystack-authorization', [API\Web\OrderController::class, 'paystackAuthorization']);
        Route::get('get-fygaro-button', [API\Web\OrderController::class, 'getfygaroButton']);
        Route::post('fygaro-jwt', [API\Web\OrderController::class, 'makeFygaroJWT']);

        Route::get('/tax_rate', [API\Admin\TaxRateController::class, 'findByState'])->name('taxrate.index');
        Route::post('/redeem', [API\Web\PointController::class, 'store'])->name('redeem.store');
        Route::post('customer/membership', [API\Web\MembershipLevelController::class, 'index']);
        Route::get('/points', [API\Web\PointController::class, 'index'])->name('customer.points');
        Route::get('/wallet', [API\Web\WalletController::class, 'index'])->name('customer.wallet');

        Route::post('order', [API\Web\OrderController::class, 'store']);
        Route::put('order/{order}', [API\Web\OrderController::class, 'update']);
        Route::post('review', [API\Web\ReviewController::class, 'store']);
        Route::post('comment', [API\Web\CommentController::class, 'store']);
        Route::delete('cart/delete', [API\Web\CartController::class, 'destroy']);

        Route::post('add_comments', [API\Web\OrderController::class, 'addOrderComments']);
        Route::get('available_qty', [API\Admin\AvailableQtyController::class, 'index']);
        Route::post('/change_password', [API\Web\CustomerAuthController::class, 'changePassword']);

        Route::resource('cart', CartController::class)
            ->except(['edit', 'create', 'update'])
            ->names([
                'index' => 'client.cart.index',
                'store' => 'client.cart.store',
                'destroy' => 'client.cart.delete',
            ]);

        Route::resource('wishlist', WishlistController::class)
            ->except(['edit', 'create', 'update'])
            ->names([
                'index' => 'client.wishlist.index',
                'store' => 'client.wishlist.store',
                'destroy' => 'client.wishlist.delete',
            ]);

        Route::resource('compare', CompareController::class)
            ->except(['edit', 'create', 'update'])
            ->names([
                'index' => 'client.compare.index',
            ]);

        Route::resource('profile', CustomerController::class)
            ->only(['show', 'update'])
            ->names([
                'show' => 'client.profile.show',
                'update' => 'client.profile.update',
            ]);

        Route::resource('coupon', CouponController::class)
            ->except(['edit', 'show', 'create', 'update', 'destroy'])
            ->names([
                'index' => 'client.coupon.index',
                'store' => 'client.coupon.store',
            ]);

        Route::resource('customer_address_book', CustomerAddressBookController::class)
            ->except(['edit', 'create'])
            ->names([
                'index' => 'admin.customer_address_book.index',
                'store' => 'admin.customer_address_book.store',
                'update' => 'admin.customer_address_book.update',
                'destroy' => 'admin.customer_address_book.delete',
            ]);

        Route::resource('customer/order', OrderController::class)
            ->only(['index', 'show'])
            ->names([
                'index' => 'admin.customer.order.index',
                'show' => 'admin.customer.order.show',
            ]);
    });

Route::prefix('client')
    ->middleware([AuthenticateClient::class])
    ->group(function () {
        Route::get('cart/guest/get', [API\Web\CartController::class, 'index']);
        Route::get('blog_news', [API\Admin\BlogNewsController::class, 'index']);
        Route::get('blog_category', [API\Admin\BlogCategoryController::class, 'index']);
        // Route::get('menu', 'API\Admin\MenuController@index');
        Route::get('menu', [API\Admin\MenuBuilderController::class, 'index']);
        Route::post('cart/guest/store', [API\Web\CartController::class, 'store']);
        Route::delete('cart/guest/delete', [API\Web\CartController::class, 'destroy']);

        Route::post('products/price-range', [API\Admin\ProductController::class, 'priceRange']);

        Route::get('available_qty', [API\Admin\AvailableQtyController::class, 'index']);
        Route::get('review', [API\Web\ReviewController::class, 'index']);
        Route::get('custom-css-js', [API\Admin\CustomCssJsController::class, 'index']);
        // Route::get('pages', 'API\Admin\PageController@index');
        // Route::resource('pages', 'API\Admin\PageController')->only(['show']);

        Route::post('contact-us', [API\Web\MailController::class, 'contact_us']);

        Route::post('/delivery_validate_pin', [API\Admin\DeliveryBoyController::class, 'validatePin'])->name('delivery_boy.validate_pin');
        Route::put('/update_delivery_boy_status', [API\Admin\DeliveryBoyController::class, 'UpdateStatus'])->name('delivery_boy.validate_pin');

        Route::post('/newslettercontact', [API\Web\NewsletterContactController::class, 'store'])->name('newslettercontact.store');

        Route::get('pages', [API\Admin\PageController::class, 'index']);
        Route::get('pages/{page}', [API\Admin\PageController::class, 'show']);
        Route::resource('constant_banner', ConstantBannerController::class)
            ->except(['update', 'destroy', 'store', 'edit', 'create'])
            ->names([
                'index' => 'admin.banner.index',
            ]);

        Route::resource('order', OrderController::class)
            ->only(['index', 'show'])
            ->names([
                'index' => 'admin.order.index',
            ]);

        Route::resource('payment_method', PaymentMethodController::class)->only(['index', 'show']);

        Route::resource('attributes', AttributeController::class)->only(['index', 'show']);

        Route::resource('variations', VariationController::class)->only(['index', 'show']);

        Route::resource('country', CountryController::class)
            ->only(['index', 'show'])
            ->names([
                'index' => 'client.country.index',
            ]);

        Route::resource('state', StateController::class)
            ->only(['index', 'show'])
            ->names([
                'index' => 'client.state.index',
            ]);

        Route::resource('city', CityController::class)
            ->only(['index', 'show'])
            ->names([
                'index' => 'admin.city.index',
            ]);

        Route::resource('products', ProductController::class)->only(['index', 'show']);

        Route::resource('category', CategoryController::class)
            ->except(['store', 'update', 'destroy', 'edit', 'create'])
            ->names([
                'index' => 'client.category.index',
                'show' => 'client.category.show',
            ]);

        Route::resource('brand', BrandController::class)
            ->except(['store', 'update', 'destroy', 'edit', 'create'])
            ->names([
                'index' => 'client.brand.index',
                'show' => 'client.brand.show',
            ]);

        Route::resource('setting', SettingController::class)
            ->only(['index'])
            ->names([
                'index' => 'client.setting.index',
            ]);

        Route::resource('slider', SliderController::class)
            ->except(['store', 'update', 'destroy', 'edit', 'create'])
            ->names([
                'index' => 'client.slider.index',
            ]);

        Route::resource('slider_type', SliderTypeController::class)->only(['index', 'show']);

        Route::resource('slider_navigation', SliderNavigationController::class)->only(['index', 'show']);

        Route::resource('banner', BannerController::class)
            ->except(['store', 'update', 'destroy', 'edit', 'create'])
            ->names([
                'index' => 'client.banner.index',
                'show' => 'client.banner.show',
            ]);

        Route::resource('language', LanguageController::class)
            ->except(['store', 'update', 'destroy', 'edit', 'create'])
            ->names([
                'index' => 'client.language.index',
            ]);

        Route::resource('currency', CurrencyController::class)
            ->except(['store', 'update', 'destroy', 'edit', 'create'])
            ->names([
                'index' => 'client.currency.index',
            ]);
    });

Route::get('customer/order/print/{id}', [API\Admin\OrderController::class, 'printInvoice'])->name('order.print');

Route::get('clear', function () {
    \Artisan::call('cache:clear');
    \Artisan::call('config:clear');
    \Artisan::call('route:clear');
    \Artisan::call('view:clear');
    \Artisan::call('config:cache');

    return 'clear';
});

\Route::bind('product', function ($val) {
    return Product::where('id', $val)->type()->firstOrFail();
});
\Route::bind('customer_address_book', function ($val) {
    return CustomerAddressBook::where('id', $val)->getCustomerAddress(\Auth::id())->firstOrFail();
});
\Route::bind('profile', function ($id) {
    return Customer::customerId($id)->customerId(\Auth::id())->firstOrFail();
});
