<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Property;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class BookingController extends Controller
{
    public function index(Request $request): View
    {
        return view('bookings.index', [
            'bookings' => $request->user()->bookings()->with('property')->latest()->get(),
        ]);
    }

    public function store(Request $request, Property $property): RedirectResponse
    {
        $data = $request->validate([
            'starts_at' => ['required', 'date', 'after_or_equal:today'],
            'ends_at' => ['required', 'date', 'after:starts_at'],
        ]);

        $hasConflict = $property->bookings()
            ->where('status', '!=', 'cancelled')
            ->where('starts_at', '<', $data['ends_at'])
            ->where('ends_at', '>', $data['starts_at'])
            ->exists();

        if ($hasConflict) {
            return back()->withErrors(['starts_at' => 'Deze woning is in deze periode niet beschikbaar.'])->withInput();
        }

        $nights = Carbon::parse($data['starts_at'])->diffInDays(Carbon::parse($data['ends_at']));

        $request->user()->bookings()->create([
            'property_id' => $property->id,
            'starts_at' => $data['starts_at'],
            'ends_at' => $data['ends_at'],
            'total_price' => $nights * $property->prijs_per_nacht,
            'status' => 'confirmed',
        ]);

        return redirect()->route('bookings.index')->with('status', 'Je reservering is bevestigd.');
    }

    public function cancel(Request $request, Booking $booking): RedirectResponse
    {
        abort_unless($booking->user_id === $request->user()->id, 403);

        if ($booking->status !== 'cancelled') {
            $booking->update(['status' => 'cancelled']);
        }

        return back()->with('status', 'Je reservering is geannuleerd.');
    }
}
