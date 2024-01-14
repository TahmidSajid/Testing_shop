@extends('layouts.dashboard')
@section('content')
    @livewire('variation.addsize',['prduct' => $id])
    @livewire('variation.color',['prduct' => $id])
    @livewire('variation.variant',['prduct' => $id])
    @livewire('variation.quantity',['prduct' => $id],)
@endsection
