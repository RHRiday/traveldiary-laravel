@extends('layouts.app')

@section('title')
    <title>Orderlist</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/place.css') }}">
@endsection

@section('content')
    @include('partials.nav')
    <!--main section starts-->
    <section class="my-5 ml-5 mr-5">
        <div class="contianer content">
            <table class="table table-striped table-bordered orderDataTable" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Amount</th>
                        <th>Transaction_id</th>
                        <th>Phone</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderList as $order)
                        <tr>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->amount }}</td>
                            <td>{{ $order->transaction_id }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->status }}</td>
                        </tr>
                    @endforeach
                    <tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td></tr>
                    <tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td></tr>
                    <tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td></tr>
                    <tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td></tr>
                    <tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td></tr>
                    <tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td></tr>
                    <tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td></tr>
                    <tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td></tr>
                    <tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td></tr>
                    <tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td></tr>
                    <tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td></tr>
                    <tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td></tr>
                    <tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td></tr>
                    <tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td></tr>
                    <tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td></tr>
                    <tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td></tr>
                    <tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td></tr>
                    <tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td></tr>
                    <tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td></tr>
                    <tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td></tr>
                    <tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td></tr>
                    <tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td></tr>
                    <tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td></tr>
                    <tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td></tr>
                    <tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td></tr>
                    <tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td></tr>
                    <tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td></tr>
                    
                </tbody>
    
            </table>
        </div>

    </section>

    @include('partials.footer')
@endsection
