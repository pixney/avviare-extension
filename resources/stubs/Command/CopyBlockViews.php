<?php

namespace DummyNamespace\Command;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Anomaly\Streams\Platform\Application\Application;
use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;

class CopyBlockViews extends Command
{
    use DispatchesJobs;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pixney:publish {block}';

    /**
     * The console command description.
     *1342 1152kcal 85kcal/100
     * @var string
     */
    protected $description    = 'Publish block views';
    protected $application;
    protected $blockNamespace;
    protected $path;
    protected $vendor;
    protected $slug;
    protected $type;
    protected $blockPath;
    protected $themePath;
    protected $filesystem;
    protected $themeNamespace;
    protected $blockSlug;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Application $application, Filesystem $filesystem)
    {
        $this->application = $application;
        $this->filesystem  = $filesystem;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->blockNamespace = $this->argument('block');
        $this->verifyNamespace($this->blockNamespace);

        // Create Block Path
        $this->setVendorTypeSlug($this->blockNamespace);
        $this->blockPath   = $this->makePath();
        $this->blockSlug   = $this->slug;

        // Create theme path
        $this->themeNamespace = app(SettingRepositoryInterface::class)->get('streams::standard_theme')->value;
        $this->setVendorTypeSlug($this->themeNamespace);
        $this->themePath = $this->makePath();

        // Copy block views over to the theme
        $this->filesystem->copyDirectory(
            "{$this->blockPath}/resources/views/blocks",
            "{$this->themePath}/resources/views/blocks/{$this->blockSlug}"
        );
    }

    private function makePath()
    {
        $shared = $this->application->getReference();
        return base_path("addons/{$shared}/{$this->vendor}/{$this->slug}-{$this->type}");
    }

    private function setVendorTypeSlug($namespace)
    {
        list($this->vendor, $this->type, $this->slug) = array_map(
            function ($value) {
                return str_slug(strtolower($value), '_');
            },
            explode('.', $namespace)
        );
    }

    private function verifyNamespace($namespace)
    {
        if (preg_match(' #^[a-zA-Z0-9_]+\.[a-zA-Z_]+\.[a-zA-Z0-9_]+\z#u', $namespace) !== 1) {
            throw new \Exception('The namespace should be snake case and formatted this way: {vendor}.{type}.{slug}');
        }
    }
}
