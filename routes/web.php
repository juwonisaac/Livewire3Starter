<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Admin\Contact\Index as ContactsIndex;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Pages\Create as CreatePage;
use App\Livewire\Admin\Pages\Edit as EditPage;
use App\Livewire\Admin\Pages\Index as PagesIndex;
use App\Livewire\Admin\Section\Index as SectionsIndex;
use App\Livewire\Admin\UserTable;
use App\Livewire\DynamicPages;
use App\Livewire\FrontIndex;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Illuminate\Support\Facades\View;


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

require __DIR__ . '/auth.php';

Route::get('/clean', function () {
    Artisan::call('optimize:clear');

    return 'Cache & Database Cleared';
});

Route::get('/docs', function () {
    View::addExtension('html', 'php'); // allows .html

    return view('docs.index'); // loads /public/docs/index.html
});

Route::get('/', FrontIndex::class)->name('front.index');

// prefix admin routes with /admin
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin', 'verified'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/users', UserTable::class)->name('users');
    Route::get('/pages', PagesIndex::class)->name('pages.index');
    Route::get('/page/create', CreatePage::class)->name('page.create');
    Route::get('/page/{slug}/edit', EditPage::class)->name('page.edit');
    Route::get('/sections', SectionsIndex::class)->name('sections.index');
    Route::get('/contacts', ContactsIndex::class)->name('contacts.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/{slug}', DynamicPages::class)->name('page.show');

Route::get('/migrate', function () {
    Artisan::call('migrate');

    return 'Database Migrated';
});

Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/livewire/update', $handle);
});
