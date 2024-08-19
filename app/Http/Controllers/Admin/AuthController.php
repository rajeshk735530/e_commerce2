<!-- < ?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function createCustomer()
    {
        // Create a new user instance
        $user = new User();
        $user->name = 'Rajesh Arya';
        $user->email = 'rajesh@gmail.com';
        $user->password = Hash::make('12345678');
        $user->save();

        $adminRole = Role::where('slug', 'admin')->first();

        if ($adminRole) {
            $user->roles()->attach($adminRole);
        } else {
            return response()->json(['error' => 'Admin role not found.'], 404);
        }

        return response()->json(['message' => 'Customer created successfully.'], 201);
    }
} -->
