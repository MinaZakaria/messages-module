<?php

namespace App\Http\Controllers;

use App\Http\Requests\Messages\SendMessageRequest;
use App\Http\Requests\Messages\ViewMessageRequest;

use App\Domain\Services\MessageService;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    private $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    public function send(SendMessageRequest $request)
    {
        $senderId = auth()->user()->id;
        $content = $request->input('content');
        $receiverId = $request->input('receiverId');

        $data = $this->messageService->send($senderId, $content, $receiverId);

        return response()->json(['data' => $data], 200);
    }

    public function view(ViewMessageRequest $request, $messageId)
    {
        $data = $this->messageService->view($messageId);

        return response()->json(['data' => $data], 200);
    }

    public function listFiltered(Request $request)
    {
        $searchMessage = $request->query('search');

        $data = $this->messageService->listFiltered($searchMessage);

        return response()->json(['data' => $data], 200);
    }
}
