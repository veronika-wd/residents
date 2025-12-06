<?php

namespace Src\Controllers;

use ORM;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class LayoutController extends Controller
{
    public function index(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $layouts = ORM::forTable('layouts')->findMany();

        return $this->renderer->render($response, 'layouts/index.php', [
            'layouts' => $layouts
        ]);
    }

    public function create(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        return $this->renderer->render($response, 'layouts/create.php');
    }

    public function store(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $image = $_FILES['image'];
        $path = 'img/';
        move_uploaded_file($image['tmp_name'], $path . $image['name']);

        ORM::forTable('layouts')->create([
            'path' => $path . $image['name'],
        ])->save();

        return $response->withHeader('Location', "/layouts")->withStatus(302);
    }

    public function edit(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $layout = ORM::forTable('layouts')->find_one($args['id']);

        return $this->renderer->render($response, 'layouts/edit.php', [
            'layout' => $layout
        ]);
    }

    public function update(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $image = $_FILES['image'];
        $path = 'img/';
        move_uploaded_file($image['tmp_name'], $path . $image['name']);

        ORM::forTable('layouts')->findOne($args['id'])->set([
            'path' => $path . $image['name'],
        ])->save();

        return $response->withHeader('Location', "/layouts")->withStatus(302);
    }

    public function destroy(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        ORM::forTable('layouts')->findOne($args['id'])->delete();
        return $response->withHeader('Location', "/layouts")->withStatus(302);
    }
}