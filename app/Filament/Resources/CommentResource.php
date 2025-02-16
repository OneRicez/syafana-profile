<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommentResource\Pages;
use App\Models\Comment;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\BulkAction;
use Filament\Notifications\Notification;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('content')
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        'unapproved' => 'Unapproved',
                        'approved' => 'Approved',
                        'spam' => 'Spam',
                    ])
                    ->default('pending')
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('email')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('content')
                    ->limit(50)
                    ->searchable(),
                TextColumn::make('status')
                    ->badge()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Submitted At')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'unapproved' => 'Unapproved',
                        'approved' => 'Approved',
                        'pending' => 'Pending',
                    ])
                    ->label('Filter by Status'),
            ])
            ->bulkActions([
                BulkAction::make('approve')
                    ->label('Approve Selected')
                    ->action(fn ($records) => $records->each->update(['status' => 'approved']))
                    ->requiresConfirmation()
                    ->color('success')
                    ->icon('heroicon-o-check-circle'),

                BulkAction::make('reject')
                    ->label('Reject Selected')
                    ->action(fn ($records) => $records->each->update(['status' => 'unapproved']))
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListComments::route('/'),
            'edit' => Pages\EditComment::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
       return false;
    }
}
