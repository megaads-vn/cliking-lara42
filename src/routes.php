<?php
Route::group(array('namespace' => 'Megaads\ClikingLara42\Controller'), function() {
    Route::get('logger', 'ReportController@index');
    Route::get('logger-day-{day}', 'ReportController@loggerByDay');
    Route::get('logger-ip-{ip}-day-{day}', 'ReportController@loggerByDayAndIp');
});


?>
