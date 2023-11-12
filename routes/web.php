<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InvoicesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('invoices', 'App\Http\Controllers\InvoicesController');
//route for statuses
Route::resource('statuses', 'App\Http\Controllers\StatusController');
//route for typees
Route::resource('typees', 'App\Http\Controllers\AccTypeesController');
//route for NatureAccounts
Route::resource('natureAccounts', 'App\Http\Controllers\NatureAccountsController');
//route for reports
Route::resource('reports', 'App\Http\Controllers\AccReportsController');
//route for Card Typees
Route::resource('cardTypees', 'App\Http\Controllers\CardTypeesController');
//route for Tree Accounts
Route::resource('treeAccounts', 'App\Http\Controllers\TreeAccountsController');
//route for Managers
Route::resource('manager', 'App\Http\Controllers\ManagerController');
//route for Company Branches
Route::resource('companyBranches', 'App\Http\Controllers\CompanyBranchesController');
//route for the currency  العملاء
Route::resource('currency', 'App\Http\Controllers\CurrencyController');
//route for the currency Types نوع العملاء
Route::resource('currencyType', 'App\Http\Controllers\CurrencyTypessController');
//route for the Cashier  الصنديق
Route::resource('cashier', 'App\Http\Controllers\CashierController');
//route for the Banks  البنوك
Route::resource('bank', 'App\Http\Controllers\BankController');
//route for the Types Of Restrictions  أنواع القيود
Route::resource('typesOfRestrictions', 'App\Http\Controllers\TypesOfRestrictionsController');
//route for the Customersِ And Suppliers  العملاء والموردين
Route::resource('customersAndSuppliers', 'App\Http\Controllers\CustomersAndSuppliersController');
//route for the Customersِ And Suppliers  أضافة صلة
Route::resource('addLink', 'App\Http\Controllers\AddLinkController');
//route for the Customersِ And Suppliers   أضافة أشخاص
Route::resource('addPeople', 'App\Http\Controllers\AddPeopleController');
//route for the Products   جدول المنجات
Route::resource('product', 'App\Http\Controllers\ProductsController');
//route for the Products item    جدول صناف المنجات
Route::resource('item', 'App\Http\Controllers\PItemController');
//route for the section/{id}   هده الروت لجلب الاصناف عند تحديد المنتج
Route::get('/section/{id}', 'InvoicesController@getproducts');





Route::get('/{page}', 'App\Http\Controllers\AdminController@index');
