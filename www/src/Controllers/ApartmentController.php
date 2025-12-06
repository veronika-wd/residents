<?php

namespace Src\Controllers;

use ORM;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ApartmentController extends Controller
{
    public function index(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $apartments = ORM::forTable('apartments')
            ->select('apartments.*')
            ->select('builds.name', 'build_name')
            ->join('builds', 'builds.id = apartments.build_id')
            ->findMany();

        return $this->renderer->render($response, 'apartments/index.php', [
            'apartments' => $apartments
        ]);
    }

    public function create(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $builds = ORM::forTable('builds')->findMany();

        return $this->renderer->render($response, 'apartments/create.php', [
            'builds' => $builds
        ]);
    }

    public function store(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $rooms = $request->getParsedBody()['rooms'];
        $floor = $request->getParsedBody()['floor'];
        $price = $request->getParsedBody()['price'];
        $buildId = $request->getParsedBody()['build_id'];

        ORM::forTable('apartments')->create([
            'rooms' => $rooms,
            'floor' => $floor,
            'price' => $price,
            'build_id' => $buildId,
        ])->save();

        return $response->withHeader('Location', "/apartments")->withStatus(302);
    }

    public function edit(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $builds = ORM::forTable('builds')->findMany();
        $apartment = ORM::forTable('apartments')->findOne($args['id']);

        return $this->renderer->render($response, 'apartments/edit.php', [
            'builds' => $builds,
            'apartment' => $apartment,
        ]);
    }

    public function update(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $rooms = $request->getParsedBody()['rooms'];
        $floor = $request->getParsedBody()['floor'];
        $price = $request->getParsedBody()['price'];
        $buildId = $request->getParsedBody()['build_id'];

        ORM::forTable('apartments')->findOne($args['id'])->set([
            'rooms' => $rooms,
            'floor' => $floor,
            'price' => $price,
            'build_id' => $buildId,
        ])->save();

        return $response->withHeader('Location', "/apartments")->withStatus(302);
    }

    public function destroy(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        ORM::forTable('apartments')->findOne($args['id'])->delete();
        return $response->withHeader('Location', "/apartments")->withStatus(302);
    }
}