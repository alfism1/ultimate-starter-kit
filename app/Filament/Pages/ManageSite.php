<?php

namespace App\Filament\Pages;

use App\Settings\GeneralSettings;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\SettingsPage;
use Filament\Support\Facades\FilamentView;
use Illuminate\Contracts\Support\Htmlable;

use function Filament\Support\is_app_url;

class ManageSite extends SettingsPage
{
    use HasPageShield;
    protected static string $settings = GeneralSettings::class;

    protected static ?int $navigationSort = 99;
    protected static ?string $navigationIcon = 'heroicon-s-cog';

    /**
     * @var array<string, mixed> | null
     */
    public ?array $data = [];

    public string $themePath = '';

    public string $twConfigPath = '';

    public function mount(): void
    {
        $this->themePath = resource_path('css/filament/admin/theme.css');
        $this->twConfigPath = resource_path('css/filament/admin/tailwind.config.js');

        $this->fillForm();
    }

    protected function fillForm(): void
    {
        $settings = app(static::getSettings());

        $data = $this->mutateFormDataBeforeFill($settings->toArray());

        // $fileService = new FileService;

        // $data['theme-editor'] = $fileService->readfile($this->themePath);

        // $data['tw-config-editor'] = $fileService->readfile($this->twConfigPath);

        $this->form->fill($data);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Site')
                    ->label(fn() => __('Manage Site Settings Here.'))
                    ->description(fn() => __(''))
                    // ->icon('fluentui-web-asset-24-o')
                    ->schema([
                        Forms\Components\Grid::make()->schema([
                            Forms\Components\TextInput::make('site_name')
                                ->label(fn() => __('Site name'))
                                ->required(),
                            Forms\Components\Select::make('site_active')
                                ->label(fn() => __('Site Active'))
                                ->options([
                                    0 => "Not Active",
                                    1 => "Active",
                                ])
                                ->native(false)
                                ->required(),
                        ]),
                        Forms\Components\Grid::make()->schema([
                            Forms\Components\Grid::make()->schema([
                                Forms\Components\FileUpload::make('site_logo')
                                    ->label(fn() => __('Site Logo'))
                                    ->image()
                                    // ->directory('sites')
                                    // ->visibility('public')
                                    // ->moveFiles()
                                    ->required()
                                    ->columnSpan(2),
                            ])
                                ->columnSpan(2),
                            Forms\Components\FileUpload::make('site_favicon')
                                ->label(fn() => __('Site Favicon'))
                                ->image()
                                ->directory('sites')
                                ->visibility('public')
                                ->moveFiles()
                                ->acceptedFileTypes(['image/x-icon', 'image/vnd.microsoft.icon'])
                                ->required(),
                        ])->columns(4),
                    ]),
                Forms\Components\Tabs::make('Tabs')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Color Palette')
                            ->schema([
                                Forms\Components\ColorPicker::make('site_theme.primary')
                                    ->label(fn() => __('Primary'))->rgb(),
                                Forms\Components\ColorPicker::make('site_theme.secondary')
                                    ->label(fn() => __('Secondary'))->rgb(),
                                Forms\Components\ColorPicker::make('site_theme.gray')
                                    ->label(fn() => __('gray'))->rgb(),
                                Forms\Components\ColorPicker::make('site_theme.success')
                                    ->label(fn() => __('success'))->rgb(),
                                Forms\Components\ColorPicker::make('site_theme.danger')
                                    ->label(fn() => __('danger'))->rgb(),
                                Forms\Components\ColorPicker::make('site_theme.info')
                                    ->label(fn() => __('info'))->rgb(),
                                Forms\Components\ColorPicker::make('site_theme.warning')
                                    ->label(fn() => __('warning'))->rgb(),
                            ])
                            ->columns(3),
                    ])
                    ->persistTabInQueryString()
                    ->columnSpanFull(),
            ])
            ->columns(3)
            ->statePath('data');
    }

    public function save(): void
    {
        try {
            $data = $this->mutateFormDataBeforeSave($this->form->getState());

            $settings = app(static::getSettings());

            $settings->fill($data);
            $settings->save();

            // $fileService = new FileService;
            // $fileService->writeFile($this->themePath, $data['theme-editor']);
            // $fileService->writeFile($this->twConfigPath, $data['tw-config-editor']);

            Notification::make()
                ->title('Settings updated.')
                ->success()
                ->send();

            $this->redirect(static::getUrl(), navigate: FilamentView::hasSpaMode() && is_app_url(static::getUrl()));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function getNavigationGroup(): ?string
    {
        return "Settings";
    }

    public static function getNavigationLabel(): string
    {
        return "Manage Site";
    }

    public function getTitle(): string|Htmlable
    {
        return "Manage Site";
    }

    public function getHeading(): string|Htmlable
    {
        return "Manage Site";
    }

    public function getSubheading(): string|Htmlable|null
    {
        return "Update your site settings here.";
    }
}
