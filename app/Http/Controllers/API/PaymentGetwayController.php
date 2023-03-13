<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CardDetailRequest;
use App\Models\UserCardDetail;
use Exception;
use Illuminate\Support\Facades\Auth;
use Stripe\Exception\CardException;
use Stripe\StripeClient;

class PaymentGetwayController extends BaseController
{
    /**
     * Store Card Details
     * @param CardDetailRequest
     * @return JsonRespons
     */
    public function store(CardDetailRequest $request)
    {
        try {
            $request->merge(['user_id' => Auth::user()->id]);
            $userDetails = UserCardDetail::create($request->all());
            return $this->sendResponse($userDetails, 'User Details successfully.');
        } catch (Exception $e) {
            return $this->sendError('', $e->getMessage());       
        }
        
        // $stripe = new StripeClient(
        //     env('STRIPE_SECRET_KEY')
        // );
        // // $stripe->tokens->create([
        // //     'card' => [
        // //         'number' => '4242424242424242',
        // //         'exp_month' => 9,
        // //         'exp_year' => 2023,
        // //         'cvc' => '314',
        // //     ],
        // // ]);
        // $ch = $stripe->charges->retrieve(
        //     'ch_3MlApF2eZvKYlo2C06hv1AaJ',
        //     [],
        //     ['api_key' => 'sk_test_51Mc7HESB3rzAx6YbxsdF5HQj6EX5WGigDFr60eAEQnS2Rq7B4SeQNDrjTuaQkV6mEG2SrZKBAT5ylvqp7zMv7zIm00Owcva2MH']
        //   );
        // $ch->capture(); // Uses the same API Key.
        // dd($ch);
    }
}
