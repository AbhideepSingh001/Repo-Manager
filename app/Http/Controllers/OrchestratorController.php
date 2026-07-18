<?php

namespace App\Http\Controllers;

use App\Services\AgentOrchestrator\AgentDispatcher;
use Illuminate\Http\Request;

class OrchestratorController extends Controller
{
    public function __construct(
        private AgentDispatcher $dispatcher
    ) {}

    public function dispatch(Request $request)
    {
        $batchId = $this->dispatcher->dispatch(
            $request->input('agents', []),
            $request->input('payload', [])
        );

        return response()->json(['batch_id' => $batchId]);
    }

    public function batchStatus(string $batchId)
    {
        return response()->json(['batch_id' => $batchId, 'status' => 'processing']);
    }

    public function retryBatch(string $batchId)
    {
        return response()->json(['batch_id' => $batchId, 'retried' => true]);
    }
}
