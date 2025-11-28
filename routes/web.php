<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {

    $jobs = Job::with(['employer'])->latest()->simplePaginate(10);

    return view('jobs.index', [
        'jobs' => $jobs,
    ]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::post('jobs', function () {

    request()->validate([
        'title' => 'required|string|min:3',
        'salary' => 'required|string|max:255',
    ]);

    $job = Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);

    return redirect("/jobs");
});

Route::patch('/jobs/{id}', function ($id) {

    request()->validate([
        'title' => 'required|string|min:3',
        'salary' => 'required|string|max:255',
    ]);

    $job = Job::findOrFail($id);

    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);

    return redirect('/jobs/' . $job->id);
});

Route::delete('/jobs/{id}', function ($id) {

    Job::findOrFail($id)->delete();

    return redirect("/jobs");
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    return view('jobs.show', [
        'job' => $job,
    ]);
});

Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);

    return view('jobs.edit', [
        'job' => $job,
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});
