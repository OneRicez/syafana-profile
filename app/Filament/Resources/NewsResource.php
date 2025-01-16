<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\RelationManagers;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\Layout\Grid;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Log;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->required()->maxLength(255),
                RichEditor::make('content')
                ->columnSpan(2)
                ->maxLength(65535),
                FileUpload::make('image')
                ->image()
                ->required(),            
                Select::make('category')
                    ->options([
                        'tech' => 'Tech',
                        'lifestyle' => 'Lifestyle',
                        'news' => 'News',
                    ])
                    ->required(),
                TextInput::make('author')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Grid::make()->columns(1)
                ->schema([
                    Tables\Columns\ImageColumn::make('image')->width(300)->height(200)->extraAttributes(['class' => 'object-scale-down']),
                    Tables\Columns\TextColumn::make('title')->sortable()->searchable()->weight(FontWeight::Bold),
                    Tables\Columns\TextColumn::make('content')->searchable()->getStateUsing(function ($record) {
                        return strip_tags((string) $record->content); // Bersihkan HTML dengan aman
                    }),
                    Tables\Columns\TextColumn::make('category')->sortable()->searchable(),
                    Tables\Columns\TextColumn::make('author')->sortable()->searchable()->extraAttributes(['class' => 'italic']),
                    Tables\Columns\TextColumn::make('updated_at')->datetime('D, d M y')->sortable()->searchable()->extraAttributes(['class' => 'italic']),
                ])
            ])
            ->contentGrid(['md'=>2,'xl'=> 3])
            ->filters([
                SelectFilter::make('status') // Create a select filter for status
                ->options([
                    'draft' => 'Draft',
                    'published' => 'Published',
                    'takendown' => 'Taken Down',
                ])
                ->label('Filter by Status') // Optional: Custom label for the filter
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                BulkAction::make('updateStatus')  // Define the bulk action
                ->label('Update Status')  // Label of the action
                ->icon('heroicon-o-pencil')  // Optional icon for the action
                ->form([
                    Select::make('status')  // Field to select the new status
                        ->options([
                            'draft' => 'Draft',
                            'published' => 'Published',
                            'takendown' => 'Taken Down',
                        ])
                        ->label('New Status')  // Label for the field
                        ->required(),
                ])
                ->action(function (array $records, array $data) {
                    // Action to update the status for selected records
                    foreach ($records as $record) {
                        $record->update(['status' => $data['status']]);
                    }
                }),
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
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}
