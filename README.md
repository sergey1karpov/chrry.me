## Add new property to model 

Sometimes we add new css properties for model design. All properties are stored in one field in the database in json format and are passed to the template as an array or object.

Since the property is new, users cannot have it. But it is present in the template, which can cause an error in the case of an array "Missing key" or in the case of an object "Missing property"

To avoid such errors, each new property or properties must be added using the artisan command

> - **First param** is the model name (Link, Event ...)
> - **Second param** is _array_ of new properties with entity prefix (dl, de ...)
> 
`php artisan property:add {model} {property*}` 

___

## Events clear

This command delete yesterday's events. Start's by `cron` every day.

`php artisan drop:events` 

___

## Start queue

This queue start one in 12 hour and sending mail's to event followers by `cron`

`php artisan queue:work --stop-when-empty`

