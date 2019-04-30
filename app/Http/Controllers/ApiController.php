<?php

namespace App\Http\Controllers;

use Tecnogo\MeliSdk\Entity\Category\Category;
use Tecnogo\MeliSdk\Entity\Currency\Currency;
use Tecnogo\MeliSdk\Entity\ListingType\ListingType;
use Tecnogo\MeliSdk\Entity\PaymentMethod\PaymentMethod;
use Tecnogo\MeliSdk\Entity\ShippingMethod\ShippingMethod;
use Tecnogo\MeliSdk\Entity\Site\Site;

class ApiController extends Controller
{
    /**
     * @return array
     */
    public function sites()
    {
        return \MeliSdk::sites()
            ->filter(function (Site $site) {
                // Some sites (cof cof MPT cof) are broken
                try {
                    return $site->raw();
                } catch (\Exception $e) {
                    return false;
                }
            })
            ->map(function (Site $site) {
                return [
                    'id' => (string)$site->id(),
                    'name' => $site->name(),
                    'flag' => $this->computeFlagUrl($site->name())
                ];
            });
    }

    /**
     * @param string $id
     * @return array
     */
    public function site($id)
    {
        $site = \MeliSdk::site($id);
        return [
            'id' => $site->id()->get(),
            'name' => $site->name(),
            'url' => $site->url(),
            'flag' => $this->computeFlagUrl($site->name())
        ];
    }

    /**
     * @param $siteId
     * @return array
     */
    public function categories($siteId)
    {
        $site = \MeliSdk::site($siteId);

        return $site->categories()
            ->map(function (Category $currency) {
                return [
                    'id' => $currency->id(),
                    'name' => $currency->name()
                ];
            })
            ->toArray();
    }

    /**
     * @param string $siteId
     * @return array
     */
    public function currencies($siteId)
    {
        $site = \MeliSdk::site($siteId);

        return $site->currencies()
            ->map(function (Currency $currency) {
                return [
                    'id' => $currency->id(),
                    'description' => $currency->description(),
                    'symbol' => $currency->symbol()
                ];
            })
            ->toArray();
    }

    /**
     * @param string $siteId
     * @return array
     */
    public function listingTypes($siteId)
    {
        $site = \MeliSdk::site($siteId);

        return $site->listingTypes()
            ->map(function (ListingType $listingType) {
                return [
                    'id' => $listingType->id(),
                    'name' => $listingType->name()
                ];
            })
            ->toArray();
    }

    /**
     * @param string $siteId
     * @return array
     */
    public function paymentMethods($siteId)
    {
        $site = \MeliSdk::site($siteId);

        return $site->paymentMethods()
            ->map(function (PaymentMethod $paymentMethod) {
                return [
                    'id' => $paymentMethod->id(),
                    'name' => $paymentMethod->name(),
                    'thumbnail' => $paymentMethod->thumbnail(),
                    'instalments' => collect($paymentMethod->payerCosts())
                        ->map(function ($payerCost) {
                            return $payerCost['installments'] ?? 1;
                        })
                        ->max()
                ];
            })
            ->toArray();
    }

    /**
     * @param string $siteId
     * @return array
     */
    public function shippingMethods($siteId)
    {
        $site = \MeliSdk::site($siteId);

        return $site->shippingMethods()
            ->map(function (ShippingMethod $paymentMethod) {
                return [
                    'id' => $paymentMethod->id(),
                    'name' => $paymentMethod->name(),
                    'company_name' => $paymentMethod->companyName()
                ];
            })
            ->toArray();
    }

    /**
     * @param string $name
     * @return string
     */
    private function computeFlagUrl($name)
    {
        return 'https://cdn.rawgit.com/hjnilsson/country-flags/master/svg/' . [
                'Argentina' => 'ar.svg',
                'Bolivia' => 'bo.svg',
                'Brasil' => 'br.svg',
                'Chile' => 'cl.svg',
                'Colombia' => 'co.svg',
                'Costa Rica' => 'cr.svg',
                'Cuba' => 'cu.svg',
                'Dominicana' => 'do.svg',
                'Ecuador' => 'ec.svg',
                'El Salvador' => 'sv.svg',
                'Guatemala' => 'gt.svg',
                'Honduras' => 'hn.svg',
                'Mexico' => 'mx.svg',
                'Nicaragua' => 'ni.svg',
                'Panamá' => 'pa.svg',
                'Paraguay' => 'py.svg',
                'Perú' => 'pe.svg',
                'Uruguay' => 'uy.svg',
                'Venezuela' => 've.svg',
            ][$name] ?? 'aq.svg';
    }
}
