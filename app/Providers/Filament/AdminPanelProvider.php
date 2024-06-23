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
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->sidebarCollapsibleOnDesktop()
            ->id('admin')
            ->path('dashboard')
            ->login()
            ->registration(Register::class)
            ->colors([
                'primary' => Color::Orange,
            ])
            ->font('Poppins')
            ->discoverResources(app_path('Filament/Resources'), 'App\\Filament\\Resources')
            ->discoverPages(app_path('Filament/Pages'), 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(app_path('Filament/Widgets'), 'App\\Filament\\Widgets')
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
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->plugin(FilamentSpatieRolesPermissionsPlugin::make())
            ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
                $user = auth()->user();

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
                        NavigationGroup::make('Data Management')
                            ->items(array_merge(
                                ($user && $user->can('roles-permissions')) ? PermissionResource::getNavigationItems() : [],
                                ($user && $user->can('roles-permissions')) ? RoleResource::getNavigationItems() : [],
                                UserResource::getNavigationItems(),
                                ServicePackageResource::getNavigationItems()
                            )),
                        NavigationGroup::make('Sales')
                            ->items([
                                ...OrderResource::getNavigationItems(),
                                ...TransactionResource::getNavigationItems(),
                            ]),
                        NavigationGroup::make('Reports')
                            ->items([
                                ...FinancialReportResource::getNavigationItems(),
                            ]),
                    ]);
            });
    }
}
