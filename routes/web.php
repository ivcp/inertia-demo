<?php

use App\Models\User;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('Home');
});

Route::get('/users', function () {

    return Inertia::render('Users/Index', [
        'users' =>  User::query()
            ->when(
                FacadesRequest::input('search'),
                function ($query, $search) {
                    $query->where('name', 'like', '%' . $search . '%');
                }
            )
            ->paginate(10)
            ->withQueryString()
            ->through(fn ($user) => [
                'id' => $user->id,
                'name' => $user->name
            ]),
        'filters' => FacadesRequest::only(['search'])
    ]);
});

Route::get('/users/create', function () {
    return Inertia::render('Users/Create');
});

Route::post('/users', function (HttpRequest $request) {
    $validated = $request->validate([
        'name' => 'required',
        'email' => ['required', 'email'],
        'password' => 'required',
    ]);
    User::create($validated);
    return redirect('/users');
});

Route::get('/settings', function () {
    return Inertia::render('Settings');
});

Route::post('/logout', function () {
    dd('logging out user');
});
