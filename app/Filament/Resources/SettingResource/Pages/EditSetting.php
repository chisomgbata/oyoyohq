<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditSetting extends EditRecord
{
    protected static string $resource = SettingResource::class;

    public function getHeading(): string|Htmlable
    {
        return 'Edit' . ' ' . $this->record->key;
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
