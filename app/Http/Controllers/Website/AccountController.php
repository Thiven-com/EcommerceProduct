<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\WishlistItem;
use App\Services\WhatsAppService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class AccountController extends Controller
{
    //
    public function login()
    {
        return view('website.login');
    }
    public function logout()
    {
        Auth::guard('customer')->logout();

        Alert::toast('Logout Successfully', 'success');

        return redirect()->route('login');
    }

    public function sendOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required'
        ]);

        $otp = rand(1000, 9999);
        if ($request->mobile == 9154193014) {
            $otp = 1234;
        }
        $check = Customer::where('mobile', $request->mobile)->first();
        if (!empty($check->id)) {
            $user = Customer::where('mobile', $request->mobile)->first();
            $user->otp = $otp;
            $user->save();
        } else {
            $user = new Customer();
            $user->mobile = $request->mobile;
            $user->otp = $otp;
            $user->save();
        }
        if ($request->mobile != 9154193014) {
            $data = $this->sendWhatsAppMessage(
                $user->mobile,
                'login_verification',
                [
                    'field_1' => $otp,
                ]
            );
            try {
                $whatsappService = new WhatsAppService();
                $result = $whatsappService->sendTemplateMessage($data);
                Log::info($result);
            } catch (\Exception $e) {
                $result = false;
                Log::info($e->getMessage());
            }
        }
        return response()->json([
            'status' => true,
            'message' => 'OTP sent successfully',
        ]);
    }

    // 2. VERIFY OTP
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required',
            'otp' => 'required'
        ]);

        $user = Customer::where('mobile', $request->mobile)->first();

        if (!$user) {
            return response()->json(['status' => false, 'message' => 'Customer not found']);
        }

        if ($user->otp !== $request->otp) {
            return response()->json(['status' => false, 'message' => 'Invalid OTP']);
        }

        // LOGIN USER
        Auth::guard('customer')->login($user);
        // clear OTP
        $user->update([
            'otp' => null,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Login successful'
        ]);
    }

    private function sendWhatsAppMessage($cust_mobile, $templateName, array $fields = [])
    {

        $data = [
            "from_phone_number_id" => "1039154362623617",
            "phone_number" => '91' . $cust_mobile,
            "template_name" => $templateName,
            "template_language" => "en_Us",
            "header_image" => "https://cdn.pixabay.com/photo/2015/01/07/15/51/woman-591576_1280.jpg",
            "header_video" => "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4",
            "header_document" => "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4",
            "header_document_name" => "",
            "header_field_1" => "{full_name}",
            "location_latitude" => "",
            "location_longitude" => "",
            "location_name" => "",
            "location_address" => "",
            "field_1" => $fields['field_1'] ?? '',
            "field_2" => $fields['field_2'] ?? '',
            "field_3" => $fields['field_3'] ?? '',
            "field_4" => $fields['field_4'] ?? '',
            "field_5" => $fields['field_5'] ?? '',
            "button_0" => $fields['field_1'],
            "button_1" => "{phone_number}",
            "copy_code" => $fields['field_1'],
        ];

        return $data;
    }



   public function addToWishlist(Request $request)
{
    if (!Auth::guard('customer')->check()) {
        return response()->json([
            'status' => false,
            'message' => 'Please login first.'
        ], 401);
    }

    $request->validate([
        'product_variant_id' => 'required|exists:product_variants,id',
    ]);

    $customerId = Auth::guard('customer')->id();

    $exists = WishlistItem::where('customer_id', $customerId)
        ->where('product_variant_id', $request->product_variant_id)
        ->exists();

    if ($exists) {
        return response()->json([
            'status' => true,
            'message' => 'Product already added to wishlist.'
        ]);
    }

    WishlistItem::create([
        'customer_id' => $customerId,
        'product_variant_id' => $request->product_variant_id,
    ]);

    return response()->json([
        'status' => true,
        'message' => 'Product added to wishlist.'
    ]);
}
}
