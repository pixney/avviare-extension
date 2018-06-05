<?php

namespace Pixney\AvviareExtension\Command;

use Illuminate\Filesystem\Filesystem;
use Anomaly\Streams\Platform\Support\Parser;

/**
 * Class ScaffoldTheme
 *
 *  @author Pixney AB <hello@pixney.com>
 *  @author William Åström <william@pixney.com>
 *
 *  @link https://pixney.com
 */
class ScaffoldTheme
{
    /**
     * Copy these theme folders.
     *
     * @var array
     */
    protected $copy = [
        'fonts',
        'js',
        'scss',
        'views',
    ];

    /**
     * The addon path.
     *
     * @var string
     */
    private $path;

    /**
     * Create a new ScaffoldTheme instance.
     *
     * @param $path
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * Handle the command.
     *
     * @param Parser $parser
     * @param Filesystem $filesystem
     */
    public function handle(Filesystem $filesystem)
    {
        foreach ($this->copy as $copy) {
            $filesystem->copyDirectory(
                base_path('vendor/anomaly/streams-platform/resources/stubs/addons/resources/' . $copy),
                "{$this->path}/resources/" . $copy
            );
        }
    }
}
