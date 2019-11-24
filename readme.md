# Laravel Carbonize
Convert dates automatically to Carbon

---
**NOTE**

This package is in very early development and not be used right now. Please visit our repository again later. 
It will also be possible to install it by composer at later moment.

---
## Usage

```php
->middleware('carbonize:format,date_field_name')
```

An example:

```php
->middleware('carbonize:d/m/Y,start_date,end_date')
```

This middle ware will attempt to parse the input `date_field_name` with the format `format`. 
If successful it will add a boolean `has_valid_date` to the request and replace the dates parameters with Carbon objects.

## Coming Soon

Right now it only performs verification in bulk, so if one input is of the wrong format, it will not convert anything to Carbon. So:

1.  Add the possibility to partially convert request params to Carbon

## Motivation
I was inspired to write this small middleware when writing some new features for an old Laravel project. 
The task at hand was to add some date range filtering capability, but it was also required to ignore these fields if they
were not of the correct format.



