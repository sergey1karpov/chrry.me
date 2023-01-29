<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AddNewProperty extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'property:add {model} {property*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add new property or properties to model';

    /**
     * Model namespace
     *
     * @var string
     */
    private string $namespace = '\App\Models\\';

    /**
     * New properties from second param artisan command {property*}
     *
     * @var array
     */
    private array $properties = [];

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $model = $this->namespace . $this->argument('model');

        foreach ($this->argument('property') as $property => $value)
        {
            $this->properties[$value] = null;
        }

        foreach ($model::all() as $model)
        {
            $fields = unserialize($model->properties);

            $withNewFields = array_merge($fields, $this->properties);

            $model::where('id', '>', 0)->update([
                'properties' => serialize($withNewFields)
            ]);
        }
    }
}
