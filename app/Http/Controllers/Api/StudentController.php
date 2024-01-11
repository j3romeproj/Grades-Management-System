<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function studentInfoRetrieve()
    {
        $students = Student::all();

        if ($students->count() > 0) {
            return response()->json([
                'status' => 200,
                'students' => $students
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Records Found'
            ], 404);
        }
    }

    public function studentInfoInput(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'account_id' => 'nullable|string|max:20',
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'suffix' => 'nullable|string|max:3',
            'birthDate' => 'required|date'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $student = Student::create([
                'account_id' => $request->account_id,
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'middleName' => $request->middleName,
                'suffix' => $request->suffix,
                'birthDate' => $request->birthDate
            ]);

            if($student){
                return response()->json([
                    'status' => 200,
                    'message' => "Student Create Successfully"
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => "Something Went Wrong"
                ],500);
            }
        }
    }

    public function studentInfoShow ($id)
    {
        $student = Student::find($id);
        if($student){
            return response()->json([
                'status' => 200,
                'students' => $student
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Such Record Found'
            ], 404);
        }
    }

    public function studentInfoEdit ($id)
    {
        $student = Student::find($id);
        if($student){
            return response()->json([
                'status' => 200,
                'students' => $student
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Such Record Found'
            ], 404);
        }
    }

    public function studentInfoUpdate (Request $request, Int $id)
    {
        $validator = Validator::make($request->all(), [
            'account_id' => 'nullable|string|max:20',
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'suffix' => 'nullable|string|max:3',
            'birthDate' => 'required|date'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $student = Student::find($id);

            if($student){
                $student->update([
                    'account_id' => $request->account_id,
                    'firstName' => $request->firstName,
                    'lastName' => $request->lastName,
                    'middleName' => $request->middleName,
                    'suffix' => $request->suffix,
                    'birthDate' => $request->birthDate
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => "Student Updated Successfully"
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
