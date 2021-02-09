<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RajaOngkirController extends Controller
{
    private $key = '0423f17d6162da8879940e6cb67f1562';
    private $endpoint = 'https://api.rajaongkir.com/starter/';

    public function getProvince()
    {
        $url = $this->endpoint . 'province?key=' . $this->key;
        $province = Http::get($url);
        $prov = $province->json()['rajaongkir']['results'];

        $html = '';

        foreach ($prov as $p) {
            $html .= "<option data-id=" . $p['province_id'] . " value='" . $p['province'] . "'>" . $p['province'] . "</option>";
        }

        return $html;
    }

    public function getCity($id_province)
    {
        $url = $this->endpoint . 'city?key=' . $this->key . '&province=' . $id_province;
        $city = Http::get($url);
        $cities = $city->json()['rajaongkir']['results'];

        $html = '';

        foreach ($cities as $p) {
            $html .= "<option data-id=" . $p['city_id'] . " value='" . $p['type'] . ' ' . $p['city_name'] . "'>" . $p['type'] . ' ' . $p['city_name'] . "</option>";
        }

        return $html;
    }

    public function getDistrict($id_city)
    {
        $url = $this->endpoint . $this->key . '/m/wilayah/kecamatan?idkabupaten=' . $id_city;
        $district = Http::get($url);
        $districts = $district->json()['data'];

        $html = '';
        foreach ($districts as $p) {
            $html .= "<option value=" . $p['id'] . ">" . $p['name'] . "</option>";
        }

        return $html;
    }

    public function getSubdistrict($id_district)
    {
        $url = $this->endpoint . $this->key . '/m/wilayah/kelurahan?idkecamatan=' . $id_district;
        $subdistrict = Http::get($url);
        return $subdistrict->json();
    }

    public function getCourier(Request $request)
    {
        $key = '0423f17d6162da8879940e6cb67f1562';
        $id_city = $request->id_city;
        $weight = $request->weight;
        $origin = site('site.city');
        $courier = $request->courier;
        $url = "https://api.rajaongkir.com/starter/cost";
        $body = [
            'key' => $key,
            'destination' => $request->destination,
            'origin' => $origin,
            'courier' => $request->courier,
            'weight' => $request->weight,
        ];
        $courier = Http::post($url, $body);
        $couriers = $courier->json()['rajaongkir']['results'][0]['costs'];

        $html = '';
        foreach ($couriers as $p) {
            $html .= "<option data-text='" . $p['service'] . "' value=" . $p['cost'][0]['value'] . ">" . $p['service'] . ' - ' . number_format($p['cost'][0]['value']) . "</option>";
        }

        return $html;
    }

    public function getCities(Request $request)
    {
        $keyword = $request->keyword;
        $url = "http://api.shipping.esoftplay.com/cities_autocomplete?keyword=" . $keyword;
        $courier = Http::get($url);
        return $courier->json();
    }
}
