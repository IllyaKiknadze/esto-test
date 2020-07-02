<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionCreateRequest;
use App\Http\Resources\TransactionResource;
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
     * @return Factory|View|void
     */
    public function index()
    {
        if ($transactions = $this->transactionService->getUserTransactions(auth()->id())) {
            return view('transactions.list', [
                'transactions' => TransactionResource::collection($transactions)
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
        return view('transactions.create_transaction', [
            'types' => TransactionTypes::get()->pluck('title', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TransactionCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(TransactionCreateRequest $request)
    {
        if ($transaction = $this->transactionService->createTransaction($request->all())) {
            return redirect(route('transactions.index'));
        }

        return redirect()->back()->withInput()->withErrors(['message' => 'Can\'t create transaction. Something went wrong']);
    }

    /**
     * Display the specified resource.
     *
     * @param Transaction $transaction
     * @return Factory|View
     */
    public function show(Transaction $transaction)
    {
        return view('transactions.single', ['transaction' => TransactionResource::make($transaction)]);
    }
}
