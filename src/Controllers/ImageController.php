<?php

namespace Src\Controllers;

use ORM;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ImageController extends Controller
{
    public function index(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $images = ORM::forTable('images')->findMany();

        return $this->renderer->render($response, 'images/index.php', [
            'images' => $images
        ]);
    }

    public function create(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        return $this->renderer->render($response, 'images/create.php');
    }

    public function store(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $image = $_FILES['image'];
        $path = 'img/';
        move_uploaded_file($image['tmp_name'], $path . $image['name']);

        ORM::forTable('images')->create([
            'path' => $path . $image['name'],
        ])->save();

        return $response->withHeader('Location', "/images")->withStatus(302);
    }

    public function edit(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $image = ORM::forTable('images')->find_one($args['id']);

        return $this->renderer->render($response, 'images/edit.php', [
            'image' => $image
        ]);
    }

    public function update(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $image = $_FILES['image'];
        $path = 'img/';
        move_uploaded_file($image['tmp_name'], $path . $image['name']);

        ORM::forTable('images')->findOne($args['id'])->set([
            'path' => $path . $image['name'],
        ])->save();

        return $response->withHeader('Location', "/images")->withStatus(302);
    }

    public function destroy(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        ORM::forTable('images')->findOne($args['id'])->delete();
        return $response->withHeader('Location', "/images")->withStatus(302);
    }
}