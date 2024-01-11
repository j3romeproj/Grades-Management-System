<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function accountInfoRetrieve()
    {
        $account = Account::all();

        if($account->count() > 0){
            return response()->json([
                'status' => 200,
                'account' => $account
            ], 200);
        }else {
            return response()->json([
                'status' => 404,
                'message' => 'No Records Found'
            ], 404);
        }
    }

    public function accountInfoInput(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'accountName' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'accountType' => 'required|string|max:1'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $account = Account::create([
                'accountName' => $request->accountName,
                'password' => Hash::make($request->password),
                'accountType' => $request->accountType
            ]);

            if($account){
                return response()->json([
                    'status' => 200,
                    'message' => "Account Create Successfully"
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => "Something Went Wrong"
                ],500);
            }
        }
    }
    public function accountInfoShow ($id): \Illuminate\Http\JsonResponse
    {
        $account = Account::find($id);
        if($account){
            return response()->json([
                'status' => 200,
                'account' => $account
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Such Record Found'
            ], 404);
        }
    }

    public function accountInfoEdit ($id): \Illuminate\Http\JsonResponse
    {
        $account = Account::find($id);
        if($account){
            return response()->json([
                'status' => 200,
                'account' => $account
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Such Record Found'
            ], 404);
        }
    }

    public function accountInfoUpdate (Request $request, Int $id): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'accountName' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'accountType' => 'required|string|max:1'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $account = Account::find($id);

            if($account){
                $account->update([
                    'accountName' => $request->accountName,
                    'password' => Hash::make($request->password),
                    'accountType' => $request->accountType
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => "Account Updated Successfully"
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
