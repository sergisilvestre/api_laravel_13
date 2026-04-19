<?php

namespace App\Http\Controllers\User;

use App\Application\User\UseCases\AllUser;
use App\Application\User\UseCases\StoreUser;
use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use Symfony\Component\HttpFoundation\JsonResponse;
use OpenApi\Attributes as OA;

#[OA\Tag(name: "Users")]
class UserController extends Controller
{
    #[OA\Get(
        path: "/users",
        summary: "Listar usuarios",
        responses: [
            new OA\Response(
                response: 200,
                description: "Lista de usuarios"
            )
        ]
    )]
    public function index(AllUser $useCase): JsonResponse
    {
        return ApiResponse::success($useCase->execute());
    }

    #[OA\Post(
        path: "/users",
        summary: "Crear usuario",
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ["name", "email"],
                properties: [
                    new OA\Property(property: "name", type: "string"),
                    new OA\Property(property: "email", type: "string", format: "email")
                ]
            )
        ),
        responses: [
            new OA\Response(
                response: 200,
                description: "Usuario creado"
            )
        ]
    )]
    public function store(StoreUserRequest $request, StoreUser $useCase): JsonResponse
    {
        return ApiResponse::success($useCase->execute($request->validated()));
    }
}