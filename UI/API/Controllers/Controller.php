<?php

namespace App\Containers\Vendor\Localization\UI\API\Controllers;

use App\Containers\Vendor\Localization\Actions\GetAllLocalizationsAction;
use App\Containers\Vendor\Localization\UI\API\Requests\GetAllLocalizationsRequest;
use App\Containers\Vendor\Localization\UI\API\Transformers\LocalizationTransformer;
use App\Ship\Parents\Controllers\ApiController;

class Controller extends ApiController
{
	public function getAllLocalizations(GetAllLocalizationsRequest $request): array
	{
		$localizations = app(GetAllLocalizationsAction::class)->run();
		return $this->transform($localizations, LocalizationTransformer::class);
	}
}
