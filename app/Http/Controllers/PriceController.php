<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\Provider;
use App\Product;

class PriceController extends Controller 
{

  /**
   * Get Broadband price
   *
   */
  public function getBroadBandPrice(Request $request)
  {
      $validator = Validator::make($request->all(), [ 
          'provider_name' => 'required', 
          'product_name' => 'required',
      ]);
      
      if ($validator->fails()) { 
          return response()->json(['error'=>$validator->errors()], 401);            
      }

      $provider = Provider::where('name', '=', $request->provider_name)->get()->first();
      
      if ($provider) {
          $product = $provider->products()
                      ->where('name', '=', $request->product_name)
                      ->where('type', '=', 'simple')              // This means broadband product
                      ->where('visibility', '=', 'visible')       // This means broadband product
                      ->get()->first();
          if ($product) {
              return response()->json($product->price->price);
          }
          return response()->json(['error'=>'no such a product named '.$request->product_name]);
      }
      return response()->json(['error'=>'no such a provider named'.$request->provider_name]);
  }

  /**
   * Get Broadband price
   *
   */
  public function getEnergyPrice(Request $request)
  {
      $validator = Validator::make($request->all(), [ 
          'provider_name' => 'required', 
          'product_name' => 'required',
          'product_variation' => 'required',
      ]);
      
      if ($validator->fails()) { 
          return response()->json(['error'=>$validator->errors()], 401);            
      }

      $provider = Provider::where('name', '=', $request->provider_name)->get()->first();
      
      if ($provider) {
          $products = $provider->products()
                    ->where('type', '=', 'variant')                
                    ->get();

          foreach($products as $product) {
              $child_product = $product->children()
                      ->where('name', '=', $request->product_name)                
                      ->where('variation_name', '=', $request->product_variation)
                      ->get()->first();
              if($child_product) {
                  return response()->json($child_product->price->price);
              }
          }        
          return response()->json(['error'=>'no such a product named '.$request->product_name.' or with variation named '.$request->product_variation]);
      }
      return response()->json(['error'=>'no such a provider named '.$request->provider_name]);
  }

  public function saveEnergyPrice(Request $request) {
      $validator = Validator::make($request->all(), [ 
          'provider_name' => 'required', 
          'product_name' => 'required',
          'product_variation' => 'required',
          'new_price' => 'required',
      ]);
      
      if ($validator->fails()) { 
          return response()->json(['error'=>$validator->errors()], 401);            
      }

      $provider = Provider::where('name', '=', $request->provider_name)->get()->first();
        
      if ($provider) {
          $products = $provider->products()
                    ->where('type', '=', 'variant')                
                    ->get();

          foreach($products as $product) {
              $child_product = $product->children()
                      ->where('name', '=', $request->product_name)                
                      ->where('variation_name', '=', $request->product_variation)
                      ->get()->first();
              if($child_product) {
                  $child_product->price->price = $request->new_price;
                  $child_product->price->save();
                  return response()->json(['success' => 'Successfully updated']);
              }
          }        
          return response()->json(['error'=>'no such a product named '.$request->product_name.' or with variation named '.$request->product_variation]);
      }
      return response()->json(['error'=>'no such a provider named '.$request->provider_name]);
  }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    dd(11);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }
  
}

?>