<?php

namespace App\Containers\Vendor\Localization\Actions;

use App\Containers\Vendor\Localization\Tasks\GetAllLocalizationsTask;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Collection;

class GetAllLocalizationsAction extends Action
{
	public function run(): Collection
	{
		return app(GetAllLocalizationsTask::class)->run();
	}
}
