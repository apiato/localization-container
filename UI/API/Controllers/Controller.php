<?php

namespace App\Containers\VendorSection\Localization\UI\API\Controllers;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\VendorSection\Localization\Actions\GetAllLocalizationsAction;
use App\Containers\VendorSection\Localization\UI\API\Requests\GetAllLocalizationsRequest;
use App\Containers\VendorSection\Localization\UI\API\Transformers\LocalizationTransformer;
use App\Ship\Parents\Controllers\ApiController;

class Controller extends ApiController
{
	public function getAllLocalizations(GetAllLocalizationsRequest $request): array
	{
		$localizations = Apiato::call(GetAllLocalizationsAction::class);
		return $this->transform($localizations, LocalizationTransformer::class);
	}
}
