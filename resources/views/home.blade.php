@extends('layouts.app')
@section('content')
@php
    $token = Session()->get('_token');
@endphp
@if(session('status'))
<div class="notification">
    <button class="delete"></button>
    <strong>{{ session('status')}}</strong>
  </div>
@endif
<div class="field is-grouped is-grouped-centered">
    <h1 class="title has-text-weight-bold">Smart Chicken Coop</h1>
</div>
<div class="field is-grouped is-grouped-centered">
    <p class="control">
        <img src="http://1.bp.blogspot.com/-qxdRJnUvUm4/Ud0I8P6FBUI/AAAAAAAAKxw/vb3qCeMhAjE/s1600/bm-image-740322.png"  >
    </p>
</div>
<div class="field is-grouped is-grouped-centered">
    <p class="control">
        <img src="https://img.icons8.com/officel/100/000000/henhouse.png">
        <label class="label has-text-centered" id="feed">- %</label>
    </p>
    <p class="control">
        <img src="https://img.icons8.com/doodle/100/000000/water--v1.png">
        <label class="label has-text-centered" id="water">- %</label>
    </p>
</div>
<div class="field is-grouped is-grouped-centered">
    <a class="button is-large" href="{{route('run.device',['idDevice'=>'1','idUser'=>Auth::user()->id])}}">
        <span class="icon">
            <img src="https://img.icons8.com/color/30/000000/lucky-eggs.png">
        </span>
        <span>
            Beri Makan
        </span>
    </a>
    <div class="buttons has-addons">
        <a class="button is-large" href="{{route('run.device',['idDevice'=>'2','idUser'=>Auth::user()->id])}}">
            <span class="icon">
                <img src="https://img.icons8.com/color/30/000000/lucky-eggs.png">
            </span>
            <span>
                Panen Telur
            </span>
        </a>
        <button class="button modal-button is-large" data-toggle="modal"  data-target="modalInsertFile">
            <span class="icon">
              <i class="fas fa-plus" aria-hidden="true"></i>
            </span>
        </button>
        <div id="modalInsertFile" class="modal">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Jumlah Hasil Panen Telur</p>
                    <button class="delete" aria-label="close"></button>
                </header>
                {!! Form::open(['route'=>['number.egg', Auth::user()->id] , 'method'=>'post']) !!}
                {!! Form::token() !!}
                <section class="modal-card-body">
                    <div class="field">
                        {!! Form::label('egg', 'Total Hasil Panen Telur', ['class'=>'label']) !!}
                        <div class="control">
                            {!! Form::text('lots_egg', '', ['class'=>'input']) !!}
                        </div>
                    </div>
                </section>
                <footer class="modal-card-foot buttons is-right">
                    <button type="button" class="button button-close-modal" aria-label="close">
                        Cancel
                    </button>
                    {!! Form::submit('Kirim', ['class'=>'button']) !!}
                </footer>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

