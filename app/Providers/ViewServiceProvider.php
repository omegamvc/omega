<?php

declare(strict_types=1);

namespace App\Providers;

use DI\DependencyException;
use DI\NotFoundException;
use Omega\Http\Response;
use Omega\Container\Provider\AbstractServiceProvider;
use Omega\Support\Vite;
use Omega\View\Templator;
use Omega\View\TemplatorFinder;

use function array_merge;

class ViewServiceProvider extends AbstractServiceProvider
{
    /**
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function boot(): void
    {
        $this->registerViteResolver();
        $this->registerViewResolver();
    }

    protected function registerViteResolver(): void
    {
        $this->app->set('vite.gets', fn (): Vite => new Vite($this->app->getPublicPath(), '/build/'));
        $this->app->set('vite.location', fn (): string => $this->app->getPublicPath() . '/build/manifest.json');
        $this->app->set('vite.hasManifest', fn (): bool => file_exists($this->app->get('vite.location')));
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     */
    protected function registerViewResolver(): void
    {
        $globalTemplateVar = [
            'vite_has_manifest' => $this->app->get('vite.hasManifest'),
            'vite_hmr_script'   => $this->app->get('vite.gets')->isRunningHRM() ? $this->app->get('vite.gets')->getHmrScript() : '',
        ];
        $extensions = $this->app->get('config')['VIEW_EXTENSIONS'] ?? [];

        $this->app->set(TemplatorFinder::class, fn () => new TemplatorFinder(view_paths(), $extensions));
        $this->app->set('view.instance', fn () => new Templator($this->app->get(TemplatorFinder::class), compiled_view_path()));
        $this->app->set(
            'view.response',
            fn () => fn (string $view, array $data = []): Response => new Response(
                $this->app->get('view.instance')->render($view, array_merge($data, $globalTemplateVar))
            )
        );
    }
}
