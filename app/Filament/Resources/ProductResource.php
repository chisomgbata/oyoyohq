<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $slug = 'products';

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Toggle::make('published_at')->columnSpanFull()->label('Published'),
                TextInput::make('name')
                    ->required(),
                TextInput::make('price')->numeric()
                    ->required(),
                RichEditor::make('description')
                    ->columnSpanFull()
                    ->required(),
                SpatieMediaLibraryFileUpload::make('images')
                    ->panelLayout('grid')
                    ->image()
                    ->multiple()
                    ->reorderable()
                    ->appendFiles()
                    ->columnSpanFull()->responsiveImages(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Stack::make([
                    SpatieMediaLibraryImageColumn::make('images')
                        ->height('auto')
                        ->extraImgAttributes(['class' => 'w-full rounded aspect-square', 'style' => 'aspect-ratio: 1 / 1'])
                        ->limit(1),
                    TextColumn::make('name')
                        ->weight('bold')
                        ->size(TextColumn\TextColumnSize::Large)
                        ->searchable()
                    ,
                ])
            ])
            ->filters([
                //
            ])
            ->actions([

            ])
            ->bulkActions([
//                BulkActionGroup::make([
//                    DeleteBulkAction::make(),
//                ]),
            ])->contentGrid([
                'xs' => 3,
                'lg' => 5
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name'];
    }
}
