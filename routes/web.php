<?php

// use App\Http\Controllers\CourseContentController;

use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\CourseContentController;
use App\Http\Controllers\Frontend\CourseController;
use App\Http\Controllers\Frontend\CoursePageController;
use App\Http\Controllers\Frontend\EnrolledCourseController;
use App\Http\Controllers\Frontend\FrontendContactController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\InstructorDashboardController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\StudentDashboardController;
use App\Http\Controllers\Frontend\StudentOrderController;
use App\Http\Controllers\Frontend\WithdrawController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

/**
 * ----------------------------------------------------------------------
 * Frontend routes
 * ----------------------------------------------------------------------
 */

Route::get('/', [FrontendController::class, 'index'])->name('home');

Route::get('/courses', [CoursePageController::class, 'index'])->name('courses.index');
Route::get('/courses/{slug}', [CoursePageController::class, 'show'])->name('courses.show');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/add-to-cart/{course}', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('remove-from-cart')->middleware('auth');

Route::get('/checkout', CheckoutController::class)->name('checkout.index');

Route::get('/paypal/payment', [PaymentController::class, 'payWithPaypal'])->name('paypal.payment');
Route::get('/paypal/success', [PaymentController::class, 'paypalSuccess'])->name('paypal.success');
Route::get('/paypal/cancel', [PaymentController::class, 'paypalCancel'])->name('paypal.cancel');

Route::get('/stripe/payment', [PaymentController::class, 'payWithStripe'])->name('stripe.payment');
Route::get('/stripe/success', [PaymentController::class, 'stripeSuccess'])->name('stripe.success');
Route::get('/stripe/cancel', [PaymentController::class, 'stripeCancel'])->name('stripe.cancel');

Route::get('/razorpay/redirect', [PaymentController::class, 'razorpayRedirect'])->name('razorpay.redirect');
Route::post('/razorpay/payment', [PaymentController::class, 'payWithRazorpay'])->name('razorpay.payment');

Route::get('/order-success', [PaymentController::class, 'orderSuccess'])->name('order.success');
Route::get('/order-failed', [PaymentController::class, 'orderFailed'])->name('order.failed');

Route::get('/contact', [FrontendContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [FrontendContactController::class, 'sendEmail'])->name('send.contact');

Route::post('/newsletter-subscribe', [FrontendController::class, 'subscribe'])->name('newsletter.subscribe');

Route::get('/about', [FrontendController::class, 'about'])->name('about.index');

Route::post('/review', [CoursePageController::class, 'storeReview'])->name('review.store');

Route::get('/page/{slug}', [FrontendController::class, 'customPage'])->name('custom-page');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::post('/blog/comment/{id}', [BlogController::class, 'storeComment'])->name('blog.comment.store');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth:web', 'verified'])->name('dashboard');

/**
 * ----------------------------------------------------------------------
 * Student routes
 * ----------------------------------------------------------------------
 */
Route::group(['middleware' => ['auth:web', 'verified', 'check_role:student'], 'prefix' => 'student', 'as' => 'student.'], function () {
    Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');
    Route::get('/become-instructor', [StudentDashboardController::class, 'becomeInstructor'])->name('become-instructor');
    Route::post('/become-instructor/{user}', [StudentDashboardController::class, 'becomeInstructorUpdate'])->name('become-instructor.update');

    //Profile routes
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/update', [ProfileController::class, 'profileUpdate'])->name('profile.update');
    Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
    Route::post('/profile/update-social', [ProfileController::class, 'updateSocial'])->name('profile.update-social');

    Route::get('/enrolled-courses', [EnrolledCourseController::class, 'index'])->name('enrolled-courses.index');
    Route::get('/course-player/{slug}', [EnrolledCourseController::class, 'playerIndex'])->name('course-player.index');
    Route::get('/get-lesson-content', [EnrolledCourseController::class, 'getLessonContent'])->name('get-lesson-content');

    Route::post('/update-watch-history', [EnrolledCourseController::class, 'updateWatchHistory'])->name('update-watch-history');
    Route::post('/update-lesson-completion', [EnrolledCourseController::class, 'updateLessonCompletion'])->name('update-lesson-completion');
    
    Route::get('/file-download/{id}', [EnrolledCourseController::class, 'fileDownload'])->name('file-download');
    
    Route::get('/certificate/{course}/download', [CertificateController::class, 'download'])->name('certificate.download');

    Route::get('/review', [StudentDashboardController::class, 'review'])->name('review.index');
    Route::delete('/review/{id}', [StudentDashboardController::class, 'reviewDestroy'])->name('review.destroy');

    Route::get('/orders', [StudentOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [StudentOrderController::class, 'show'])->name('orders.show');

});


/**
 * ----------------------------------------------------------------------
 * Instructor routes
 * ----------------------------------------------------------------------
 */
Route::group(['middleware' => ['auth:web', 'verified', 'check_role:instructor'], 'prefix' => 'instructor', 'as' => 'instructor.'], function () {
    Route::get('/dashboard', [InstructorDashboardController::class, 'index'])->name('dashboard');

    //Profile routes
    Route::get('/profile', [ProfileController::class, 'instructorIndex'])->name('profile.index');
    Route::post('/profile/update', [ProfileController::class, 'profileUpdate'])->name('profile.update');
    Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
    Route::post('/profile/update-social', [ProfileController::class, 'updateSocial'])->name('profile.update-social');
    Route::post('/profile/update-gateway-info', [ProfileController::class, 'updateGatewayInfo'])->name('profile.update-gateway-info');

    //Course routes
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses/create', [CourseController::class, 'storeBasicInfo'])->name('courses.store-basic-info');
    Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::post('/courses/update', [CourseController::class, 'update'])->name('courses.update');

    Route::get('/course-content/{course}/create-chapter', [CourseContentController::class, 'createChapterModal'])->name('course-content.create-chapter');
    Route::post('/course-content/{course}/create-chapter', [CourseContentController::class, 'storeChapter'])->name('course-content.store-chapter');
    Route::get('/course-content/{chapter}/edit-chapter', [CourseContentController::class, 'editChapterModal'])->name('course-content.edit-chapter');
    Route::post('/course-content/{chapter}/update-chapter', [CourseContentController::class, 'updateChapterModal'])->name('course-content.update-chapter');
    Route::delete('/course-content/{chapter}/chapter', [CourseContentController::class, 'destroyChapter'])->name('course-content.destroy-chapter');

    Route::get('/course-content/create-lesson', [CourseContentController::class, 'createLesson'])->name('course-content.create-lesson');
    Route::post('/course-content/create-lesson', [CourseContentController::class, 'storeLesson'])->name('course-content.store-lesson');
    Route::get('/course-content/edit-lesson', [CourseContentController::class, 'editLesson'])->name('course-content.edit-lesson');
    Route::post('/course-content/{id}/update-lesson', [CourseContentController::class, 'updateLesson'])->name('course-content.update-lesson');

    Route::delete('/course-content/{id}/lesson', [CourseContentController::class, 'destroyLesson'])->name('course-content.destroy-lesson');

    Route::post('/course-chapter/{chapter}/sort-lesson', [CourseContentController::class, 'sortLesson'])->name('course-chapter.sort-lesson');

    Route::get('/course-content/{course}/sort-chapter', [CourseContentController::class, 'sortChapter'])->name('course-content.sort-chapter');

    Route::post('/course-content/{course}/sort-chapter', [CourseContentController::class, 'updateSortChapter'])->name('course-content.update-sort-chapter');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

    Route::get('/withdrawals', [WithdrawController::class, 'index'])->name('withdraw.index');
    Route::get('/withdrawals/request-payout', [WithdrawController::class, 'requestPayoutIndex'])->name('withdraw.request-payout');
    Route::post('/withdrawals/request-payout', [WithdrawController::class, 'requestPayout'])->name('withdraw.request-payout.create');
    //lfm routes
    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

require __DIR__ . '/admin.php';
