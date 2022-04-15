<?php

namespace App\Http\Requests\Messages;

use App\Domain\Models\Message;
use App\Domain\Services\MessageService;
use App\Http\Requests\ApplicationRequest;

class ViewMessageRequest extends ApplicationRequest
{
    private $messageService;

    public function __construct(MessageService $messageService)
    {
        parent::__construct();
        $this->messageService = $messageService;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $messageId = $this->route('id');
        return $this->messageService->canAccessMessage($messageId);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }
}
