<?php

namespace InovacionAL\LaravelCarbonize\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Carbonize
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param $format Date Format
     * @param array $fieldNames name of date fields
     * @return mixed
     */
    public function handle($request, Closure $next, $format, ...$fieldNames)
    {
        $validationRules = [];
        foreach ($fieldNames as $fieldName) {
            $validationRules[$fieldName] = "date_format:$format";
        }

        $request['has_valid_dates'] = false;
        $dateValidator = Validator::make($request->only($fieldNames), $validationRules);

        if ($dateValidator->passes()) {
            $request['has_valid_dates'] = true;
            foreach ($fieldNames as $fieldName) {
                $request[$fieldName] = Carbon::createFromFormat($format, $request->get($fieldName));
            }
        }

        return $next($request);
    }
}
