<?php

namespace App\Http\Services\Review;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class ReviewService {

    public function get(){
        return DB::table('product_reviews')
                        ->join('users', 'users.id', '=', 'product_reviews.user_id')
                        ->select('product_reviews.product_id as product_id', 'product_reviews.content as content', 'product_reviews.id as id', 'users.name as user_name', 'users.id as user_id', 'product_reviews.created_at as created_at', 'product_reviews.active as active',)
                        ->paginate(20);
    }

    public function lockReview($request)
    {
        try{
            DB::table('product_reviews')->where('id', $request->input('review_id'))->update(['active' => $request->input('active')]);
            Session::flash('success', 'Đã khóa bình luận!');

            } catch (\Exception $err) {
                Session::flash('error', 'Lỗi cập nhật trạng thái');
                Log::info($err->getMessage());
                return false;
            }
            
            return true;
    }

    public function unLockReview($request)
    {
        try{
            DB::table('product_reviews')->where('id', $request->input('review_id'))->update(['active' => $request->input('active')]);
            Session::flash('success', 'Đã mở khóa bình luận!');

            } catch (\Exception $err) {
                Session::flash('error', 'Lỗi cập nhật trạng thái');
                Log::info($err->getMessage());
                return false;
            }
            
            return true;
    }
}