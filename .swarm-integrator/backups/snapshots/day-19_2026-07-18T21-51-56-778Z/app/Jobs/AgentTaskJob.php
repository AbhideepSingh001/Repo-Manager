<?php

namespace App\Jobs;

use Illuminate\Bus\Batchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AgentTaskJob implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public array $agent,
        public array $payload
    ) {}

    public function handle(): void
    {
        // Agent execution logic goes here
        logger()->info('Executing agent: ' . $this->agent['name']);
    }

    public function failed(\Throwable $exception): void
    {
        logger()->error('Agent failed: ' . $exception->getMessage());
    }
}
