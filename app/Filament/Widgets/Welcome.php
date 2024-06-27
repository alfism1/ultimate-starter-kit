<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class Welcome extends Widget
{
  protected static ?int $sort = 0;

  protected static string $view = 'livewire.welcome';

  protected int|string|array $columnSpan = 'full';
}
