<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration {
    public function up(): void
    {
        $this->migrator->add('general.site_name', 'Spatie');
        $this->migrator->add('general.site_logo', '');
        $this->migrator->add('general.logo_height', '100');
        $this->migrator->add('general.site_active', true);
        $this->migrator->add('general.site_favicon', 'sites/logo.ico');
        $this->migrator->add('general.site_theme', [
            "primary" => "rgb(19, 83, 196)",
            "secondary" => "rgb(255, 137, 84)",
            "gray" => "rgb(107, 114, 128)",
            "success" => "rgb(12, 195, 178)",
            "danger" => "rgb(199, 29, 81)",
            "info" => "rgb(113, 12, 195)",
            "warning" => "rgb(255, 186, 93)",
        ]);
    }

    public function down(): void
    {
        $this->migrator->deleteIfExists('general.site_name');
        $this->migrator->deleteIfExists('general.site_logo');
        $this->migrator->deleteIfExists('general.logo_height');
        $this->migrator->deleteIfExists('general.site_active');
        $this->migrator->deleteIfExists('general.site_favicon');
        $this->migrator->deleteIfExists('general.site_theme');
    }
};
