<?php

namespace App\Services\AgentOrchestrator;

use Illuminate\Support\Facades\Bus;
use App\Jobs\AgentTaskJob;

class AgentDispatcher
{
    public function dispatch(array $agents, array $payload): string
    {
        $batch = Bus::batch(
            collect($agents)->map(fn($agent) => new AgentTaskJob($agent, $payload))
        )->dispatch();

        return $batch->id;
    }
}
