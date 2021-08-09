<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\Client\DestroyClientRequest;
use App\Http\Requests\API\Client\ShowClientRequest;
use App\Http\Requests\API\Client\StoreClientRequest;
use App\Http\Requests\API\Client\UpdateClientRequest;
use App\Http\Resources\ClientResource;
use App\Models\User;
use App\Repositories\ClientRepository;
use Response;

/**
 * Class ClientController
 * @package App\Http\Controllers\API
 */
class ClientController extends AppBaseController
{
    /** @var  ClientRepository */
    private $clientRepository;

    public function __construct(ClientRepository $clientRepo)
    {
        $this->clientRepository = $clientRepo;
    }

    /**
     * Store a newly created User in storage.
     * POST /clients
     *
     * @param  StoreClientRequest  $request
     *
     * @return Response
     */
    public function store(StoreClientRequest $request)
    {
        $client = $this->clientRepository->create($request->validated());

        return $this->sendResponse(new ClientResource($client), 'Data saved successfully');
    }

    /**
     * Display the specified User.
     * GET|HEAD /clients
     *
     * @param  ShowClientRequest  $request
     * @return Response
     */
    public function show(ShowClientRequest $request)
    {
        /** @var User $user */
        $clients = $this->clientRepository->findByKeys(request()->get('keys'));

        foreach ($clients as $client) {
            $result[] = new ClientResource($client);
        }

        return $this->sendResponse($result ?? [], 'Data retrieved successfully');
    }

    /**
     * Update the specified User in storage.
     * PUT/PATCH /clients
     *
     * @param  UpdateClientRequest  $request
     *
     * @return Response
     */
    public function update(UpdateClientRequest $request)
    {
        $clients = $this->clientRepository->updateAll($request->all());

        foreach ($clients as $data) {
            $result[] = new ClientResource($data);
        }
        return $this->sendResponse($result ?? [], 'Data updated successfully');
    }

    /**
     * Remove the specified User from storage.
     * DELETE /clients
     *
     * @param  DestroyClientRequest  $request
     * @return Response
     */
    public function destroy(DestroyClientRequest $request)
    {
        /** @var User $user */
        $client = $this->clientRepository->findByKey($request->get('key'));
        $client->delete();

        return $this->sendSuccess('Key deleted successfully');
    }
}
