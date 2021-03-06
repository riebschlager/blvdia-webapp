<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PhotoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		return redirect('/');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
	}

	public function showPlayer($id) {
		$photo = Photo::where('uid', '=', $id)->firstOrFail();
		return view('player')->with('photo', $photo);
	}

	public function collage() {
		return view('collage');
	}

	public function randomAll() {
		$photos = Photo::orderBy(\DB::raw('RAND()'))->take(30)->get();
		return response()->json($photos);
	}

	public function randomFeatured() {
		$photos = Photo::where('featured', '=', TRUE)->orderBy(\DB::raw('RAND()'))->take(30)->get();
		return response()->json($photos);
	}

	public function allPhotos() {
		$photos = Photo::orderBy('id', 'desc')->paginate();
		return response()->json($photos);
	}

	public function featuredPhotos() {
		$photos = Photo::where('featured', '=', TRUE)->orderBy('id', 'desc')->paginate();
		return response()->json($photos);
	}

	public function feature(Request $req) {
		$photo = Photo::where('id', '=', $req['id'])->firstOrFail();
		$photo->featured = TRUE;
		$photo->save();
		return 'success';
	}

	public function unfeature(Request $req) {
		$photo = Photo::where('id', '=', $req['id'])->firstOrFail();
		$photo->featured = FALSE;
		$photo->save();
		return 'success';
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request) {
		$photo = new Photo();
		$photo->uid = $request->input('uid');
		$photo->url = $request->input('url');
		$photo->save();

		$url = url('/photo') . '/' . $request->input('uid');
		return response()->json(['success' => $url]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$photo = Photo::where('uid', '=', $id)->firstOrFail();
		return view('photo')->with('photo', $photo);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

}
