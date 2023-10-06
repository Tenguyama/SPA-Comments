<?php

namespace App\Http\Controllers\Api\v1;

use App\Data\MailData;
use App\Http\Controllers\Controller;
use App\Mail\ReplyMessageForm;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send(MailData $mailData){
        Mail::to($mailData->userEmail)->send(new ReplyMessageForm($mailData));
    }
}
