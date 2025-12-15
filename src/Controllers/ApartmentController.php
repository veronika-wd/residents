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
        $layouts = ORM::forTable('layouts')->findMany();

        return $this->renderer->render($response, 'apartments/create.php', [
            'builds' => $builds,
            'layouts' => $layouts,
        ]);
    }

    public function store(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $rooms = $request->getParsedBody()['rooms'];
        $floor = $request->getParsedBody()['floor'];
        $price = $request->getParsedBody()['price'];
        $buildId = $request->getParsedBody()['build_id'];
        $layout_id = $request->getParsedBody()['layout'];

        $apartment = ORM::forTable('apartments')->create([
            'rooms' => $rooms,
            'floor' => $floor,
            'price' => $price,
            'build_id' => $buildId,
        ]);
        $apartment->save();

        ORM::forTable('apartment_layouts')->create([
            'layout_id' => $layout_id,
            'apartment_id' => $apartment['id'],
        ])->save();

        $uploadedFiles = $request->getUploadedFiles();
        $imageFiles = $uploadedFiles['images'] ?? [];
        $path = 'img/';

        foreach ($imageFiles as $uploadedFile) {
            $filename = $uploadedFile->getClientFilename();
            $targetPath = $path . basename($filename);
            $uploadedFile->moveTo($targetPath);

            $image = ORM::forTable('images')->create([
                'path' => $targetPath,
            ]);
            $image->save();

            ORM::forTable('apartment_images')->create([
                'image_id' => $image['id'],
                'apartment_id' => $apartment['id'],
            ])->save();
        }

        return $response->withHeader('Location', "/apartments")->withStatus(302);
    }

    public function edit(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $builds = ORM::forTable('builds')->findMany();
        $apartment = ORM::forTable('apartments')->findOne($args['id']);
        $layouts = ORM::forTable('layouts')->findMany();
        $images = ORM::forTable('images')->findMany();

        return $this->renderer->render($response, 'apartments/edit.php', [
            'builds' => $builds,
            'apartment' => $apartment,
            'layouts' => $layouts,
            'images' => $images,
        ]);
    }

    public function update(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $rooms = $request->getParsedBody()['rooms'];
        $floor = $request->getParsedBody()['floor'];
        $price = $request->getParsedBody()['price'];
        $buildId = $request->getParsedBody()['build_id'];
        $layout_id = $request->getParsedBody()['layout'];
        $image = $request->getParsedBody()['image'];

        $apartment = ORM::forTable('apartments')->findOne($args['id'])->set([
            'rooms' => $rooms,
            'floor' => $floor,
            'price' => $price,
            'build_id' => $buildId,
        ]);
        $apartment->save();

        ORM::forTable('resident_layouts')->set([
            'layout_id' => $layout_id,
            'resident_id' => $apartment['id'],
        ])->save();

        ORM::forTable('apartment_images')->set([
            'image_id' => $image,
            'apartment_id' => $apartment['id'],
        ])->save();

        return $response->withHeader('Location', "/apartments")->withStatus(302);
    }

    public function destroy(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        ORM::forTable('apartments')->findOne($args['id'])->delete();
        return $response->withHeader('Location', "/apartments")->withStatus(302);
    }
}