<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * @OA\Tag(
 * name="Users",
 * description="API Endpoints for User Management"
 * )
 */
class userController extends Controller
{
    /**
     * @OA\Get(
     * path="/api/users",
     * operationId="getUsersList",
     * tags={"Users"},
     * summary="Get list of users",
     * description="Returns a list of all users.",
     * @OA\Response(
     * response=200,
     * description="Successful operation",
     * @OA\JsonContent(
     * type="object",
     * @OA\Property(property="message", type="string", example="Users retrieved successfully"),
     * @OA\Property(
     * property="data",
     * type="array",
     * @OA\Items(ref="#/components/schemas/User")
     * )
     * )
     * )
     * )
     */
    public function index()
    {
        $users = User::all();
        return response()->json(
            [
                'message' => 'Users retrieved successfully',
                'data' => $users,
            ],
            200
        );
    }

    /**
     * @OA\Post(
     * path="/api/users",
     * operationId="storeUser",
     * tags={"Users"},
     * summary="Create a new user",
     * description="Creates a new user and returns the user's data.",
     * @OA\RequestBody(
     * required=true,
     * description="User data for creation",
     * @OA\JsonContent(
     * required={"name","email","password","phone"},
     * @OA\Property(property="name", type="string", example="Jane Doe"),
     * @OA\Property(property="email", type="string", format="email", example="jane.doe@example.com"),
     * @OA\Property(property="password", type="string", format="password", example="password123"),
     * @OA\Property(property="phone", type="string", example="089876543210"),
     * @OA\Property(property="status_active", type="boolean", example=true),
     * @OA\Property(property="departement", type="string", example="Marketing")
     * )
     * ),
     * @OA\Response(
     * response=201,
     * description="User created successfully",
     * @OA\JsonContent(
     * type="object",
     * @OA\Property(property="message", type="string", example="User created successfully"),
     * @OA\Property(property="data", ref="#/components/schemas/User")
     * )
     * ),
     * @OA\Response(
     * response=422,
     * description="Validation Error",
     * @OA\JsonContent(
     * type="object",
     * @OA\Property(property="message", type="string", example="Validation error"),
     * @OA\Property(
     * property="errors",
     * type="object",
     * example={"email": {"The email has already been taken."}}
     * )
     * )
     * )
     * )
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'phone' => 'required|string|min:10|max:15',
            'status_active' => 'boolean',
            'departement' => 'nullable|string|max:255',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'phone' => $validatedData['phone'],
            'status_active' => $validatedData['status_active'] ?? true,
            'departement' => $validatedData['departement'],
        ]);

        return response()->json([
            'message' => 'User created successfully',
            'data' => $user,
        ], 201);
    }

    /**
     * @OA\Get(
     * path="/api/users/{id}",
     * operationId="getUserById",
     * tags={"Users"},
     * summary="Get user information",
     * description="Returns a single user's data.",
     * @OA\Parameter(
     * name="id",
     * description="User ID",
     * required=true,
     * in="path",
     * @OA\Schema(
     * type="integer"
     * )
     * ),
     * @OA\Response(
     * response=200,
     * description="Successful operation",
     * @OA\JsonContent(
     * type="object",
     * @OA\Property(property="message", type="string", example="User retrieved successfully"),
     * @OA\Property(property="data", ref="#/components/schemas/User")
     * )
     * ),
     * @OA\Response(
     * response=404,
     * description="Resource Not Found",
     * @OA\JsonContent(
     * type="object",
     * @OA\Property(property="message", type="string", example="Resource Not Found")
     * )
     * )
     * )
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return response()->json(
            [
                'message' => 'User retrieved successfully',
                'data' => $user,
            ],
            200
        );
    }

    /**
     * @OA\Put(
     * path="/api/users/{id}",
     * operationId="updateUser",
     * tags={"Users"},
     * summary="Update an existing user",
     * description="Updates an existing user's data.",
     * @OA\Parameter(
     * name="id",
     * description="User ID",
     * required=true,
     * in="path",
     * @OA\Schema(
     * type="integer"
     * )
     * ),
     * @OA\RequestBody(
     * required=true,
     * description="User data to update",
     * @OA\JsonContent(
     * @OA\Property(property="name", type="string", example="Jane Doe Updated"),
     * @OA\Property(property="email", type="string", format="email", example="jane.doe.new@example.com"),
     * @OA\Property(property="password", type="string", format="password", example="newpassword456"),
     * @OA\Property(property="phone", type="string", example="081122334455"),
     * @OA\Property(property="status_active", type="boolean", example=false),
     * @OA\Property(property="departement", type="string", example="Human Resources")
     * )
     * ),
     * @OA\Response(
     * response=200,
     * description="User updated successfully",
     * @OA\JsonContent(
     * type="object",
     * @OA\Property(property="message", type="string", example="User updated successfully"),
     * @OA\Property(property="data", ref="#/components/schemas/User")
     * )
     * ),
     * @OA\Response(
     * response=404,
     * description="Resource Not Found",
     * @OA\JsonContent(
     * type="object",
     * @OA\Property(property="message", type="string", example="Resource Not Found")
     * )
     * ),
     * @OA\Response(
     * response=422,
     * description="Validation Error",
     * @OA\JsonContent(
     * type="object",
     * @OA\Property(property="message", type="string", example="Validation error"),
     * @OA\Property(
     * property="errors",
     * type="object",
     * example={"email": {"The email has already been taken."}}
     * )
     * )
     * )
     * )
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'sometimes|string|min:8',
            'phone' => 'sometimes|string|min:10|max:15',
            'status_active' => 'sometimes|boolean',
            'departement' => 'sometimes|string|max:255',
        ]);

        $user->update(array_filter($validatedData));

        return response()->json([
            'message' => 'User updated successfully',
            'data' => $user,
        ], 200);
    }

    /**
     * @OA\Delete(
     * path="/api/users/{id}",
     * operationId="deleteUser",
     * tags={"Users"},
     * summary="Delete an existing user",
     * description="Deletes a user record.",
     * @OA\Parameter(
     * name="id",
     * description="User ID",
     * required=true,
     * in="path",
     * @OA\Schema(
     * type="integer"
     * )
     * ),
     * @OA\Response(
     * response=200,
     * description="User deleted successfully",
     * @OA\JsonContent(
     * type="object",
     * @OA\Property(property="message", type="string", example="User deleted successfully")
     * )
     * ),
     * @OA\Response(
     * response=404,
     * description="Resource Not Found",
     * @OA\JsonContent(
     * type="object",
     * @OA\Property(property="message", type="string", example="Resource Not Found")
     * )
     * )
     * )
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully',
        ], 200);
    }
}
