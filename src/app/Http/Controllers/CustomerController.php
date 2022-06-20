<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['customerList'] = Customer::get();
        return view('customer',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Customer::insert(
            [
                'name' => $_POST['name'],
                'address' => $_POST['address'],
                'phone' => $_POST['phone'],
                'birthday' => $_POST['birthday'],
                'created_at' => Now(),
                'updated_at' => Now()
            ]
        );
        return redirect(route("customer.index"))->with('success', 'Thêm khách hàng thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['customerList'] = Customer::get();
        $data['handle'] = 'loadFormEdit';
        $result = Customer::where('id',$id)->get();
        $data['customerByID'] = $result[0];
        // dd($data);
        return view('customer',compact('data'));
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
        Customer::where('id',$id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'updated_at' => Now()
        ]);
        return redirect(route("customer.index"))->with('success', 'Cập nhật thông tin khách hàng thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Customer::where('id',$id)->delete();
        return redirect(route("customer.index"))->with('success', 'Xóa khách hàng thành công');
    }
}
