<?php

namespace Src\Controllers;

use ORM;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ResidentController extends Controller
{
    public function index(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $residents = ORM::forTable('residents')->find_many();

        return $this->renderer->render($response, 'residents/index.php', [
            'residents' => $residents
        ]);
    }

    public function create(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $layouts = ORM::forTable('layouts')->findArray();
        return $this->renderer->render($response, 'residents/create.php', [
            'layouts' => $layouts
        ]);
    }

    public function store(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $name = $request->getParsedBody()['name'];
        $address = $request->getParsedBody()['address'];
        $latitude = $request->getParsedBody()['latitude'];
        $longitude = $request->getParsedBody()['longitude'];
        $layout_id = $request->getParsedBody()['layout'];

        $resident = ORM::forTable('residents')->create([
            'name' => $name,
            'address' => $address,
            'longitude' => $longitude,
            'latitude' => $latitude,
            'slug' => $this->slugify($name),
        ]);

        $resident->save();

        ORM::forTable('resident_layouts')->create([
            'layout_id' => $layout_id,
            'resident_id' => $resident['id'],
        ])->save();

        return $response->withHeader('Location', "/residents")->withStatus(302);
    }

    public function edit(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $resident = ORM::forTable('residents')->find_one($args['id']);
        $layouts = ORM::forTable('layouts')->findArray();

        return $this->renderer->render($response, 'residents/edit.php', [
            'resident' => $resident,
            'layouts' => $layouts
        ]);
    }

    public function update(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $name = $request->getParsedBody()['name'];
        $address = $request->getParsedBody()['address'];
        $latitude = $request->getParsedBody()['latitude'];
        $longitude = $request->getParsedBody()['longitude'];
        $layout_id = $request->getParsedBody()['layout'];

        $resident = ORM::forTable('residents')->findOne($args['id'])->set([
            'name' => $name,
            'address' => $address,
            'longitude' => $longitude,
            'latitude' => $latitude,
            'slug' => $this->slugify($name),
        ]);
        $resident->save();

        ORM::forTable('resident_layouts')->create([
            'layout_id' => $layout_id,
            'resident_id' => $resident['id'],
        ])->save();

        return $response->withHeader('Location', "/residents")->withStatus(302);
    }

    public function destroy(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        ORM::forTable('residents')->findOne($args['id'])->delete();
        return $response->withHeader('Location', "/residents")->withStatus(302);
    }
}