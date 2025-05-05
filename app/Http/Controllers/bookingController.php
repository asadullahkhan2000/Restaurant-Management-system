<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

class BookingController extends Controller
{
    public function index()
    {
        return view('home.book');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'phone_number' => 'required|string',
            'number_of_guests' => 'required|integer|min:1',
            'time' => 'required',
            'date' => 'required|date',
        ]);

        // Assuming each guest costs $50
        $totalAmount = $validated['number_of_guests'] * 50;
        $advanceAmount = $totalAmount * 0.10; // 10% advance payment

        $booking = Book::create([
            'phone_number' => $validated['phone_number'],
            'number_of_guests' => $validated['number_of_guests'],
            'time' => $validated['time'],
            'date' => $validated['date'],
            'advance_payment' => 0, // To be updated after payment
            'status' => 'pending',
        ]);

        return redirect()->route('payment', ['booking_id' => $booking->id, 'amount' => $advanceAmount]);
    }

    public function payment($booking_id, $amount)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => ['name' => 'Table Booking Advance Payment'],
                    'unit_amount' => $amount * 100, // Convert to cents
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success', ['booking_id' => $booking_id]),
            'cancel_url' => route('payment.cancel'),
        ]);

        return redirect($session->url);
    }

    public function paymentSuccess($booking_id)
    {
        $booking = Book::findOrFail($booking_id);
        $booking->update(['advance_payment' => $booking->number_of_guests * 50 * 0.10, 'status' => 'confirmed']);

        return redirect()->route('booking.success');
    }

    public function bookingSuccess()
    {
        return view('booking.success');
    }

    public function paymentCancel()
    {
        return view('booking.cancel');
    }
}
