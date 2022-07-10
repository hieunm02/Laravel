<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Review\ReviewService;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    protected $reviews;
    public function __construct(ReviewService $reviewService)
    {
        $this->reviews = $reviewService;
    }

    public function index()
    {
        return view('admin.reviews.list', [
            'title' => "Danh sách đánh giá sản phẩm của khách hàng",
            'reviews' => $this->reviews->get(),
        ]);
    }

    
    public function lock(Request $request)
    {
        $this->reviews->lockReview($request);
        return redirect()->back();
    }

    public function unLock(Request $request)
    {
        $this->reviews->unLockReview($request);
        return redirect()->back();
    }
}
