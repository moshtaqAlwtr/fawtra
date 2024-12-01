<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::latest()->get();
        return response()->json($notifications);
    }

    public function store(Request $request)
    {
        $notification = Notification::create([
            'title' => $request->title,
            'message' => $request->message,
            'type' => $request->type ?? 'info',
            'user_id' => auth()->id(),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'تم إنشاء الإشعار بنجاح',
            'notification' => $notification
        ]);
    }

    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'تم حذف الإشعار بنجاح'
        ]);
    }
}
