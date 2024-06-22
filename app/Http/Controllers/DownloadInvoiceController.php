<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;
use App\Enums\TransactionStatus;

class DownloadInvoiceController extends Controller
{
    public function download($record)
    {
        $order = Order::findOrFail($record);
        $transaction = Transaction::where('order_id', $order->id)->first();
        $statusString = (string) $transaction->status->value;

        $client = new Party([
            'name'          => 'Sarifna Laundry',
            'address'       => 'Jl. Tanjung Gedong RT. 004/RW. 016 No.2 Jakarta Barat',
            'custom_fields' => [
                'email'         => 'sarifnalaundry@gmail.com',
                'phone'         => '081280439997',
            ],
        ]);

        $customer = new Buyer([
            'name'          => $order->user->name,
            'address'       => $order->user->address,
            'custom_fields' => [
                'email' => $order->user->email,
                'phone' => $order->user->phone_number,
            ],
        ]);

        $item = InvoiceItem::make($order->servicePackage->name)
            ->quantity($order->weight)
            ->units('Kg')
            ->description('Laundry Service Package')
            ->pricePerUnit($order->total_price/$order->weight); 

        $invoice = Invoice::make()
            ->series('SARIFNA')
            ->status($statusString)
            ->sequence(random_int(00000, 99999))
            ->serialNumberFormat('{SEQUENCE}/{SERIES}')
            ->seller($client)
            ->buyer($customer)
            ->date(now()->subWeeks(3))
            ->dateFormat('m/d/Y')
            ->currencySymbol('IDR')
            ->payUntilDays(0)
            ->currencyFormat('{SYMBOL}. {VALUE}')
            ->currencyThousandsSeparator('.')
            ->currencyCode('IDR')
            ->currencyDecimalPoint(',')
            ->filename($client->name . ' ' . $customer->name)
            ->addItem($item);

        return $invoice->stream();
    }
}
