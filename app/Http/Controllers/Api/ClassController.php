<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClassController extends Controller
{
    public function classInfoRetrieve(): \Illuminate\Http\JsonResponse
    {
        $class = Classes::all();

        if($class->count() > 0){
            return response()->json([
                'status' => 200,
                'class' => $class
            ], 200);
        }else {
            return response()->json([
                'status' => 404,
                'message' => 'No Records Found'
            ], 404);
        }
    }

    public function classInfoInput(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'nullable|string|max:20',
            'faculty_id' => 'nullable|string|max:20',
            'student_id' => 'nullable|string|max:20',
            'description' => 'required|string|max:255',
            'acadYear' => 'required|string|max:4',
            'finalGrade' => 'nullable|decimal:2',
            'gradeStatus' => 'nullable|string|max:8'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $student = Classes::create([
                'course_id' => $request->course_id,
                'faculty_id' => $request->faculty_id,
                'student_id' => $request->student_id,
                'description' => $request->description,
                'acadYear' => $request->acadYear,
                'finalGrade' => $request->finalGrade,
                'gradeStatus' => $request->gradeStatus
            ]);

            if($student){
                return response()->json([
                    'status' => 200,
                    'message' => "Class Create Successfully"
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => "Something Went Wrong"
                ],500);
            }
        }
    }

    public function classInfoShow ($id)
    {
        $class = Classes::find($id);
        if($class){
            return response()->json([
                'status' => 200,
                'class' => $class
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Such Record Found'
            ], 404);
        }
    }

    public function classInfoEdit ($id)
    {
        $class = Classes::find($id);
        if($class){
            return response()->json([
                'status' => 200,
                'class' => $class
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Such Record Found'
            ], 404);
        }
    }

    public function classInfoUpdate (Request $request, Int $id)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'nullable|string|max:20',
            'faculty_id' => 'nullable|string|max:20',
            'student_id' => 'nullable|string|max:20',
            'description' => 'required|string|max:255',
            'acadYear' => 'required|string|max:4',
            'finalGrade' => 'nullable|decimal:1,2',
            'gradeStatus' => 'nullable|string|max:8'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $class = Classes::find($id);

            if($class){
                $class->update([
                    'course_id' => $request->course_id,
                    'faculty_id' => $request->faculty_id,
                    'student_id' => $request->student_id,
                    'description' => $request->description,
                    'acadYear' => $request->acadYear,
                    'finalGrade' => $request->finalGrade,
                    'gradeStatus' => $request->gradeStatus
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => "Class Updated Successfully"
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
