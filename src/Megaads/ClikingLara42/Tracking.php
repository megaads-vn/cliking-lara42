<?php
namespace Megaads\ClikingLara42;

use Illuminate\Support\Facades\Config as Config;
use DB;
use Schema;
use Request;
class Tracking {

    protected $databaseName = 'cliking.sqlite';

    public function __construct() {

    }

    public function tracking() {
        try {
            $databasePath = app_path() . '/database/' . $this->databaseName;
            if (!file_exists($databasePath)) {
                fopen($databasePath, 'w');
            }
            Config::set('database.connections.cliking', [
                'driver' => 'sqlite',
                'database' => $databasePath,
                'prefix' => ''
            ]);

            if (!Schema::connection('cliking')->hasTable("accesser")) {
                Schema::connection('cliking')->create('accesser', function($table) {
                     $table->bigIncrements('id');
                     $table->string('ip', 100);
                     $table->string('referer', 500);
                     $table->string('user_agent', 5000);
                     $table->string('request_uri', 500);
                     $table->date('day');
                     $table->dateTime('created_at');
                     $table->index(['ip', 'day']);
                     $table->index(['ip']);
                     $table->index(['day']);
                });
            }

            $clientIp = Request::server('REMOTE_ADDR', '');
            $clientRefer = Request::server('HTTP_REFERER', '');
            $clientUserAgent = Request::server('HTTP_USER_AGENT', '');
            $requestUri = Request::server('REQUEST_URI', '');
            if (!strpos($requestUri, 'images') && !strpos($requestUri, 'tracking')) {
                $date = new \DateTime();
                $day = $date->format('Y-m-d');
                $dataSave = array(
                    'ip' => $clientIp,
                    'referer' => $clientRefer,
                    'user_agent' => $clientUserAgent,
                    'request_uri' => $requestUri,
                    'day'=> $day,
                    'created_at' => $date
                );
                DB::connection('cliking')->table('accesser')->insert($dataSave);
            }
            $data = DB::connection('cliking')->select("SELECT * FROM `accesser`");
        } catch(Exception $ex) {

        }
    }

}

?>
