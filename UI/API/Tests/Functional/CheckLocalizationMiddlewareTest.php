<?php

namespace App\Containers\Vendor\Localization\UI\API\Tests\Functional;

use App\Containers\Vendor\Localization\Tests\ApiTestCase;

/**
 * Class CheckLocalizationMiddlewareTest.
 *
 * @group localization
 * @group api
 */
class CheckLocalizationMiddlewareTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/localizations';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testIfMiddlewareSetsDefaultAppLanguage(): void
    {
        $data = [];
        $requestHeaders = [];
        $defaultLanguage = config('app.locale');

        $response = $this->makeCall($data, $requestHeaders);

        if (config('vendor-localization.localization_enabled')) {
            $response->assertStatus(200)
                ->assertHeader('content-language', $defaultLanguage);
        } else {
            $response->assertStatus(200)
                ->assertHeaderMissing('content-language', $defaultLanguage);
        }
    }

    public function testIfMiddlewareSetsCustomLanguage(): void
    {
        $language = 'fr';
        $data = [];
        $requestHeaders = [
            'accept-language' => $language,
        ];

        $response = $this->makeCall($data, $requestHeaders);

        if (config('vendor-localization.localization_enabled')) {
            $response->assertStatus(200)
                ->assertHeader('content-language', $language);
        } else {
            $response->assertStatus(200)
                ->assertHeaderMissing('content-language', $language);
        }
    }

    public function testIfMiddlewareThrowsErrorOnWrongLanguage(): void
    {
        $language = 'xxx';
        $data = [];
        $requestHeaders = [
            'accept-language' => $language,
        ];

        $response = $this->makeCall($data, $requestHeaders);

        if (config('vendor-localization.localization_enabled')) {
            $response->assertStatus(412);
        } else {
            $response->assertStatus(200);
        }
    }
}
