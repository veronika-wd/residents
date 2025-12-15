<?php

namespace Src\Controllers;

use ORM;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ApiController extends Controller
{
    public function getBuildings(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';

        $resident = ORM::forTable('residents')->where('slug', $args['slug'])->findOne();
        $builds = ORM::forTable('builds')->where('resident_id', $resident['id'])->findArray();
        $layouts = ORM::forTable('resident_layouts')
            ->select('layouts.*')
            ->join('layouts', 'layouts.id = resident_layouts.layout_id')
            ->where('resident_id', $resident['id'])
            ->findArray();

        foreach ($layouts as &$layout) {
            $layout['path'] = $protocol . '://' . $_SERVER['SERVER_NAME'] . '/' . $layout['path'];
        }

        $data = [
            'name' => $resident['name'],
            'address' => $resident['address'],
            'latitude' => $resident['latitude'],
            'longitude' => $resident['longitude'],
            'sections' => $builds,
            'layouts' => $layouts,
        ];

        $payload = json_encode($data);

        $response->getBody()->write($payload);
        return $response
            ->withHeader('Content-Type', 'application/json');
    }

    public function getApartments(RequestInterface $request, ResponseInterface $response)
    {
        $data = [];
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';

        $apartments = ORM::forTable('apartment_layouts')
            ->select('apartment_layouts.*')
            ->select('apartments.*')
            ->select('layouts.id')
            ->join('apartments', 'apartments.id = apartment_layouts.apartment_id')
            ->join('layouts', 'layouts.id = apartment_layouts.layout_id')
            ->findArray();

        foreach ($apartments as $apartment) {
            $images = ORM::forTable('apartment_images')
                ->select('images.path')
                ->join('images', 'images.id = apartment_images.image_id')
                ->where('apartment_id', $apartment['apartment_id'])
                ->findArray();

            foreach ($images as $image) {
                $apartment['images'][] = $protocol . '://' . $_SERVER['SERVER_NAME'] . '/' . $image['path'];
            }

            $data[] = $apartment;
        }

        $payload = json_encode($data);

        $response->getBody()->write($payload);
        return $response
            ->withHeader('Content-Type', 'application/json');
    }
}