<?php

namespace Database\Seeders;

use App\Models\PaymentInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class StripeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentInfo::create([
            'user_id'           => 1,
            'publishable_key'   =>'pk_test_51MdVopI5vndzPyR8dKn6Rwiy8AnLUxlZKmMJ5A42U57LSajaTsHKjlaKTO3ZhrFP45G7uIAmj6JFaXV0i43WA5Wf000QVUrGy8',
            'secret_key'        => 'sk_test_51MdVopI5vndzPyR8raL9vEY79KT2Iv22xGMebpbPOnFMc8jClAEjvnCeqMIGYeJQGgD9SWAHqduTPB64YA1KqmIY00cfZ7o7Ml',
           
        ]);
    }
}
