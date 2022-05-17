<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::post("/some/pay", 'App\Http\Controllers\frontend\product\PayWithPayPaypalController@test')->name('pay');
// Route::post("/paypal/cancel", 'App\Http\Controllers\frontend\product\PayWithPayPaypalController@paypalCancel')->name('paypal.cancel');
// Route::post("/paypal/return", 'App\Http\Controllers\frontend\product\PayWithPayPaypalController@paypalReturn')->name('paypal.return');
Route::get('/test', function () {
    return view('frontend.test');
})->name('test');





Route::prefix('/')->name('frontend.')->group(function () {
    Route::get('/', function () {
        return view('frontend.index');
    })->name('index');

    Route::get('faqs', function () {
        return view('frontend.faqs');
    })->name('faqs');
    Route::get('about', function () {
        return view('frontend.about_us');
    })->name('about_us');
    Route::get('policy', function () {
        return view('frontend.policy');
    })->name('policy');
    Route::get('checkout', function () {
        return view('frontend.checkout');
    })->name('checkout');
    Route::post('mail-subscribers', 'App\Http\Controllers\frontend\MailSubscriberController@store')->name('mail_subscriber');
    // Route::post('paypal', 'App\Http\Controllers\frontend\product\PaypalPaymentController@create')->name('paypal');
    Route::post('payment', 'App\Http\Controllers\frontend\product\PaymentController@store')->name('payment');
    Route::get('/checkout/api/paypal/order/{orderID}/capture', 'App\Http\Controllers\frontend\product\PaymentController@paypalReturn')->name('paypal.return');
    // Route::get('payment/paypal/cancel', 'App\Http\Controllers\frontend\product\PaymentController@paypalCancel')->name('paypal.cancel');
    Route::get('checkout/order-confirmation', 'App\Http\Controllers\frontend\product\PaymentController@orderConfirmation')->name('checkout.order_confirmation');
    Route::get('checkout/order-confirmation/print', 'App\Http\Controllers\frontend\product\PaymentController@printOrderConfirmation')->name('order_confirmation.print');
    Route::get('/{url}', 'App\Http\Controllers\frontend\product\ProductController@show')->name('product');
});


/**
 * Backend Routes
 */
 Route::middleware('auth')->prefix('/admin')->name('backend.')->group(function () {
     Route::get('optimize', 'App\Http\Controllers\backend\settings\SiteController@optimize')->name('optimize');
     Route::get('dashboard', function () {
         return view('backend.index');
     })->name('index');
     Route::get('orders', 'App\Http\Controllers\backend\orders\OrdersController@index')->name('orders.index');
     Route::get('order/{id}', 'App\Http\Controllers\backend\orders\OrdersController@show')->name('orders.show');
     Route::put('order/update-orderid/{id}', 'App\Http\Controllers\backend\orders\OrdersController@updateOrderID')->name('orders.update_orderid');
     Route::post('fulfill-order-toggle/{order_id}', 'App\Http\Controllers\backend\orders\OrdersController@toggle_fulfilled')->name('orders.toggle_fulfilled');
     Route::post('paid-order-toggle/{order_id}', 'App\Http\Controllers\backend\orders\OrdersController@toggle_paid')->name('orders.toggle_paid');
     Route::get('order/unfulfilled/download', 'App\Http\Controllers\backend\orders\OrdersController@exportUnfulfilledOrdersToExcel')->name('order.unfulfilled.download');

     Route::get('products', 'App\Http\Controllers\backend\product\ProductController@index')->name('products.index');
     Route::post('products/image-crawler', 'App\Http\Controllers\backend\product\ProductController@ImageCrawler')->name('product.image_crawler');
     Route::post('product/summernote-image-upload', 'App\Http\Controllers\backend\product\ProductController@summernoteImageUpload')->name('product.summernoteImageUpload');
     Route::delete('product/delete/{id}', 'App\Http\Controllers\backend\product\ProductController@destroy')->name('product.destroy');
     Route::get('product/list', 'App\Http\Controllers\backend\product\ProductController@list')->name('product.list');
     Route::get('product/edit/{id}', 'App\Http\Controllers\backend\product\ProductController@edit')->name('product.edit');
     Route::post('product/edit/{id}', 'App\Http\Controllers\backend\product\ProductController@update')->name('product.update');
     Route::get('product/add', function () {
         return view('backend.products.create');
     })->name('products.create');
     Route::post('product', 'App\Http\Controllers\backend\product\ProductController@store')->name('product.store');
     Route::get('analytics', function () {
         return view('backend.analytics');
     })->name('analytics');
     Route::get('email-marketing', 'App\Http\Controllers\backend\EmailMarketingController@index')->name('email_marketing.index');
     Route::post('email-marketing/store', 'App\Http\Controllers\backend\EmailMarketingController@store')->name('email_marketing.store');
     Route::delete('email-marketing/delete-draft/{id}', 'App\Http\Controllers\backend\EmailMarketingController@destroy')->name('email_marketing.destroy_draft');
     Route::get('email-marketing/draft-list', 'App\Http\Controllers\backend\EmailMarketingController@draft_list')->name('email_marketing.draft_list');
     Route::get('email-marketing/edit-draft/{id}', 'App\Http\Controllers\backend\EmailMarketingController@edit')->name('email_marketing.edit_draft');
     Route::post('email-marketing/editor-image-uploads', 'App\Http\Controllers\backend\EmailMarketingController@EditorImageUpload')->name('email_marketing.editor_image_upload');
     Route::get('settings', function () {
         return view('backend.settings.index');
     })->name('settings.index');
     Route::get('account', 'App\Http\Controllers\backend\ProfileController@index')->name('profile');
     Route::post('account', 'App\Http\Controllers\backend\ProfileController@update')->name('profile.update');
     Route::post('account/password-update', 'App\Http\Controllers\backend\ProfileController@password_update')->name('profile.password_update');
     // Route::post('profile/store', 'App\Http\Controllers\backend\settings\SiteController@index')->name('settings.site');
     // Setting
     Route::get('settings/site', 'App\Http\Controllers\backend\settings\SiteController@index')->name('settings.site');
     Route::post('settings/site/update', 'App\Http\Controllers\backend\settings\SiteController@update')->name('settings.site.update');
     // SMTP
     Route::get('settings/smtp', 'App\Http\Controllers\backend\settings\SMTPController@index')->name('settings.smtp');
     Route::post('settings/smtp/update', 'App\Http\Controllers\backend\settings\SMTPController@update')->name('settings.smtp.update');
     // Payment
     Route::get('settings/payment', 'App\Http\Controllers\backend\settings\PaymentController@index')->name('settings.payment');
     Route::post('settings/payment/currency/update', 'App\Http\Controllers\backend\settings\PaymentController@CurrencyUpdate')->name('settings.payment.currency_update');
     Route::post('settings/payment/paypal/update', 'App\Http\Controllers\backend\settings\PaymentController@PaypalUpdate')->name('settings.payment.paypal_update');
     Route::post('settings/payment/stripe/update', 'App\Http\Controllers\backend\settings\PaymentController@StripeUpdate')->name('settings.payment.stripe_update');
 });

 Route::middleware('guest')->prefix('/admin')->name('backend.')->group(function () {
     // Auth
     Route::get('/login', 'App\Http\Controllers\LoginController@index')->name('login.index');
     Route::post('/login', 'App\Http\Controllers\LoginController@authenticate')->name('login.authenticate');

     // Register
     Route::get('/register', 'App\Http\Controllers\RegisterController@index')->name('register.index');
     Route::post('/register', 'App\Http\Controllers\RegisterController@store')->name('register.store');

     // Forgotpassword
     Route::get('/forgot-password', 'App\Http\Controllers\ForgotPasswordController@index')->name('forgot_password.index');
     Route::post('/forgot-password', 'App\Http\Controllers\ForgotPasswordController@store')->name('forgot_password.store');

     // Resetpassword
     Route::get('/reset-password/{token}', 'App\Http\Controllers\ResetPasswordController@edit')->name('password.reset');
     Route::post('/reset-password', 'App\Http\Controllers\ResetPasswordController@update')->name('reset_password.update');
 });
 // Logout
 Route::post('/logout', 'App\Http\Controllers\LogoutController@index')->name('backend.logout');


 // Route::get('/test', function () {
 //     return view('frontend.test');
 // })->name('test');
