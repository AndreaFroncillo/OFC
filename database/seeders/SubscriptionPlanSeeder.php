<?php

namespace Database\Seeders;

use App\Models\Subscription\SubscriptionPlan;
use Illuminate\Database\Seeder;

class SubscriptionPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [

            [
                'name' => 'basic-monthly',
                'slug' => 'basic-monthly',
                'category' => SubscriptionPlan::CATEGORY_BASIC,
                'price' => 45.00,
                'duration_in_months' => 1,
                'weekly_access_limit' => 2,
                'unlimited_access' => false,
                'requires_insurance' => true,
                'includes_gym_access' => true,
                'includes_group_lessons' => true,
                'includes_personal_training' => false,
                'is_active' => true,
                'is_visible' => true,
                'sort_order' => 1,
            ],

            [
                'name' => 'basic-trimesterly',
                'slug' => 'basic-trimesterly',
                'category' => SubscriptionPlan::CATEGORY_BASIC,
                'price' => 129.00,
                'duration_in_months' => 3,
                'weekly_access_limit' => 2,
                'unlimited_access' => false,
                'requires_insurance' => true,
                'includes_gym_access' => true,
                'includes_group_lessons' => true,
                'includes_personal_training' => false,
                'is_active' => true,
                'is_visible' => true,
                'sort_order' => 2,
            ],

            [
                'name' => 'basic-semesterly',
                'slug' => 'basic-semesterly',
                'category' => SubscriptionPlan::CATEGORY_BASIC,
                'price' => 246.00,
                'duration_in_months' => 6,
                'weekly_access_limit' => 2,
                'unlimited_access' => false,
                'requires_insurance' => true,
                'includes_gym_access' => true,
                'includes_group_lessons' => true,
                'includes_personal_training' => false,
                'is_active' => true,
                'is_visible' => true,
                'sort_order' => 3,
            ],

            [
                'name' => 'basic-yearly',
                'slug' => 'basic-yearly',
                'category' => SubscriptionPlan::CATEGORY_BASIC,
                'price' => 456.00,
                'duration_in_months' => 12,
                'weekly_access_limit' => 2,
                'unlimited_access' => false,
                'requires_insurance' => true,
                'includes_gym_access' => true,
                'includes_group_lessons' => true,
                'includes_personal_training' => false,
                'is_active' => true,
                'is_visible' => true,
                'sort_order' => 4,
            ],

            [
                'name' => 'open-monthly',
                'slug' => 'open-monthly',
                'category' => SubscriptionPlan::CATEGORY_OPEN,
                'price' => 55.00,
                'duration_in_months' => 1,
                'weekly_access_limit' => null,
                'unlimited_access' => true,
                'requires_insurance' => true,
                'includes_gym_access' => true,
                'includes_group_lessons' => true,
                'includes_personal_training' => false,
                'is_active' => true,
                'is_visible' => true,
                'sort_order' => 5,
            ],

            [
                'name' => 'open-trimesterly',
                'slug' => 'open-trimesterly',
                'category' => SubscriptionPlan::CATEGORY_OPEN,
                'price' => 150.00,
                'duration_in_months' => 3,
                'weekly_access_limit' => null,
                'unlimited_access' => true,
                'requires_insurance' => true,
                'includes_gym_access' => true,
                'includes_group_lessons' => true,
                'includes_personal_training' => false,
                'is_active' => true,
                'is_visible' => true,
                'sort_order' => 6,
            ],

            [
                'name' => 'open-semesterly',
                'slug' => 'open-semesterly',
                'category' => SubscriptionPlan::CATEGORY_OPEN,
                'price' => 276.00,
                'duration_in_months' => 6,
                'weekly_access_limit' => null,
                'unlimited_access' => true,
                'requires_insurance' => true,
                'includes_gym_access' => true,
                'includes_group_lessons' => true,
                'includes_personal_training' => false,
                'is_active' => true,
                'is_visible' => true,
                'sort_order' => 7,
            ],

            [
                'name' => 'open-yearly',
                'slug' => 'open-yearly',
                'category' => SubscriptionPlan::CATEGORY_OPEN,
                'price' => 600.00,
                'duration_in_months' => 12,
                'weekly_access_limit' => null,
                'unlimited_access' => true,
                'requires_insurance' => true,
                'includes_gym_access' => true,
                'includes_group_lessons' => true,
                'includes_personal_training' => false,
                'is_active' => true,
                'is_visible' => true,
                'sort_order' => 8,
            ],

        ];

        foreach ($plans as $plan) {
            SubscriptionPlan::updateOrCreate(
                ['slug' => $plan['slug']],
                $plan
            );
        }
    }
}
