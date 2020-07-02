<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionCreateRequest;
use App\Http\Resources\TransactionCreateResource;
use App\Models\Transaction;
use App\Models\TransactionTypes;
use App\Services\TransactionService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class TransactionController extends Controller
{
    /**
     * @var TransactionService $transactionService
     */
    public TransactionService $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('transactions.create_transaction', ['types' => TransactionTypes::get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TransactionCreateRequest $request
     * @return JsonResponse
     */
    public function store(TransactionCreateRequest $request)
    {
        if ($transaction = $this->transactionService->createTransaction($request->all())) {
            return response()->json([
                'status'      => 'success',
                'message'     => 'Transaction created successfully',
                'transaction' => TransactionCreateResource::make($transaction)
            ], 200);
        }

        return response()->json([
            'status'  => 'fail',
            'message' => 'Transaction wasn\'t created',
        ], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param Transaction $transaction
     * @return JsonResponse
     */
    public function show(Transaction $transaction)
    {
        return response()->json([
            'status'      => 'success',
            'message'     => 'Transaction created successfully',
            'transaction' => TransactionCreateResource::make($transaction)
        ], 200);
    }
}
