<?php


use Illuminate\Support\Facades\Route;
use App\Models\Job;


Route::get('/', function () {
    // $jobs =Job::all();
    // dd($jobs);
    return view('home');
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->simplePaginate(3);
    return view('jobs', [
        'jobs' => $jobs]);
});

Route::get('/jobs/{id}', function ($id) {
        // $job = Arr::first(Job::all(), fn($job) => $job['id'] == $id);        //searching for the job from list that matches the id
    // dd($job);
    $job = Job::find($id);
    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});

