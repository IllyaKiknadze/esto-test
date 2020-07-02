<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * @var UserService $userService
     */
    public UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        if ($users = $this->userService->getLatestUsers()) {
            return response()->json(['status' => 'success', 'message' => 'Latest users', 'users' => $users], 200);
        }

        return response()->json(['status' => 'fail', 'message' => 'Can\'t get users'], 400);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateUserRequest $request
     * @return JsonResponse
     */
    public function store(CreateUserRequest $request)
    {
        if (!auth()->user() || (auth()->user() && !auth()->user()->permissions)) {
            return response()->json(['status' => 'fail', 'message' => 'Only for admin'], 400);
        }

        $user = $this->userService->createUser($request->all());

        if ($user) {
            return response()->json([
                'status'  => 'success',
                'message' => 'User created successfully',
                'user'    => $user
            ], 200);
        }

        return response()->json(['status' => 'fail', 'message' => 'Something went wrong'], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
