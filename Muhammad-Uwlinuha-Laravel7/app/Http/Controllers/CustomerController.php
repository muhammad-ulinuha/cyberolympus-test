<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $customers = DB::table('customers')->paginate(10);
        $customers = DB::table('customers')->get();
        return view('customer/customer', compact('customers'));
    }

    public function getRowTen()
    {
        $customers = DB::table('customers')->paginate(10);
        return view('customer/customer', compact('customers'));
    }

    public function getAZ()
    {
        // $customers = DB::table('customers')->paginate(10);
        $customers = DB::table('customers')
        ->orderByRaw('nama ASC')
                ->get();
        return view('customer/customer', compact('customers'));
    }

    public function searchCustomer(Request $request)
    {
        $key = $request->keyword;
        
        $customers = DB::table('customers')->where('nama', 'like', '%'.$key.'%')->get();
        return view('customer/customer', compact('customers'));
    }

    public function getDate(Request $request)
    {
        $key = $request->caritanggal;
        
        $customers = DB::table('customers')->where('created_at', 'like', '%'.$key.'%')->get();
        return view('customer/customer', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required'
        ]);
        // print_r($data);
        $post = Customer::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);

        if ($post) {
            return redirect()
                ->route('customer.index')
                ->with([
                    'status' => 'New post has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'status' => 'Some problem occurred, please try again'
                ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',

        ]);
        
        $data = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ];
        Customer::whereId($id)->update($data);
        if ($data) {
            return redirect()
                ->route('customer.index')
                ->with([
                    'status' => 'Updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'status' => 'Some problem has occured, please try again'
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Customer::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('customer.index')
                ->with([
                    'status' => 'Post has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('customer.index')
                ->with([
                    'status' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
