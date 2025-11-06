<?php

namespace App\Services;

use App\Models\Analytics;

class AnalyticsService
{
    public function all()
    {
        return Analytics::with('shopkeeper')->latest()->get();
    }

    public function create(array $data): Analytics
    {
        return Analytics::create($data);
    }

    public function update(Analytics $analytics, array $data): Analytics
    {
        $analytics->update($data);
        return $analytics;
    }

    public function delete(Analytics $analytics): bool
    {
        return $analytics->delete();
    }
}
