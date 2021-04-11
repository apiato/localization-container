<?php

namespace App\Containers\VendorSection\Localization\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\VendorSection\Localization\Tasks\GetAllLocalizationsTask;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Collection;

class GetAllLocalizationsAction extends Action
{
	public function run(): Collection
	{
		return Apiato::call(GetAllLocalizationsTask::class);
	}
}
