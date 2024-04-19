<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class hitungpajakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('hitungpajak.hitung');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $taxStatus = $request->input('taxStatus');
        $salary = (float) str_replace(',', '', $request->input('salary')); // Mengubah format angka

        $tax = 0;

        if($taxStatus == "TK0" || $taxStatus == "TK1" || $taxStatus == "K0"){
            if($salary <= 5400000){
                $tax = 0;
            }
            elseif($salary <= 5650000){
                $tax = $salary * 0.0025;
            }
            elseif($salary <= 5950000){
                $tax = $salary * 0.005;
            }
            elseif($salary <= 6300000){
                $tax = $salary * 0.0075;
            }
            elseif($salary <= 6750000){
                $tax = $salary * 0.01;
            }
            else{
                $tax = $salary * 0.02; 
            }
        }
        elseif($taxStatus == "TK2" || $taxStatus == "TK3" || $taxStatus == "K1" || $taxStatus == "K2"){
            if($salary <= 6200000){
                $tax = 0;
            }
            elseif($salary <= 6500000){
                $tax = $salary * 0.025;
            }
            elseif($salary <= 6850000){
                $tax = $salary * 0.005;
            }
            elseif($salary <= 7300000){
                $tax = $salary * 0.0075;
            }
            elseif($salary <= 9200000){
                $tax = $salary * 0.01;
            }
            else{
                $tax = $salary * 0.02; 
            }
        }
        elseif($taxStatus == "TK3"){
            if($salary <= 6600000){
                $tax = 0;
            }
            elseif($salary <= 6950000){
                $tax = $salary * 0.025;
            }
            elseif($salary <= 7350000){
                $tax = $salary * 0.005;
            }
            elseif($salary <= 7800000){
                $tax = $salary * 0.0075;
            }
            elseif($salary <= 8850000){
                $tax = $salary * 0.1;
            }
            else{
                $tax = $salary * 0.2; 
            }
        }

        // Mengirim data ke view
        return view('hitungpajak.hitung', [
            'taxStatus' => $taxStatus,
            'salary' => $salary,
            'tax' => $tax,
            'totalTax' => $tax
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
