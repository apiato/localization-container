<?php

namespace App\Containers\VendorSection\Localization\Tasks;

use App\Containers\VendorSection\Localization\Values\Localization;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Collection;

class GetAllLocalizationsTask extends Task
{
    public function run(): Collection
    {
        $supported_localizations = config('vendorSection-localization.supported_languages');

        $localizations = new Collection();

        foreach ($supported_localizations as $key => $value) {
            // it is a simple key
            if (!is_array($value)) {
                $localizations->push(new Localization($value));
            } else { // it is a composite key
                $localizations->push(new Localization($key, $value));
            }
        }

        return $localizations;
    }
}
