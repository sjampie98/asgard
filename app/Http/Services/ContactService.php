<?php

namespace App\Http\Services;

use App\Models\Contact;

class ContactService
{
    public function index()
    {
        return Contact::all()->last();
    }

    /**
     * @param $data
     * @return true
     */
    public function send($data)
    {
        $idChannel = env("TELEGRAM_CHAT_ID");
        $botToken = env("TELEGRAM_BOT_TOKEN");
        $message = "Contact:" . "\n\n" .
            "Name: "  . $data['name'] . "\n\n" .
            "Email: "  . $data['email'] . "\n\n" .
            "Phone: "  . $data['telephone'] . "\n\n" .
            "Subject: "  . $data['subject'] . "\n\n" .
            "Message: "  . $data['message'] . "\n\n";
        $message = urlencode($message);
        try {
            file_get_contents("https://api.telegram.org/bot$botToken/sendMessage?chat_id=$idChannel&text=".$message);
        }
        catch (\Exception $e){

        }

        return true;
    }

    /**
     * @param $data
     * @return true
     */
    public function editContact($data)
    {
        Contact::updateOrCreate([
            'id' => 1
        ],[
            'address' => $data['address'],
            'phone' => $data['phone']
        ]);

        return true;
    }
}
