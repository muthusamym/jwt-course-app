<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BulkEmailService;

class BulkEmailController extends Controller
{
    //
	protected $bulkEmailService;
	
	public function __construct(BulkEmailService $bulkEmailService)
    {
        $this->bulkEmailService = $bulkEmailService;
    }
	
	public function send(Request $request)
    {
        $request->validate([
            'emails' => 'required|array',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $data = [
            'subject' => $request->subject,
            'message' => $request->message
        ];

        $this->bulkEmailService->sendBulk($request->emails, $data);

        return response()->json([
            'status' => 'success',
            'message' => 'Emails queued successfully'
        ]);
    }
}
