<?php

namespace App\Api\V1\Controllers\User;

use App\Api\V1\Requests\User\StoreUserRequest;
use App\Application\User\UseCases\AllUser;
use App\Application\User\UseCases\StoreUser;
use App\Helpers\ApiResponse;
use App\Http\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use OpenApi\Attributes as OA;

#[OA\Tag(name: "Users")]
class UserController extends Controller
{
    #[OA\Get(
        path: "/users",
        summary: "List users",
        responses: [
            new OA\Response(
                response: 200,
                description: "List of users"
            )
        ]
    )]
    public function index(AllUser $useCase): JsonResponse
    {
        return ApiResponse::success($useCase->execute());
    }

    #[OA\Post(
        path: "/users",
        summary: "Create user",
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ["name", "email", "password"],
                properties: [
                    new OA\Property(property: "name", type: "string"),
                    new OA\Property(property: "email", type: "string", format: "email"),
                    new OA\Property(
                        property: "password",
                        type: "string",
                        format: "password",
                        minLength: 8,
                        example: "secret123"
                    ),
                ]
            )
        ),
        responses: [
            new OA\Response(
                response: 200,
                description: "User created successfully"
            )
        ]
    )]
    public function store(StoreUserRequest $request, StoreUser $useCase): JsonResponse
    {
        $user = $useCase->execute($request->validated());
        return ApiResponse::success($user, 'User created successfully');
    }
}
