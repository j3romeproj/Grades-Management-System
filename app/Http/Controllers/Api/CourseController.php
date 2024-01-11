<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function courseInfoRetrieve(): \Illuminate\Http\JsonResponse
    {
        $courses = Course::all();

        if($courses->count() > 0){
            return response()->json([
                'status' => 200,
                'students' => $courses
            ], 200);
        }else {
            return response()->json([
                'status' => 404,
                'message' => 'No Records Found'
            ], 404);
        }
    }

    public function courseInfoInput(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'faculty_id' => 'nullable|integer|max:20',
            'courseDescription' => 'required|string|max:255',
            'units' => 'required|decimal:1'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $student = Course::create([
                'faculty_id' => $request->faculty_id,
                'courseDescription' => $request->courseDescription,
                'units' => $request->units
            ]);

            if($student){
                return response()->json([
                    'status' => 200,
                    'message' => "Course Create Successfully"
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => "Something Went Wrong"
                ],500);
            }
        }
    }

    public function courseInfoShow ($id)
    {
        $course = Course::find($id);
        if($course){
            return response()->json([
                'status' => 200,
                'course' => $course
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Such Record Found'
            ], 404);
        }
    }

    public function courseInfoEdit ($id)
    {
        $course = Course::find($id);
        if($course){
            return response()->json([
                'status' => 200,
                'course' => $course
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Such Record Found'
            ], 404);
        }
    }

    public function courseInfoUpdate (Request $request, Int $id)
    {
        $validator = Validator::make($request->all(), [
            'faculty_id' => 'nullable|integer|max:20',
            'courseDescription' => 'required|string|max:255',
            'units' => 'required|decimal:1,2'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $course = Course::find($id);

            if($course){
                $course->update([
                    'faculty_id' => $request->faculty_id,
                    'courseDescription' => $request->courseDescription,
                    'units' => $request->units
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => "Course Updated Successfully"
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
