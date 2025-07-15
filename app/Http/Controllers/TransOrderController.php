<?php

namespace App\Http\Controllers;

use App\Models\TransOrders;
use App\Models\TransDetails;
use App\Models\Customers;
use App\Models\TypeOfServices;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Midtrans\Config;
use Midtrans\Snap;



class TransOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function __construct()
    // {
    //     Config::$serverKey = env('MIDTRANS_SERVER_KEY');
    //     Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
    //     Config::$isSanitized = true;
    //     Config::$is3ds = true;
    // }
    public function index()
    {
        $title = "Transaksi Order";
        $datas = TransOrders::with('customer')->orderBy('id', 'desc')->get();
        return view ('trans.index', compact('title', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $today = Carbon::now()->format('dmY');
        $countDay = TransOrders::whereDate('created_at', now()->toDateString())->count() +1;
        $runningNumber = str_pad($countDay, 3, '0', STR_PAD_LEFT);
        $orderCode = "TR-". $today . "-" . $runningNumber;
        $title = "Tambah Transaksi";

        $customers = Customers::orderBy('id', 'desc')->get();
        $services = TypeOfServices::orderBy('id', 'desc')->get();
        $orders = TransOrders::with(['customer', 'details.service'])->orderBy(column: 'id', direction: 'desc')->get();

        return view ('trans.create', compact('title', 'orderCode', 'customers', 'services', 'orders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'order_end_date' => 'required'
        // ]);

        $transOrder = TransOrders::create(
[
             'id_customer' => $request->id_customer,
             'order_code' => $request->order_code,
             'order_end_date' => $request->order_end_date,
             'total' => $request->grand_total
            ]);

            foreach ($request->id_service as $key => $idService) {
                $id_trans = $transOrder->id;

                TransDetails::create([
                    'id_trans' => $id_trans,
                    'id_service' => $idService,
                    'qty' => $request->qty[$key],
                    'subtotal' => $request->total[$key]
                ]);
            }

            return redirect()->route('trans.index')->with('status', 'Berhasil');
        // $today = Carbon::now()->format('dmY');
        // $countDay = TransOrders::whereDate('created_at', now())->count() + 1;
        // $runningNumber = str_pad($countDay, 3, '0', STR_PAD_LEFT);
        // $code = 'TR-' . $today . '-' . $runningNumber;

        // if (empty($request->total)) {
        //     return redirect()->back()->with('error', 'Total tidak boleh kosong');

        // }

        // $order = TransOrders::create([
        //     'id_customer' => $request->id_customer,
        //     'order_code' => $code,
        //     'order_end_date' => $request->order_end_date,
        //     'order_note' => $request->order_note,
        //     'total' => $request->total
        // ]);

        // $id_order = $order->id;
        // foreach ($request->id_service as $index => $idService) {
        //     TransDetails::create([
        //         'id_order' => $id_order,
        //         'id_service' => $idService,
        //         'qty' => $request->qty[$index],
        //         'subtotal' => $request->subtotal[$index]
        //     ]);
        // }


        // return redirect()->route('order.index')->with('success', 'Add order data successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "Detail Transaksi";
        $details = TransOrders::with(['customer', 'details.service'])->where('id',$id)->first();


        // $snapToken = Snap::getSnapToken($params);
        // $snapToken = Snap::createTransaction($params);
        return view('trans.show', compact('title', 'details'));
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
        $trans = TransOrders::find($id);
        $trans->delete();
        return redirect()->to('trans')->with('success', 'Data berhasil didelete');
    }
    public function printStruk(string $id)
    {
        $details = TransOrders::with(['customer', 'details.service'])->where('id',$id)->first();
        // return $details;
        return view ('trans.print', compact('details'));
    }

    public function snap (Request $request, $id)

    {
        $order = TransOrders::with(['details', 'customer'])->findOrFail($id);

        $params = [
            'transaction_details' => [
                'order_id' => rand(),
                'gross_amount' => $order->total,
            ],
            'customer_details' => [
                'first_name' => $order->customer->name ?? 'aldo',
                'email' => $order->customer->email ??  "aldo@gmail.com",

            ],
            // 'enable_payment' => [
            //     'qris'
            // ],
        ];

        // $snap = Snap::createTransaction($params);
        // return response()->json(['token' => $snap->token]);
    }
}
