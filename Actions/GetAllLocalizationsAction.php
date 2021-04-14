<?php

namespace App\Containers\VendorSection\Localization\Actions;

use App\Containers\VendorSection\Localization\Tasks\GetAllLocalizationsTask;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Collection;

class GetAllLocalizationsAction extends Action
{
	public function run(): Collection
	{
		return app(GetAllLocalizationsTask::class)->run();
	}
}
