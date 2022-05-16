@extends('frontend.layout.layoutuser')
@section('content')
<div class="container">
    <h3>Giỏ hàng - ({{ Cart::getcontent()->count() }})</h3>
    <hr>
    <table class="table" border="1">
    @foreach (Cart::getcontent() as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->name }}</td>
        <td><img src="{{ url('public') }}/frontend/images/{{ $item->attributes['image'] }}" alt="" style="width: 30%"></td>
        <td>{{ number_format($item->price) }}</td>
        <td>{{ $item->quantity }}</td>
        <td>{{ number_format($item->price*$item->quantity) }}VND</td>
        <td>
            <form action="{{ route('user.updatecart') }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="put">
                <input type="number" name="quantity" id="" value="{{ $item->quantity }}">
                <input type="hidden" name="id" value="{{ $item->id }}">
                <input type="submit" value="Cập nhật">
            </form>
        </td>
        <td>
        <form action="{{ route('user.delcart') }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="id" value={{ $item->id }}>
            <input type="submit" value="Xoá">
        </form>
        </td>
    </tr>
    @endforeach
    </table>
    <h4 style="float: right">Tổng: {{ Cart::getTotal() }}</h4>
    <a href="{{ route('user.showPro') }}">Tiếp tục mua hàng</a>
</div>
@endsection
