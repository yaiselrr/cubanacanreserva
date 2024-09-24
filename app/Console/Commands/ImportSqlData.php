<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
Use DB;

class ImportSqlData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:sqldata';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importa los datos necesarios para popular las tablas del BackEnd a partir de un fichero .sql';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        DB::unprepared(file_get_contents("database/dbscripts/cubanacan_autos.sql"));
        DB::unprepared(file_get_contents("database/dbscripts/cubanacan_ffd.sql"));
        DB::unprepared(file_get_contents("database/dbscripts/cubanacan_hoteles.sql"));
        DB::unprepared(file_get_contents("database/dbscripts/cubanacan_tarifario.sql"));
    }
}
