<?php

namespace App\Filament\Resources\HomepageSettingResource\Pages;

use App\Filament\Resources\HomepageSettingResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHomepageSetting extends CreateRecord
{
    protected static string $resource = HomepageSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
