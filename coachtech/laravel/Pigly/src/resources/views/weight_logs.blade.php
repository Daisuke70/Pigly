@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/common.css')}}">
<link rel="stylesheet" href="{{ asset('css/weight_logs.css')}}">
@endsection

@section('content')
    <section class="weight-summary">
        <div class="target-weight">
            <h2 class="target-weight__title">目標体重</h2>
            <p class="target-weight__value">{{ $targetWeight }}<span class="kg">kg</span></p>
        </div>
        <div class="difference-weight">
            <h2 class="difference-weight__title">目標まで</h2>
            <p class="difference-weight__value">{{ number_format($differenceWeight, 1) }}<span class="kg">kg</span></p>
            </div>
        <div class="latest-weight">
            <h2 class="latest-weight__title">最新体重</h2>
            <p class="latest-weight__value">{{ $latestWeight }}<span class="kg">kg</span></p>
        </div>
    </section>


@endsection
