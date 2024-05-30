<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;


Route::controller(MainController::class)->group(function(){
    Route::get('/',  "index");
    Route::post('/salvar/tarefa/', "saveDailyTasks")->name("save");
    Route::get('/excluir/tarefa/{id}', 'delete')->name('delete.task');
    Route::get('/editar/dados/{id}', 'edit')->name('edit.data');
    Route::post('/actualizar/dados/{id}', 'update')->name('update.data');
    Route::get('/search', 'search')->name('search');
   
});

