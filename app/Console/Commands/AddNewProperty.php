<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

/**
 * @psalm-ignore
 */
class AddNewProperty extends Command
{
    /**
     * @var string
     */
    protected $signature = 'property:add {model} {property*}';

    /**
     * @var string
     */
    protected $description = 'Add new property or properties to model';

    /**
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
     * @return void
     */
    public function handle(): void
    {
        $model = $this->namespace . $this->argument('model');

        foreach ($this->argument('property') as $property => $value) {
            $this->properties[$value] = null;
        }

        $fields = [];
        foreach ($model::all() as $model) {
            $fields[] = unserialize($model->properties);
        }

        foreach ($fields as $field) {
            $withNewFields = array_merge($field, $this->properties);

            $model::where('id', '>', 0)->update([
                'properties' => serialize($withNewFields)
            ]);
        }
    }
}
