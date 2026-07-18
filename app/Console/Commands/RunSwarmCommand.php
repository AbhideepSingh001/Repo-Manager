<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\AgentOrchestrator\AgentDispatcher;

class RunSwarmCommand extends Command
{
    protected $signature = 'swarm:run {agents*} {--payload=}';
    protected $description = 'Dispatch a swarm of agents';

    public function handle(AgentDispatcher $dispatcher): int
    {
        $agents = $this->argument('agents');
        $payload = json_decode($this->option('payload') ?: '{}', true);

        $batchId = $dispatcher->dispatch($agents, $payload);
        $this->info("Swarm dispatched with batch ID: {$batchId}");

        return self::SUCCESS;
    }
}
