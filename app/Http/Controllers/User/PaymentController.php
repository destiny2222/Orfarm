<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function handleWebhook(Request $request)
    {
        // First check is the headeris present. Else, terminate the code.
        if (!$request->hasHeader("x-paystack-signature"))
            exit("No header present");

        // Get our paystack screte key from our .env file
        $secret = env("PAYSTACK_SECRET_KEY");

        // Validate the signature
        if ($request->header("x-paystack-signature") !== hash_hmac("sha512", $request->getContent(), $secret))
            exit("Invalid signatute");

        $event = $request->event; // event type. e.g charge.success
        $data = $request->data; // request payload.

        // You can log it into laravel.log for view all the data sent from paystack
        Log::info('PAYSTACK PAYLOAD', ['data' => $data]);

        if ($event === "charge.success") {

            // Transaction info
            $reference = $data["reference"];
            $amount = $data["amount"];

            // Customer information 
            $firstname = $data["customer"]["first_name"];
            $email = $data["customer"]["email"];

            // etc

            // ........... DISPATCH JOBS OR PERFORM CRUD .......... //

        }

        return response()->json('', 200);
    }
}
