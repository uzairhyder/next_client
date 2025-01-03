<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\FrontendModels\Order;
use Illuminate\Support\Facades\Mail;

class OrderManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('products','billing_address','shipping_address')->has('products','!=','')->get();
        // return $orders;
        return view('admin_dashboard.orderManagement.index',get_defined_vars());
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

        $order = Order::where('id',$id)->with('user','products','billing_address','shipping_address')->has('products','!=','')->first();
        $invoices = Order::where('id',$id)->with('user','products','billing_address','shipping_address')->has('products','!=','')->first();
        return view('admin_dashboard.orderManagement.show',get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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


    public function order_status(Request $request, $id)
    {
        $order = Order::find($id);
        $order->order_status = $request->order_status;
        $order->save();
        if($order){

            if(!empty($request->comment)){
                $user = User::find($order->user_id);
                $send_mail_user = $user->email;
                // return $user;

                $data = $user;
                $comment = !empty($request->comment) ? $request->comment : '';
                Mail::send('admin_dashboard.emails.order-status', ['data' => $data, 'order' => $order, 'comment' => $comment], function ($message) use ($send_mail_user){
                    $message->to($send_mail_user, 'Order Status')->subject('Order Status');
                });
            }

            return back()->with('order_status','Order status has been changed.');

        }else{
            return back()->with('order_status_error','Oops! something went wrong.');
        }

    }


    public function invoice_index(Request $request, $id)
    {
        $order = Order::where('id',$id)->with('user','products','billing_address','shipping_address')->has('products','!=','')->first();
        // $invoices = Order::where('id',$id)->with('user','products','billing_address','shipping_address')->has('products','!=','')->first();
        return view('admin_dashboard.orderManagement.invoice',get_defined_vars());

    }
}
