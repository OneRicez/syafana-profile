<?php

namespace App\Filament\Resources;
use Illuminate\Database\Eloquent\Collection;
use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\RelationManagers;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Str;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\Layout\Grid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Log;
use Stringable;
use Illuminate\Support\HtmlString;
class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->required()->maxLength(255)->live(onBlur: true)
                ->afterStateUpdated(function (string $state, Set $set) {
                    $set('slug', Str::slug($state));
                }),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                RichEditor::make('content')
                ->columnSpan(2)
                ->maxLength(65535),
                FileUpload::make('image')
                ->image()
                ->required(),            
                Select::make('category')
                    ->relationship(name:'category',titleAttribute:'name')
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
            Grid::make()->columns(1)->schema([
                ImageColumn::make('image')
                    ->width(300)
                    ->height(200)
                    ->extraAttributes(['class' => 'object-scale-down']),

                TextColumn::make('title')
                    ->sortable()
                    ->searchable()
                    ->weight(FontWeight::Bold),

                TextColumn::make('content')
                    ->searchable()
                    ->getStateUsing(function ($record) {
                        // Bersihkan HTML
                        $cleanContent = strip_tags((string) $record->content);

                        // Pecah konten menjadi paragraf
                        $paragraphs = array_filter(explode("\n", $cleanContent));

                        // Ambil 2 paragraf pertama
                        $limitedParagraphs = array_slice($paragraphs, 0, 2);

                        // Gabungkan kembali dan tambahkan ellipsis jika ada paragraf selanjutnya
                        $result = implode("\n", $limitedParagraphs);
                        if (count($paragraphs) > 2) {
                            $result .= '...';
                        }

                        return $result;
                    })
                    ->html() // Jika ingin mendukung line break
                    ->words(50), // Opsional: batasi jumlah kata

                TextColumn::make('category')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('author')
                    ->sortable()
                    ->searchable()
                    ->extraAttributes(['class' => 'italic']),

                TextColumn::make('updated_at')
                    ->datetime('D, d M y')
                    ->sortable()
                    ->searchable()
                    ->extraAttributes(['class' => 'italic']),

                TextColumn::make('status')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(function ($state) {
                        $color = 'gray'; // Default
                        $icon = 'heroicon-o-document-text'; // Default

                        switch ($state) {
                            case 'published':
                                $color = 'green';
                                break;
                            case 'draft':
                                $color = 'yellow';
                                break;
                            case 'takendown':
                                $color = 'red';
                                break;
                        }

                        return new HtmlString("
                            <div class='flex items-center space-x-2'>
                                <span class='text-{$color}-500'>
                                    <x-dynamic-component :component=\"$icon\" class='w-5 h-5' />
                                </span>
                                <span class='text-{$color}-700 font-medium' style='color:{$color}'>
                                    " . e(ucwords($state)) . "
                                </span>
                            </div>
                        ");
                    })
                    ->html(),
            ]),
        ])
        ->contentGrid(['md' => 2, 'xl' => 3]) // Pastikan ini diterapkan pada `table()`, bukan `columns()`
        ->filters([
            SelectFilter::make('status')
                ->options([
                    'draft' => 'Draft',
                    'published' => 'Published',
                    'takendown' => 'Taken Down',
                ])
                ->label('Filter by Status'),
        ])
        ->actions([
            EditAction::make(),
            DeleteAction::make(),
        ])
        ->bulkActions([
            DeleteBulkAction::make(),
            BulkAction::make('updateStatus')
                ->label('Update Status')
                ->icon('heroicon-o-pencil')
                ->form([
                    Select::make('status')
                        ->options([
                            'draft' => 'Draft',
                            'published' => 'Published',
                            'takendown' => 'Taken Down',
                        ])
                        ->label('New Status')
                        ->required(),
                ])
                ->action(function (Collection $records, array $data) { 
                    foreach ($records as $record) {
                        $record->update(['status' => $data['status']]);
                    }
                })                
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
