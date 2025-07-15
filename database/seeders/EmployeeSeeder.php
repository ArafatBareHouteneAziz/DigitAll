<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        $employees = [
            [
                'name' => 'John Admin',
                'email' => 'john.admin@digitall.com',
                'password' => Hash::make('password'),
                'phone' => '+1-555-0101',
                'address' => '123 Admin Street, Tech City',
                'department' => 'management',
                'position' => 'Project Manager',
                'employee_id' => 'EMP001',
                'hire_date' => '2024-01-15',
                'bio' => 'Experienced project manager with 8+ years in digital innovation.',
                'is_active' => true,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Sarah Support',
                'email' => 'sarah.support@digitall.com',
                'password' => Hash::make('password'),
                'phone' => '+1-555-0102',
                'address' => '456 Support Ave, Tech City',
                'department' => 'support',
                'position' => 'Customer Support Specialist',
                'employee_id' => 'EMP002',
                'hire_date' => '2024-02-20',
                'bio' => 'Dedicated customer support specialist helping clients with their projects.',
                'is_active' => true,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Mike Developer',
                'email' => 'mike.developer@digitall.com',
                'password' => Hash::make('password'),
                'phone' => '+1-555-0103',
                'address' => '789 Dev Road, Tech City',
                'department' => 'development',
                'position' => 'Senior Developer',
                'employee_id' => 'EMP003',
                'hire_date' => '2024-03-10',
                'bio' => 'Senior developer specializing in sustainable technology solutions.',
                'is_active' => true,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Lisa Designer',
                'email' => 'lisa.designer@digitall.com',
                'password' => Hash::make('password'),
                'phone' => '+1-555-0104',
                'address' => '321 Design Blvd, Tech City',
                'department' => 'design',
                'position' => 'UI/UX Designer',
                'employee_id' => 'EMP004',
                'hire_date' => '2024-01-25',
                'bio' => 'Creative UI/UX designer focused on user-centered design.',
                'is_active' => true,
                'email_verified_at' => now(),
            ],
        ];

        foreach ($employees as $employeeData) {
            Employee::create($employeeData);
        }
    }
}
