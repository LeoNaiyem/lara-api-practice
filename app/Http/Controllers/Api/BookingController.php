<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookingResource;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BookingResource::collection(Booking::latest()->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'order_total' => 'required|numeric|min:0',
            'paid_total' => 'required|numeric|min:0',
            'remark' => 'nullable|string',
            'customer_id' => 'required|integer',
        ]);


        $data['created_at'] = now();
        try {
            $booking = Booking::create($data);
            return new BookingResource($booking);
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        try {
            return new BookingResource($booking);
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $data = $request->validate([
            'order_total' => 'required|numeric|min:0',
            'paid_total' => 'required|numeric|min:0',
            'remark' => 'nullable|string',
            'customer_id' => 'required|integer'
        ]);
        $data['created_at'] = now();
        try {
            $booking->update($data);
            return new BookingResource($booking);
        } catch (\Throwable $error) {
            return response()->json(['error', $error->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        try {
            $booking->delete();
            return response()->json(['message' => 'successfully deleted!']);
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
