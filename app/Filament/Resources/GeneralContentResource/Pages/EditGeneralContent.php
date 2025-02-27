<?php

namespace App\Filament\Resources\GeneralContentResource\Pages;

use App\Filament\Resources\GeneralContentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGeneralContent extends EditRecord
{
    protected static string $resource = GeneralContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
