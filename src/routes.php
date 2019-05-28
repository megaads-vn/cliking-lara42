<?php
Route::group(array('namespace' => 'Megaads\ClikingLara42\Controller'), function() {
    Route::get('logger', array('as' => 'logger', 'uses' => 'ReportController@index'));
    Route::get('logger-url', array('as' => 'logger-url', 'uses' => 'ReportController@loggerByUrl'));
    Route::get('logger-day-{day}', array('as' => 'logger-day', 'uses' => 'ReportController@loggerIpByDay'));
    Route::get('logger-url-day-{day}', array('as' => 'logger-url-day', 'uses' => 'ReportController@loggerUrlByDay'));
    Route::get('logger-ip-{ip}-day-{day}', array('as'=> 'logger-ip', 'uses'=> 'ReportController@loggerByDayAndIp'));
    Route::get('logger-url-{url}-day-{day}', array('as'=> 'logger-url', 'uses'=> 'ReportController@loggerByDayAndUrl'));
});


?>
