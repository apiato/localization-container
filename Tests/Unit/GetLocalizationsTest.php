<?php

namespace App\Containers\VendorSection\Localization\Tests\Unit;

use App\Containers\VendorSection\Localization\Tasks\GetAllLocalizationsTask;
use App\Containers\VendorSection\Localization\Tests\TestCase;
use App\Containers\VendorSection\Localization\Values\Localization;

/**
 * Class GetLocalizationsTest.
 *
 * @group localization
 * @group unit
 */
class GetLocalizationsTest extends TestCase
{
    public function testIfAllSupportedLanguagesAreReturned(): void
    {
	    $localizations = app(GetAllLocalizationsTask::class)->run();

        $configuredLocalizations = config('vendorSection-localization.supported_languages', []);

        self::assertEquals(count($configuredLocalizations), $localizations->count());
    }

    public function testIfSpecificLocaleIsReturned(): void
    {
        $localizations = app(GetAllLocalizationsTask::class)->run();

        $unsupportedLocale = new Localization('fr');
        self::assertContainsEquals($unsupportedLocale, $localizations);
    }

    public function testIfSpecificLocaleWithRegionsIsReturned(): void
    {
        $localizations = app(GetAllLocalizationsTask::class)->run();

        $unsupportedLocale = new Localization('en', ['en-GB', 'en-US']);
        self::assertContainsEquals($unsupportedLocale, $localizations);
    }

    public function testIfWrongLocaleIsNotReturned(): void
    {
        $localizations = app(GetAllLocalizationsTask::class)->run();

        $unsupportedLocale = new Localization('xxx');
        self::assertNotContainsEquals($unsupportedLocale, $localizations);
    }
}
