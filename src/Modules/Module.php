<?php

namespace Anbu\Modules;

use ReflectionClass;
use Illuminate\Foundation\Application;

abstract class Module
{
    /**
     * The display name of the module.
     *
     * @var string
     */
    protected $name;

    /**
     * The short or URL friendly name of the module.
     *
     * @var string
     */
    protected $slug;

    /**
     * A description of the modules purpose.
     *
     * @var string
     */
    protected $description = 'No description present.';

    /**
     * Get the template view for this module.
     *
     * @var string
     */
    protected $template = 'default';

    /**
     * An array of accessible assets.
     *
     * @var array
     */
    protected $assets = [];

    /**
     * An array of data for the rendering of this module.
     *
     * @var array
     */
    protected $data = [];

    /**
     * Laravel application instance for the current request.
     *
     * @var Illuminate\Foundation\Application
     */
    protected $app;

    /**
     * Executed during service provider loading.
     *
     * @return void
     */
    public function register()
    {
        // Called during service provider registration.
    }

    /**
     * Execute after framework request cycle.
     *
     * @return void
     */
    public function after()
    {
        // Called after the framework request cycle.
    }

    /**
     * Get the display name for this module.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the URL friendly name for this module.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Get the description for this module.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the template view for this module.
     *
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * Get an array of accessible assets for this module.
     *
     * @return array
     */
    public function getAssets()
    {
        return $this->styles;
    }

    /**
     * Access the modules template data array.
     *
     * @return array
     */
    public function getData()
    {
        return $this->data();
    }

    /**
     * Get the path to the module directory.
     *
     * @return string
     */
    public function getPath()
    {
        // Create reflection class.
        $reflection = new ReflectionClass($this);

        // Get directory of class.
        return dirname($reflection->getFileName());
    }

    /**
     * Set the application instance for the module.
     *
     * @param Application $app
     */
    public function setApplication(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Retrieve a storable representation of this modules data.
     *
     * @return array
     */
    public function getStorage()
    {
        return [
            'name'          => $this->name,
            'slug'          => $this->slug,
            'path'          => $this->getPath(),
            'template'      => $this->template,
            'data'          => $this->data
        ];
    }
}
