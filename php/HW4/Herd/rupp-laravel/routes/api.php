<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Temporary in-memory storage
$students = [
    ['id' => 1, 'name' => 'Alice', 'age' => 18, 'grade' => 'A'],
    ['id' => 2, 'name' => 'Bob', 'age' => 19, 'grade' => 'B'],
];

$teachers = [
    ['id' => 1, 'name' => 'Mr. Smith', 'age' => 35, 'subject' => 'Math'],
    ['id' => 2, 'name' => 'Ms. Johnson', 'age' => 40, 'subject' => 'Science'],
];

Route::get('/students', fn () => response()->json($students));
Route::get('/teachers', fn () => response()->json($teachers));
