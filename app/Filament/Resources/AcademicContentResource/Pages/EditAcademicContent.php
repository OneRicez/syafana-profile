<?php

namespace App\Filament\Resources\AcademicContentResource\Pages;

use App\Filament\Resources\AcademicContentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAcademicContent extends EditRecord
{
    protected static string $resource = AcademicContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
