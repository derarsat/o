@extends("dashboard.layout")
@section("title")
Gift Vouchers
@endsection
@section("content")
<h2 class="page-title">
    All Vouchers

</h2>
<table>
    <thead>
        <tr>
            <th>Full name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
    @inject('carbon', 'Carbon\Carbon')

        @foreach($vouchers as $voucher)
        <tr>
            <td>{{$voucher->name}}</td>
            <td>{{$voucher->email}}</td>
            <td>{{$voucher->message }}</td>
            <td>{{ $carbon::parse($voucher->created_at)->format('Y-m-d') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection