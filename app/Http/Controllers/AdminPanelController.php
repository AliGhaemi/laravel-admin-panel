<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class AdminPanelController extends Controller
{
    /**
     * Handles the initial request, gets the session ID, and redirects to the unique URL.
     */
    public function handleAdminPanel()
    {
        // 1. Get the current session's unique ID.
        $c_url = random_bytes(20);

        // 2A. Encode the bytes into a hexadecimal string
        // 2B. Redirect to the unique URL using the session ID.
        return redirect()->route('admin.show', ['c_url' => bin2hex($c_url)]);
    }


    public function showAdminPanel(string $c_url)
    {
//        if (auth()->user()->hasPermissionTo('edit blogs')) {
//            dd(123);
//        } else {
//            abort(403, 'Hello, Unauthorized action!');
//        }
//        TODO: complete this part, very important
        // 3. IMPORTANT: Check if the session ID from the URL matches the user's current session.
        // This prevents one user from seeing another user's chat by changing the URL.
//        if (Session::getId() !== $c_url) {
//            // Redirect them to their own unique page or a generic error page.
//            return redirect()->route('admin.handle');
//        }

        // 4. Now we know we are on the correct user's session.
        // Get the unique conversation from the session.
        $conversation = session('conversation', []);

        // Example logic to start a new conversation
        if (empty($conversation)) {
            $greeting = "Hello, your session ID is: {$c_url}";
            $conversation[] = ['message' => $greeting, 'sender' => 'AI'];
            session()->put('conversation', $conversation);
        }

        // Return the view with the conversation data
        return Inertia::render('AdminPanel', [
            'conversation' => $conversation
        ]);

    }
}
