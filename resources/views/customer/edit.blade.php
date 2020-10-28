@extends('layouts.app')

@section('content')
    <customer-detail :is-new="false" customer-id="{{$customer_id}}"></customer-detail>
@endsection
