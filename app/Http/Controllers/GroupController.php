<?php

namespace App\Http\Controllers;

use App\Servises\GroupService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class GroupController extends Controller
{
    protected GroupService $groupService;

    public function __construct(GroupService $groupService)
    {
        $this->groupService = $groupService;
    }

    public function index(): JsonResponse
    {
        $groups = $this->groupService->findAll();
        return response()->json($groups,ResponseAlias::HTTP_OK);
    }

    /**
     * @throws ValidationException
     */
    public function getUserGroup(Request $request): JsonResponse
    {
        return response()->json($this->groupService->findUserGroup(), ResponseAlias::HTTP_OK);
    }
}
