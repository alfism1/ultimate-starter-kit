<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
  public string $site_name;
  public ?string $site_logo;
  public bool $site_active;
  public ?string $site_favicon;
  public array $site_theme;

  public static function group(): string
  {
    return 'general';
  }
}
