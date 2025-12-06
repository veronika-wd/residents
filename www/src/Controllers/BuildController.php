<?php

namespace Src\Controllers;

use ORM;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class BuildController extends Controller
{
    public function index(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $builds = ORM::forTable('builds')
            ->select('builds.*')
            ->select('residents.name', 'resident_name')
            ->join('residents', 'residents.id = builds.resident_id')
            ->find_many();

        return $this->renderer->render($response, 'builds/index.php', [
            'builds' => $builds
        ]);
    }

    public function create(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $residents = ORM::forTable('residents')->find_many();
        return $this->renderer->render($response, 'builds/create.php', [
            'residents' => $residents
        ]);
    }

    public function store(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $name = $request->getParsedBody()['name'];
        $date = $request->getParsedBody()['planning_date'];
        $floors = $request->getParsedBody()['floors'];
        $residentId = $request->getParsedBody()['residentId'];

        ORM::forTable('builds')->create([
            'name' => $name,
            'planning_date' => $date,
            'floors' => $floors,
            'resident_id' => $residentId
        ])->save();

        return $response->withHeader('Location', "/builds")->withStatus(302);
    }

    public function edit(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $build = ORM::forTable('builds')->find_one($args['id']);
        $residents = ORM::forTable('residents')->find_many();

        return $this->renderer->render($response, 'builds/edit.php', [
            'build' => $build,
            'residents' => $residents
        ]);
    }

    public function update(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $name = $request->getParsedBody()['name'];
        $date = $request->getParsedBody()['planning_date'];
        $floors = $request->getParsedBody()['floors'];
        $residentId = $request->getParsedBody()['residentId'];

        ORM::forTable('builds')->findOne($args['id'])->set([
            'name' => $name,
            'planning_date' => $date,
            'floors' => $floors,
            'resident_id' => $residentId
        ])->save();

        return $response->withHeader('Location', "/builds")->withStatus(302);
    }

    public function destroy(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        ORM::forTable('builds')->findOne($args['id'])->delete();
        return $response->withHeader('Location', "/builds")->withStatus(302);
    }
}