
namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // API-based login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();

        // If user not approved
        if ($user->type === 'shopkeeper' && isset($user->is_approved) && !$user->is_approved) {
            Auth::logout();
            return response()->json([
                'message' => 'Your account is pending admin approval.'
            ], 403);
        }

        // Create API token
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'user' => $user,
            'role' => $user->type,
            'token' => $token,
        ], 200);
    }

    // Logout via API
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logged out successfully'
        ]);
    }
}



