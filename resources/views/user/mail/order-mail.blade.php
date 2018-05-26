<div>
	<strong>{{ trans('custom.mail.title') }}</strong>
	<strong>{{ trans('custom.mail.custom') }}</strong><p>{{ $order->fullname }}</p>
	<strong>{{ trans('custom.mail.total') }}</strong><p>{{ number_format($order->endtotal, 2, '.', ',') }}</p>
	<strong>{{ trans('custom.mail.date') }} </strong><p>{{ date_format($order->created_at, 'd-m-Y') }}</p>
	<table>
		<caption>{{ trans('custom.mail.detailOrder') }}</caption>
		<thead>
			<th>{{ trans('custom.orderUser.productName') }}</th>
            <th>{{ trans('custom.orderUser.price') }}</th>
            <th>{{ trans('custom.orderUser.qty') }}</th>
            <th>{{ trans('custom.orderUser.total') }}</th>
		</thead>
		<tbody>
			 @foreach ($order->orderDetails as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ number_format($item->product->price_out, 2, '.', ',') }}</td>
                    <td align="center">{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price, 2, '.', ',') }}</td>
                </tr>
            @endforeach
		</tbody>
	</table>
</div>