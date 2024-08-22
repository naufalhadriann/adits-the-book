<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserBooks;

class UpdateUserBooksStatusSeeder extends Seeder
{
    public function run()
    {
        UserBooks::chunk(100, function ($userBooks) {
            foreach ($userBooks as $userBook) {
                $userBook->status_description = match ($userBook->status) {
                    'cart' => 'In Cart',
                    'checkout' => 'Checked Out',
                    default => 'Unknown Status',
                };
                $userBook->save();
            }
        });
    }
}
