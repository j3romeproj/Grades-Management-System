<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FacultyController extends Controller
{
    public function facultyDashboard()
    {
        return view('faculty_dashboard');
    }

    public function facultyInfoRetrieve(): \Illuminate\Http\JsonResponse
    {
        $faculties = Faculty::all();

        if($faculties->count() > 0){
            return response()->json([
                'status' => 200,
                'faculties' => $faculties
            ], 200);
        }else {
            return response()->json([
                'status' => 404,
                'message' => 'No Records Found'
            ], 404);
        }
    }

    public function facultyInfoInput(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'account_id' => 'nullable|string|max:20',
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'suffix' => 'nullable|string|max:3',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $faculty = Faculty::create([
                'account_id' => $request->account_id,
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'middleName' => $request->middleName,
                'suffix' => $request->suffix,
            ]);

            if($faculty){
                return response()->json([
                    'status' => 200,
                    'message' => "Faculty Create Successfully"
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => "Something Went Wrong"
                ],500);
            }
        }
    }

    public function facultyInfoShow ($id)
    {
        $faculty = Faculty::find($id);
        if($faculty){
            return response()->json([
                'status' => 200,
                'faculty' => $faculty
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Such Record Found'
            ], 404);
        }
    }

    public function facultyInfoEdit ($id)
    {
        $faculty = Faculty::find($id);
        if($faculty){
            return response()->json([
                'status' => 200,
                'faculty' => $faculty
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Such Record Found'
            ], 404);
        }
    }

    public function facultyInfoUpdate (Request $request, Int $id)
    {
        $validator = Validator::make($request->all(), [
            'account_id' => 'nullable|string|max:20',
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'suffix' => 'nullable|string|max:3',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $faculty = Faculty::find($id);

            if($faculty){
                $faculty->update([
                    'account_id' => $request->account_id,
                    'firstName' => $request->firstName,
                    'lastName' => $request->lastName,
                    'middleName' => $request->middleName,
                    'suffix' => $request->suffix,
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => "Faculty Updated Successfully"
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => "No Such Record Found"
                ],500);
            }
        }
    }
}
