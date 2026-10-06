<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Akun admin
        User::create([
            'name' => 'Admin Perpustakaan',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]);

        // Kategori
        $novel = Category::create([
            'name' => 'Novel',
            'description' => 'Buku cerita dan karya fiksi.',
        ]);

        $teknologi = Category::create([
            'name' => 'Teknologi',
            'description' => 'Buku mengenai teknologi dan pemrograman.',
        ]);

        $pendidikan = Category::create([
            'name' => 'Pendidikan',
            'description' => 'Buku mengenai pendidikan dan pembelajaran.',
        ]);

        // Buku
        Book::create([
            'category_id' => $novel->id,
            'title' => 'Laskar Pelangi',
            'author' => 'Andrea Hirata',
            'publisher' => 'Bentang Pustaka',
            'year' => 2005,
            'stock' => 10,
        ]);

        Book::create([
            'category_id' => $novel->id,
            'title' => 'Bumi',
            'author' => 'Tere Liye',
            'publisher' => 'Gramedia',
            'year' => 2014,
            'stock' => 8,
        ]);

        Book::create([
            'category_id' => $teknologi->id,
            'title' => 'Pemrograman Web',
            'author' => 'Budi Raharjo',
            'publisher' => 'Informatika',
            'year' => 2022,
            'stock' => 5,
        ]);

        Book::create([
            'category_id' => $teknologi->id,
            'title' => 'Belajar Laravel',
            'author' => 'Agus Setiawan',
            'publisher' => 'Elex Media',
            'year' => 2023,
            'stock' => 7,
        ]);

        Book::create([
            'category_id' => $pendidikan->id,
            'title' => 'Dasar-Dasar Pendidikan',
            'author' => 'Ahmad Fauzi',
            'publisher' => 'Prenada Media',
            'year' => 2021,
            'stock' => 6,
        ]);
    }
}