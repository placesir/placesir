<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $review = Review::with('user')->orderByDesc('id')->get();
            return response($review, 200);
        } catch (\Exception $e) {
            return response("Internal Server Error", 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try{
            
            $validated = $this->validate($request, [
                'nama_tempat' => ['required'],
                'alamat' => ['required'],
                'rating' => ['required', 'max:5', 'min:0'],
                'review' => ['required'],
                'latitude' => ['min:-90', 'max:90'],
                'longitude' => ['min:-90', 'max:90'],
                'photo' => ['required', 'mimes:jpg,png,jpeg', 'max:2000'],
            ]);

          
            $user = Auth::user();
            $uuid = Str::uuid()->toString();
            $extension = $request->photo->extension();
            $imageName = $uuid.'.'.$extension;  
            $request->photo->move(public_path('images'), $imageName);

            $review = Review::create([
                
                "nama_tempat" => $request->nama_tempat,
                "alamat" => $request->alamat,
                "rating" => $request->rating,
                "review" => $request->review,
                "latitude" => $request->latitude,
                "longitude" => $request->longitude,
                "photo" => "/images/".$imageName,
                "user_id" => $user->id
            ]);

            return response($review, 200);
        } catch(\Illuminate\Validation\ValidationException $e){
            return response("Request tidak valid", 400);

        }catch(\Exception $e){
            dd($e);
            return response("Internal Server Error", 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        try {
            $review = Review::findOrFail($id);
            $review->load('user');
            return response($review, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response("Review tidak ditemukan", 400);
        } catch (\Exception $e) {
            return response("Internal Server Error", 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $user = Auth::user();
            $review = Review::findOrFail($id);
            if ($review->user_id !=  $user->id) {
                return response("Review tidak valid", 403);
            }
            $review->delete();
            return response("Delete Review sukses", 200);
        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return response("Review tidak valid", 400);
        }catch(\Exception $e){
            return response("Internal Server Error", 500);
        }
    }
}
