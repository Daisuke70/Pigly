@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/common.css')}}">
<link rel="stylesheet" href="{{ asset('css/weight_logs.css')}}">
@endsection

@section('content')
<div class="weight-summary">
    <div class="weight-summary__item">
        <h1 class="weight-summary__label">目標体重</h1>
        <p class="weight-summary__value">{{ $targetWeight }}</p>
        <span class="weight-summary__unit">kg</span>
    </div>
    <div class="weight-summary__item">
        <p class="weight-summary__label">目標まで</p>
        <p class="weight-summary__value">{{ number_format($differenceWeight, 1) }}</p>
        <span class="weight-summary__unit">kg</span>
    </div>
    <div class="weight-summary__item">
        <p class="weight-summary__label">最新体重</p>
        <p class="weight-summary__value">{{ $latestWeight }}</p>
        <span class="weight-summary__unit">kg</span>
    </div>
</div>


@endsection
