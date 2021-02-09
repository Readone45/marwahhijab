<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $data = [
            'orders' => Order::paginate(15),
        ];
        return view('admin.order.index', $data);
    }

    public function show(Request $request, $id)
    {
        $data = [
            'order' => Order::find($id),
        ];

        return view('admin.order.show', $data);
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->delete();
        }
        return redirect(route('order.index'))->with('success', 'Data berhasil dihapus');
    }

    public function checkout(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
            'province' => 'required',
            'district' => 'required',
            'subdistrict' => 'required',
            'address' => 'required',
            //'weight' => $request->form_weight,
            // 'shipping_cost' => 'required',
            // 'shipping_method' => 'required',
            // 'total' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'postal_code' => $request->postal_code,
            'city' => $request->city,
            'province' => $request->province,
            'district' => $request->district,
            'subdistrict' => $request->subdistrict,
            'address' => $request->address,
            //'weight' => $request->form_weight,
            'shipping_cost' => $request->form_shipping_cost,
            'shipping_method' => $request->form_shipping_method,
            'total' => $request->form_subtotal,
        ];

        $order = Order::create($data);
        $now = date('Y-m-d H:i:s');
        if ($order) {
            $detail = [];
            for ($i = 0; $i < count($request->product_id); $i++) {
                $detail[$i]['order_id'] = $order->id;
                $detail[$i]['product_id'] = $request->product_id[$i];
                $detail[$i]['color'] = $request->color[$i];
                $detail[$i]['price'] = $request->price[$i];
                $detail[$i]['qty'] = $request->qty[$i];
                $detail[$i]['size'] = $request->size[$i];
                $detail[$i]['set'] = $request->set[$i];
                $detail[$i]['created_at'] = $now;
                $detail[$i]['updated_at'] = $now;
            }

            OrderDetail::insert($detail);
            return response()->json(
                [
                    'message' => 'success',
                    'redirect' => $this->generateWhatsapp($order->id),
                ]
            );
        }
    }

    public function generateWhatsapp($order_id)
    {
        $order = Order::find($order_id);
        $text = 'Hallo Marwah Hijab! Saya ingin order%0A%0A';
        $details = OrderDetail::where('order_id', $order_id)->get();
        foreach ($details as $key => $d) {
            $text .= '*' . ($key + 1) . '. ' . $d->product->name . '*%0A';
            $text .=  'Jumlah: ' . $d->qty . '%0A';
            $text .=  'Harga (x1): ' . 'Rp ' . number_format($d->price / $d->qty) . '%0A';
            $text .=  'Harga Total: ' . 'Rp ' . number_format($d->price) . '%0A';
            $text .=  'Keterangan: ' . '%0A';
            $text .=  '-Set: ' . $d->set . '%0A';
            $text .=  '-Warna: ' . $d->color . '%0A';
            $text .=  '%0A';
        }
        $text .= 'Subtotal: *Rp' . number_format($order->total - $order->shipping_cost) . '*' . '%0A';
        $text .= 'Ongkir (' . $order->shipping_method . '): *Rp' . number_format($order->shipping_cost) . '*' . '%0A';
        $text .= 'Total: *Rp' . number_format($order->total) . '*' . '%0A';
        $text .= '------------------------------%0A';
        $text .= '*Nama:*' . '%0A';
        $text .= $order->name . ' (' . $order->phone . ') ' . '%0A';
        $text .= '%0A';
        $text .= '*Alamat:*' . '%0A';
        $text .= $order->address . ' ' . $order->subdistrict . ', ' . $order->district . ', ' . $order->city . ', ' . $order->province . ' - ' . $order->postal_code . '%0A';
        $text .= '%0A';

        $url = 'https://api.whatsapp.com/send?phone=' . site('contact.whatsapp') . '&text=' . $text;
        return $url;
    }

    // Halo Kuy Shop! Saya ingin order :

    //  *1. Kaos Oblong Tanah Abang XL/L/S*
    // Jumlah: 1
    // Harga (x1): Rp250.000
    // Harga Total: Rp250.000
    // Keterangan: -

    // *2. BLU G90 Gaming Smartphone*
    // Jumlah: 1
    // Harga (x1): Rp3.500.000
    // Harga Total: Rp3.500.000
    // Keterangan: -

    // Subtotal: *Rp3.750.000*
    // Ongkir (POS PAKET KILAT KHUSUS): *Rp91.000*
    // Total: *Rp3.841.000*
    // -----------------------
    // *Nama:*
    // nama (12323232)

    // *Alamat:*
    // alamat desa, kecama, Kabupaten Lebak, Banten - 4340


}
