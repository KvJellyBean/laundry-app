<?php

namespace App\Providers\Filament;

use Althinect\FilamentSpatieRolesPermissions\FilamentSpatieRolesPermissions;
use Althinect\FilamentSpatieRolesPermissions\FilamentSpatieRolesPermissionsPlugin;
use Althinect\FilamentSpatieRolesPermissions\Resources\PermissionResource;
use Althinect\FilamentSpatieRolesPermissions\Resources\RoleResource;
use App\Filament\Auth\Register;
use App\Filament\Resources\FinancialReportResource;
use App\Filament\Resources\OrderResource;
use App\Filament\Resources\ServicePackageResource;
use App\Filament\Resources\TransactionResource;
use App\Filament\Resources\UserResource;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Pages;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

// Class untuk mengkonfigurasi panel admin Filament
class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()      // Menggunakan konfigurasi default panel
            ->sidebarCollapsibleOnDesktop()  // Mengaktifkan kolaps sidebar pada desktop
            ->id('admin')  // Menetapkan ID panel sebagai 'admin'
            ->path('dashboard')  // Menetapkan path dashboard
            ->login()  // Menambahkan login
            ->registration(Register::class)  // Menambahkan registrasi dengan kelas Register
            ->colors([
                'primary' => Color::Orange,  // Menetapkan warna utama panel
            ])
            ->font('Poppins')  // Menetapkan font panel
            ->discoverResources(app_path('Filament/Resources'), 'App\\Filament\\Resources')  // Menemukan resources Filament di folder yang ditentukan
            ->discoverPages(app_path('Filament/Pages'), 'App\\Filament\\Pages')  // Menemukan halaman Filament di folder yang ditentukan
            ->pages([
                Pages\Dashboard::class,  // Menambahkan halaman dashboard
            ])
            ->discoverWidgets(app_path('Filament/Widgets'), 'App\\Filament\\Widgets')  // Menemukan widget Filament di folder yang ditentukan
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])  // Menetapkan middleware yang digunakan oleh panel
            ->authMiddleware([
                Authenticate::class,         // Menetapkan middleware otentikasi
            ])
            ->plugin(FilamentSpatieRolesPermissionsPlugin::make())
            ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
                $user = auth()->user();
                $servicesGroup = $user && $user->hasRole('user') ? 'Services' : 'Data Management';
                $ordersTransactionsGroup = $user && $user->hasRole('user') ? 'Orders & Transactions' : 'Sales';

                return $builder
                    ->groups([
                        NavigationGroup::make()
                            ->items([
                                NavigationItem::make('Dashboard')
                                    ->icon('heroicon-o-home')
                                    ->activeIcon('heroicon-s-home')
                                    ->isActiveWhen(fn (): bool => request()->routeIs('filament.admin.pages.dashboard'))
                                    ->url(fn (): string => Dashboard::getUrl()),
                            ]),
                        NavigationGroup::make($servicesGroup)  // Membuat grup navigasi untuk Services atau Data Management
                            ->items(array_merge(
                                ($user && $user->can('roles-permissions')) ? PermissionResource::getNavigationItems() : [],
                                ($user && $user->can('roles-permissions')) ? RoleResource::getNavigationItems() : [],
                                ($user && $user->can('view user')) ? UserResource::getNavigationItems() : [],
                                ($user && $user->can('view service packages')) ? ServicePackageResource::getNavigationItems() : [],
                            )),
                        NavigationGroup::make($ordersTransactionsGroup)      // Membuat grup navigasi untuk Orders & Transactions atau Sales
                            ->items([
                                ...OrderResource::getNavigationItems(),
                                ...TransactionResource::getNavigationItems(),
                            ]),
                        NavigationGroup::make('Reports') // Membuat grup navigasi untuk Reports
                            ->items(
                                array_merge(
                                    ($user && $user->can('view financial reports')) ? FinancialReportResource::getNavigationItems() : [],
                                ),
                            ),
                    ]);
            });
    }
}
