<?php

namespace App\Filament\Widgets;

use App\Models\Comment;
use Filament\Widgets\Widget;

class PendingCommentsCount extends Widget
{
    protected static string $view = 'filament.components.pending-comments-count';


    // Pass data to the Blade view
    protected function getViewData(): array
    {
        return [
            'pendingCount' => Comment::where('status', 'pending')->count(),
        ];
    }
}
