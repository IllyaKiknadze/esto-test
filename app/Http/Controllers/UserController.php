<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

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
     * @return Factory|View|void
     */
    public function index()
    {
        if ($users = $this->userService->getUsers()) {
            return view('user.index', ['users' => $users]);
        }

        return abort(404);
    }

    public function latest()
    {
        if ($users = $this->userService->getLatestUsers()) {
            return view('users.index', [
                'users' => UserResource::collection($users)
            ]);
        }

        return abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function store(CreateUserRequest $request)
    {
        if (!auth()->user() || (auth()->user() && !auth()->user()->permissions)) {
            return redirect('/');
        }

        $user = $this->userService->createUser($request->all());

        if ($user) {
            return redirect(route('users.latest'));
        }

        return redirect()->back()->withErrors(['message' => 'Something went wrong'])->withInput();
    }
}
