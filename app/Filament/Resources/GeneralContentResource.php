<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GeneralContentResource\Pages;
use App\Filament\Resources\GeneralContentResource\RelationManagers;
use App\Models\Content;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Validation\Rule;

class GeneralContentResource extends Resource
{
    protected static ?string $model = Content::class;
    protected static ?string $label = 'General Management';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Select::make('type')
                ->options([
                    'text' => 'Text',
                    'image' => 'Image',
                    'url' => 'Url'
                ])
                ->reactive()
                ->required(),
            Forms\Components\Hidden::make('page_id') // Sembunyikan agar otomatis diisi
                ->default(fn () => \App\Models\Page::where('name', 'general')->value('id'))
                ->required(),

            Textarea::make('description')
                ->rules(fn ($get) => [
                    'required',
                    Rule::unique('contents', 'description')->ignore($get('id')), 
                ])
                ->nullable(),
            

            Forms\Components\Textarea::make('url')
                ->visible(fn ($get) => $get('type') === 'url') 
                ->required(),

            Forms\Components\Textarea::make('content')
                ->visible(fn ($get) => in_array($get('type'), ['text', 'url']))
                ->required(fn ($get) => $get('type') !== 'url'), 
            

            Forms\Components\FileUpload::make('img_path')
            ->image()
            ->visible(fn ($get) => $get('type') === 'image'), 

            Forms\Components\Textarea::make('alt')
            ->visible(fn ($get) => $get('type') === 'image' || $get('type') === 'url')
            ->required(),

            Forms\Components\Select::make('status')
            ->options([
                'shown' => 'Show',
                'hidden' => 'Hidden'
            ])
                ->required(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('description')
                    ->limit(50)->searchable(), // ✅ Cegah error
    
                TextColumn::make('content')
                    ->limit(10)->searchable(),
    
                TextColumn::make('url')
                    ->limit(10)->searchable(),
                    
                Tables\Columns\ImageColumn::make('img_path')
                ->width(400)
                ->height(200),
    
                TextColumn::make('alt')
                ->limit(10)->searchable(),
    
                SelectColumn::make('status')
                ->options([
                    'shown' => 'Show',
                    'hidden' => 'Hide'
                ])
                ->rules(['required', Rule::in(['shown', 'hidden'])])
                ->width(1)
                
            ])
            ->modifyQueryUsing(fn($query) => $query->whereHas('page', fn($q) => $q->where('name', 'general')))
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->label('Filter by Type') // Label filter di sidebar Filament
                    ->options([
                        'text' => 'Text',
                        'image' => 'Image',
                    ])
                    ->default(null), // Filter data
            ])
            ->actions([Tables\Actions\EditAction::make()])->bulkActions([
                BulkAction::make('shown')
                    ->label('Show Selected')
                    ->action(fn ($records) => $records->each->update(['status' => 'shown']))
                    ->requiresConfirmation()
                    ->color('success')
                    ->icon('heroicon-o-check-circle'),
    
                BulkAction::make('hidden')
                    ->label('Hide Selected')
                    ->action(fn ($records) => $records->each->update(['status' => 'hidden']))
                    ->requiresConfirmation()
                    ->color('danger')
                    ->icon('heroicon-o-x-circle'),
    
                BulkAction::make('delete')
                    ->label('Delete Selected')
                    ->action(fn ($records) => $records->each->delete())
                    ->requiresConfirmation()
                    ->color('warning')
                    ->icon('heroicon-o-trash'),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGeneralContents::route('/'),
            'create' => Pages\CreateGeneralContent::route('/create'),
            'edit' => Pages\EditGeneralContent::route('/{record}/edit'),
        ];
    }
}
