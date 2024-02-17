<?php

namespace App\Filament\Resources\EmployeeResource\Widgets;

use App\Models\Country;
use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class EmployeeStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $ina = Country::where('country_code', 'INA')->withCount('employees')->first();
        $mly = Country::where('country_code', 'MLY')->withCount('employees')->first();

        return [
            Card::make('All Employees', Employee::all()->count()),
            Card::make('Malaysia Employees', $mly ? $mly->employees_count : 0),
            Card::make('Indonesia Employees', $ina ? $ina->employees_count : 0),
        ];
    }
}
