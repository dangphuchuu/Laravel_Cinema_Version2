<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

DB::table('prices')->insert([
    [
        'price' => '70000',
        'day' => '2345',
        'after' => null,
        'generation' => 'hssv',
        'created_at' => Carbon::today(),
        'updated_at' => Carbon::today(),
    ], [
        'price' => '80000',
        'day' => '2345',
        'after' => '17:00',
        'generation' => 'hssv',
        'created_at' => Carbon::today(),
        'updated_at' => Carbon::today(),
    ], [
        'price' => '80000',
        'day' => '2345',
        'after' => null,
        'generation' => 'nl',
        'created_at' => Carbon::today(),
        'updated_at' => Carbon::today(),
    ], [
        'price' => '90000',
        'day' => '2345',
        'after' => '17:00',
        'generation' => 'nl',
        'created_at' => Carbon::today(),
        'updated_at' => Carbon::today(),
    ], [
        'price' => '60000',
        'day' => '2345',
        'after' => null,
        'generation' => 'nctte',
        'created_at' => Carbon::today(),
        'updated_at' => Carbon::today(),
    ], [
        'price' => '70000',
        'day' => '2345',
        'after' => '17:00',
        'generation' => 'nctte',
        'created_at' => Carbon::today(),
        'updated_at' => Carbon::today(),
    ], [
        'price' => '75000',
        'day' => '2345',
        'after' => null,
        'generation' => 'vtt',
        'created_at' => Carbon::today(),
        'updated_at' => Carbon::today(),
    ], [
        'price' => '85000',
        'day' => '2345',
        'after' => '17:00',
        'generation' => 'vtt',
        'created_at' => Carbon::today(),
        'updated_at' => Carbon::today(),
    ], [
        'price' => '80000',
        'day' => '67cn',
        'after' => null,
        'generation' => 'hssv',
        'created_at' => Carbon::today(),
        'updated_at' => Carbon::today(),
    ], [
        'price' => '100000',
        'day' => '67cn',
        'after' => '17:00',
        'generation' => 'hssv',
        'created_at' => Carbon::today(),
        'updated_at' => Carbon::today(),
    ], [
        'price' => '90000',
        'day' => '67cn',
        'after' => null,
        'generation' => 'nl',
        'created_at' => Carbon::today(),
        'updated_at' => Carbon::today(),
    ], [
        'price' => '120000',
        'day' => '67cn',
        'after' => '17:00',
        'generation' => 'nl',
        'created_at' => Carbon::today(),
        'updated_at' => Carbon::today(),
    ], [
        'price' => '70000',
        'day' => '67cn',
        'after' => null,
        'generation' => 'nctte',
        'created_at' => Carbon::today(),
        'updated_at' => Carbon::today(),
    ], [
        'price' => '80000',
        'day' => '67cn',
        'after' => '17:00',
        'generation' => 'nctte',
        'created_at' => Carbon::today(),
        'updated_at' => Carbon::today(),
    ], [
        'price' => '85000',
        'day' => '67cn',
        'after' => null,
        'generation' => 'vtt',
        'created_at' => Carbon::today(),
        'updated_at' => Carbon::today(),
    ], [
        'price' => '90000',
        'day' => '67cn',
        'after' => '17:00',
        'generation' => 'vtt',
        'created_at' => Carbon::today(),
        'updated_at' => Carbon::today(),
    ]
]);
