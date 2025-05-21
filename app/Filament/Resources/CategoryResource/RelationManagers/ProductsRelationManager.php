<?php

namespace App\Filament\Resources\CategoryResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Actions\DetachAction;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductsRelationManager extends RelationManager
{
    protected static string $relationship = 'products';

    public function form(Form $form): Form
    {
        return $form
            ->schema([

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
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
            ->headerActions([
                AttachAction::make()->label('Add Products')->preloadRecordSelect(),
            ])
            ->actions([
                DetachAction::make()->label('remove')
            ])->contentGrid([
                'xs' => 3,
                'lg' => 5
            ]);
    }
}
