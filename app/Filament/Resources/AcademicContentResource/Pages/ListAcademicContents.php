<?php

namespace App\Filament\Resources\AcademicContentResource\Pages;

use App\Filament\Resources\AcademicContentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAcademicContents extends ListRecords
{
    protected static string $resource = AcademicContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
