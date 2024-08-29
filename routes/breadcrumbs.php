<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

// Home > Blog
Breadcrumbs::for('product', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Product', route('book.index'));
});
Breadcrumbs::for('categoryy', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Category', route('category.index'));
});
Breadcrumbs::for('transaction', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Transaction', route('transaction.index'));
});

Breadcrumbs::for('user', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('User', route('user.index'));
});

Breadcrumbs::for('admin', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Admin', route('admin.index'));
});
Breadcrumbs::for('home', function (BreadcrumbTrail $trail){
    $trail->push('Home', route('home'));
});
Breadcrumbs::for('diskon', function(BreadcrumbTrail $trail){
    $trail->parent('home');
    $trail->push('Diskon', route('diskon'));
});
Breadcrumbs::for('cart', function(BreadcrumbTrail $trail){
    $trail->parent('home');
    $trail->push('Cart', route('cart.view'));
});
Breadcrumbs::for('payment', function(BreadcrumbTrail $trail){
    $trail->parent('cart');
    $trail->push('Payment', route('payment.index'));
});

// Home > Diskon > [title]
Breadcrumbs::for('diskonbook', function ($trail, $book) {
    $trail->parent('diskon'); 
    $trail->push($book->title, route('book.show', $book->id)); 
});
Breadcrumbs::for('book', function ($trail, $book) {
    $trail->parent('home'); 
    $trail->push($book->title, route('book.show', $book->id)); 
});
