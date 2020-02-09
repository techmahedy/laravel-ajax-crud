<?php
namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompanyController extends Controller
{
  public function view()
  {
      return view('company.index');
  }

  public function get_company_data(Request $request)
  {
      $companies = Company::latest()->paginate(5);

      return \Request::ajax() ? 
                   response()->json($companies,Response::HTTP_OK) 
                   : abort(404);
  }

  public function Store(Request $request)
  {
    Company::updateOrCreate(
      [
        'id' => $request->id
      ],
      [
        'name' => $request->name,
        'address' => $request->address
      ]
    );

    return response()->json(
      [
        'success' => true,
        'message' => 'Data inserted successfully'
      ]
    );
  }

  public function update($id)
  {
    $comapny  = Company::find($id);

    return response()->json([
      'data' => $comapny
    ]);
  }
  
  public function destroy($id)
  {
    $company = Company::find($id);

    $company->delete();

    return response()->json([
      'message' => 'Data deleted successfully!'
    ]);
  }

}
