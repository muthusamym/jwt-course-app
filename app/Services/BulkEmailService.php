<?php
namespace App\Services;

use App\Jobs\SendBulkEmailJob;

class BulkEmailService
{
    public function sendBulk($emails, $data)
    {
        foreach ($emails as $email) {
            dispatch(new SendBulkEmailJob($email, $data));
        }
    }
}

?>