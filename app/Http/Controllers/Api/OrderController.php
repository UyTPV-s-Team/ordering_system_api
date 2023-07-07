<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = [
            [
                "id" => "123",
                "timestamp" => "2023-06-29 12:00:00",
                "status" => [
                    [
                        "preparation" => "true",
                        "ready" => "false",
                        "delivered" => "false"
                    ]
                ],
                "product" => [
                    [
                        "title" => "Big Mac Meal",
                        "amount" => "2"
                    ],
                    [
                        "title" => "McVegan",
                        "amount" => "1"
                    ]
                ]
            ],
            [
                "id" => "456",
                "timestamp" => "2023-06-29 12:00:05",
                "status" => [
                    [
                        "preparation" => "true",
                        "ready" => "false",
                        "delivered" => "false"
                    ]
                ],
                "product" => [
                    [
                        "title" => "Big Mac Meal",
                        "amount" => "2"
                    ],
                    [
                        "title" => "McVegan",
                        "amount" => "1"
                    ]
                ]
            ],
        ];
       
        return response()->json(["orders" => $orders]);
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
    public function show($id)
    {
        //
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
        //
    }
}
