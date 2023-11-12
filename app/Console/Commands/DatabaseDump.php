<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DatabaseDump extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:dump';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a database dump';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $databaseName = config('database.connections.mysql.database');
        $username = config('database.connections.mysql.username');
        $password = config('database.connections.mysql.password');

        if (! Storage::exists('backup')) {
            Storage::makeDirectory('backup');
        }

        $backupFileName = 'backup-' . date('Y-m-d-H-i-s') . '.sql';
        $backupPath = storage_path() . "/app/backup/" . $backupFileName;

        $command = "mysqldump -u $username -p$password $databaseName > $backupPath";

        exec($command);

        $this->info('Database dumped successfully to ' . $backupPath);
    }
}
