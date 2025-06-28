<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SitemapController;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/services/{service:slug}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Project Management Routes
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    
    // Messaging Routes
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
    Route::put('/messages/{message}/read', [MessageController::class, 'markAsRead'])->name('messages.read');
    Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
    
    // Chatbot Route
    Route::post('/messages/chatbot', [MessageController::class, 'chatbot'])->name('messages.chatbot');
});

Route::get('/language/{locale}', [LanguageController::class, 'switch'])->name('language.switch');

// Sitemap Route
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

require __DIR__.'/auth.php';
