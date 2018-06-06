<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use Faker\Factory as Faker;
// require_once base_path('vendor/fzaninotto/faker/src/autoload.php');

class UsersController extends Controller
{
    //
    function show(Request $request) {
        $user = User::find($request->id);
    }

    function index()
    {
        $users = User::all();
        return $users;
    }

    function create(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->color = $request->color;
        $user->connections = json_encode([]);
        $user->save();
        return $user;
    }

    function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->color = $request->color;
        $user->save();
        return $user;
    }

    function destroy(Request $request, $id)
    {
        $user = User::find($id);
        $user->delete();

        // TODO: remove user from connections array of other users
        return $user;
    }

    function test(Request $request)
    {
        $num_users = $request->num_users;
        User::truncate();
        $colors = ["red", "blue", "yellow", "green", "orange", "purple", "red-orange", "yellow-orange", "yellow-green", "blue-green", "blue-purple", "red-purple"];
        $faker = Faker::create();
        for ($i = 0; $i < $num_users; $i++) {
            $user = new User;
            $user->name = $faker->name;
            // $user->name = "cat";
            $user->color = $colors[mt_rand(0, 11)];
            $user->connections = json_encode([]);
            $user->save();

        }

        for ($i = 1; $i < $num_users + 1; $i++) {
            $user = User::find($i);
            $requestor = $user;
            $requestor_connections = json_decode($requestor->connections, true);

            for ($j = 0; $j < 50; $j++) {
              // TODO: taken from ConnectionsController, should refactor into model
              $idx = mt_rand(1, $num_users);
              while ($idx == $i) {
                $idx = mt_rand(1, $num_users);
              }
              $requestee = User::find($idx);

              $requestor_connections[$requestee->id] = json_encode(["name" => $requestee->name, "color" => $requestee->color]);


              $requestee_connections = json_decode($requestee->connections, true);
              $requestee_connections[$requestor->id] = json_encode(["name" => $requestor->name, "color" => $requestor->color]);
              $requestee->connections = json_encode($requestee_connections);
              $requestee->save();
            }
            $requestor->connections = json_encode($requestor_connections);
            $requestor->save();
        }
    }
}
