@extends('layouts.app')

@section('content')
<div class="container">    
    <div class="card p-3">
        <transition>
            <router-view></router-view>
        </transition>
    </div>        
</div>
@endsection
