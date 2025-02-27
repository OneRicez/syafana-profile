<?php

namespace App\Filament\Resources\GeneralContentResource\Pages;

use App\Filament\Resources\GeneralContentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGeneralContents extends ListRecords
{
    protected static string $resource = GeneralContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
