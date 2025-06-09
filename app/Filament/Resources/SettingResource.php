<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Guava\FilamentIconPicker\Forms\IconPicker;
use Illuminate\Database\Eloquent\Model;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $slug = 'settings';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        $record = $form->getRecord();

        if ($record->key === 'payment') {
            $schema = [
                RichEditor::make('value')->columnSpanFull()->label('')
            ];
        } elseif ($record->type === 'slider') {
            $schema = [Repeater::make('values')->label('Slides')
                ->columnSpanFull()
                ->defaultItems(1)
                ->addActionLabel('Add Slide')
                ->columns(2)
                ->schema([
                    FileUpload::make('image')->image()->label('Image')->columnSpanFull(),
                    TextInput::make('title')->label('Title'),
                    TextInput::make('description')->label('Description'),
                    ColorPicker::make('color')->label('Color')->default('#ffffff')->columnSpanFull(),
                ])];
        } elseif ($record->type === 'social_links') {
            $schema = [Repeater::make('values')->label('Social Links')
                ->columnSpanFull()
                ->defaultItems(1)
                ->addActionLabel('Add Link')
                ->columns(2)
                ->schema([
                    TextInput::make('name')->label('Name'),
                    TextInput::make('url')->label('URL'),
                    IconPicker::make('icon')->label('Icon')->columns(['default' => 5,
                        'lg' => 5,
                        '2xl' => 5,])->preload()->sets(['bootstrap-icons']),
                ])];

        } else {
            $schema = [
                TextInput::make('value')->columnSpanFull()->label('')
            ];
        }

        return $form->schema($schema);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('key'),

            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [];
    }
}
