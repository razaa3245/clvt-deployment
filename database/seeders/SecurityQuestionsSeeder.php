<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SecurityQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            if (!$user->security_question1) {
                $user->update([
                    'security_question1' => "What is your mother's maiden name?",
                    'security_answer1' => Hash::make('Smith'),
                    'security_question2' => "What was the name of your first pet?",
                    'security_answer2' => Hash::make('Fluffy'),
                    'security_question3' => "What is your favorite color?",
                    'security_answer3' => Hash::make('Blue'),
                ]);
            }
        }
    }
}
