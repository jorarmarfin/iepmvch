<?php

Route::resource('matricula', 'MatriculaController',['names'=>'admin.matricula']);

Route::get('matricula-nueva','MatriculaController@matriculanew')->name('admin.matricula.new');
