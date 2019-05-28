<?php

namespace Megaads\ClikingLara42\Controller;

use Illuminate\Routing\Controller as BaseController;
use DB;
use Illuminate\Support\Facades\View as View;

class ReportController extends BaseController
{
    public function __construct() {
        View::addNamespace('cliking-lara42', base_path('workbench') . '/megaads/cliking-lara42/src/views');
    }

    public function index() {
        $days = DB::connection('cliking')
        ->table('accesser')
        ->select('day')
        ->groupBy('day')
        ->orderBy('day', 'desc')
        ->whereNotNull('day')
        ->where('day', '<>', '')
        ->paginate(7);

        return View::make('cliking-lara42::index', compact('days'));
    }

    public function loggerIpByDay ($day) {
        $accessGroup = DB::connection('cliking')
        ->table('accesser')
        ->where('day', $day)
        ->groupBy('ip')
        ->select('ip')
        ->addSelect(DB::raw('count(*) as count'))
        ->orderBy('count', 'desc')
        ->paginate(50);
        return View::make('cliking-lara42::logger-ip-by-day', compact(['accessGroup', 'day']));

    }

    public function loggerUrlByDay ($day) {
        $accessGroup = DB::connection('cliking')
        ->table('accesser')
        ->where('day', $day)
        ->groupBy('uri_crc32')
        ->select('request_uri', 'uri_crc32')
        ->addSelect(DB::raw('count(*) as count'))
        ->orderBy('count', 'desc')
        ->paginate(50);
        return View::make('cliking-lara42::logger-url-by-day', compact(['accessGroup', 'day']));

    }

    public function loggerByDayAndIp ($ip, $day) {
        if ($ip == '1') {
            $ip = '::1';
        }
        $accessGroup = DB::connection('cliking')
        ->table('accesser')
        ->where('day', $day)
        ->where('ip', $ip)
        ->select('*')
        ->paginate(100);

        return View::make('cliking-lara42::logger-by-day-and-ip', compact(['accessGroup', 'ip',  'day']));

    }

    public function loggerByDayAndUrl ($crc32, $day) {
        $accessGroup = DB::connection('cliking')
        ->table('accesser')
        ->where('day', $day)
        ->where('uri_crc32', $crc32)
        ->select('*')
        ->paginate(100);

        return View::make('cliking-lara42::logger-by-day-and-url', compact(['accessGroup', 'url',  'day']));

    }
}
