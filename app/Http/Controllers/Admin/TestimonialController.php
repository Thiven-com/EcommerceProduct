<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    // Show all testimonials in admin
    public function index(Request $request)
    {
        $query = Testimonial::with('customer')->latest();

        // Optional status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $testimonials = $query->paginate(10);

        return view('admin.testimonials.index', compact('testimonials'));
    }

    // Approve testimonial
    public function approve($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $testimonial->update([
            'status' => 'approved',
        ]);

        return redirect()->back()->with(
            'success',
            'Testimonial approved successfully.'
        );
    }

    // Reject testimonial
    public function reject($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $testimonial->update([
            'status' => 'rejected',
        ]);

        return redirect()->back()->with(
            'success',
            'Testimonial rejected successfully.'
        );
    }

    // Delete testimonial if required
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return redirect()->back()->with(
            'success',
            'Testimonial deleted successfully.'
        );
    }
}
