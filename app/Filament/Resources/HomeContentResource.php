<?php

namespace App\Filament\Resources;
use App\Filament\Resources\HomeContentResource\Pages;
use App\Models\Content;
use App\Models\Page;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Validation\Rule;

class HomeContentResource extends Resource
{
    protected static ?string $model = Content::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?string $label = 'Home Management';

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
                ->default(fn () => \App\Models\Page::where('name', 'home')->value('id'))
                ->required(),

            Textarea::make('description')
                ->rules(fn ($get) => [
                    'required',
                    Rule::unique('contents', 'description')->ignore($get('id')), 
                ])
                ->nullable(),
            

            Forms\Components\Textarea::make('url')
                ->visible(fn ($get) => $get('type') === 'url') 
                ->dehydrateStateUsing(fn ($state) => self::convertYoutubeUrl($state))
                ->required(),

            Forms\Components\RichEditor::make('content')
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

    public static function convertYoutubeUrl($url) {
        parse_str(parse_url($url, PHP_URL_QUERY), $queryParams);
        return isset($queryParams['v']) ? "https://www.youtube.com/embed/" . $queryParams['v'] : $url;
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
        ->modifyQueryUsing(fn($query) => $query->whereHas('page', fn($q) => $q->where('name', 'home')))
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


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHomeContent::route('/'),
            'edit' => Pages\EditHomeContent::route('/{record}/edit'),
        ];
    }
}
