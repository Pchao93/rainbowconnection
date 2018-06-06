<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ConnectionsController extends Controller
{
  // Connections are stored within the Users table, with each user containing a pointer to the other.
  // User data is stripped down to name and color for duplicate storage.
    function create(Request $request)
    {
        $requestor = User::find($request->requestor);
        $requestee = User::find($request->requestee);

        $requestor_connections = json_decode($requestor->connections, true);
        $requestor_connections[$requestee->id] = json_encode(["name" => $requestee->name, "color" => $requestee->color]);
        $requestor->connections = json_encode($requestor_connections);
        $requestor->save();

        $requestee_connections = json_decode($requestee->connections, true);
        $requestee_connections[$requestor->id] = json_encode(["name" => $requestor->name, "color" => $requestor->color]);
        $requestee->connections = json_encode($requestee_connections);
        $requestee->save();

    }
    // destroy removes reference to the connection from both parties. 
    function destroy(Request $request)
    {
      $requestor = User::find($request->requestor);
      $requestee = User::find($request->requestee);

      $requestor_connections = json_decode($requestor->connections, true);
      unset($requestor_connections[$requestee->id]);
      $requestor->connections = json_encode($requestor_connections);
      $requestor->save();

      $requestee_connections = json_decode($requestee->connections, true);
      unset($requestee_connections[$requestor->id]);
      $requestee->connections = json_encode($requestee_connections);
      $requestee->save();

    }
}
