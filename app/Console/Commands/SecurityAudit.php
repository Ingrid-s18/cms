<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Process;

class SecurityAudit extends Command
{
    protected $signature = 'security:audit';
    protected $description = 'Ejecuta composer audit y registra el resultado';

    public function handle(): int
    {
        $result = Process::path(base_path())->timeout(120)
            ->run('composer audit --locked --format=json --no-interaction');

        $data  = json_decode($result->output(), true) ?? [];
        $total = collect($data['advisories'] ?? [])->flatten(1)->count();

        if ($total > 0) {
            Log::critical("composer audit: {$total} vulnerabilidades", $data['advisories']);
            $this->error("{$total} vulnerabilidades encontradas");
            return self::FAILURE;
        }

        Log::info('composer audit: sin vulnerabilidades');
        $this->info('Sin vulnerabilidades');
        return self::SUCCESS;
    }
}