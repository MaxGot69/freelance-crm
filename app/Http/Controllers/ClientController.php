<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index(){

        $clients = Client::all(); //Чтоыб получить всех клиентов из бд
        return view ('clients.index', compact('clients'));
    }

public function create(){
    return view('clients.create'); // Форма для создания клиента
}


//для сохранения данных клиента
public function store(Request $request)
{
    $client = new Client();
    $client->name = $request->name;
    $client->email = $request->email;
    $client->save();

    return redirect()->route('clients.index'); // После добавления клиента перенаправляем на список
}

public function edit($id){
$client = Client::findOrFail($id);//Находим клиента по ID
return view('clients.edit', compact('client') );   //Передаем кл в форму редактирования
}

public function update(Request $request, $id){
$client = Client::findOrFail($id);//Находим кл по Id
$client->name = $request->name;//Обновление имени
$client->email = $request->email;//Обновление почты
$client ->save();//Сохранение

return redirect()->route('clients.index');//Перенрпр на страницу списка кл
}

public function destroy($id){
    $client = Client::findOrFail($id);//Наход по id
    $client->delete();//удаляем клиенат

    return redirect()->route('clients.index');
}




}
