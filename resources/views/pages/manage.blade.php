@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <span>
            <a href="{{ route('home') }}">Return To Home Page</a>
        </span>
    </div>
    <div class="row">
            {{ Form::open(array('route' => 'saveSettings')) }}
                @foreach ($settings as $id => $setting)
                    <div class="container card col-6 mt-3">
                        <span class="lead">Settings For {{ Form::label('element_name', $setting['element_name']) }}</span>
                        <input type="hidden" name="settings[{{ $id }}][element_name]" value="{{ $setting['element_name'] }}" />
                        <div class="row card-body">
                            <div class="col">Column Position</div>                    
                            <div class="col">
                                <select name="settings[{{ $id }}][positioning][column]" class="form-select">
                                    @for ($i = 1; $i <= $columns; $i++)
                                        {{ $selected = false }}
                                        @if ($i == $setting['positioning']->column)
                                            {{ $selected = "selected" }}
                                        @endif
                                        <option value="{{ $i }}" {{ $selected }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="row card-body">
                            <div class="col">Row Position</div>                    
                            <div class="col">
                                <select name="settings[{{ $id }}][positioning][row]" class="form-select">
                                    @for ($i = 1; $i <= $rows; $i++)
                                        {{ $selected = false }}
                                        @if ($i == $setting['positioning']->row)
                                            {{ $selected = "selected" }}
                                        @endif
                                        <option value="{{ $i }}" {{ $selected }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="row card-body">
                            <div class="col">Text Colour</div>                    
                            <div class="col">
                                <select name="settings[{{ $id }}][font_style][colour]" class="form-select">
                                    @foreach ($colours as $colour)
                                        {{ $selected = false }}
                                        @if ($colour === $setting['font_style']->colour)
                                            {{ $selected = "selected" }}
                                        @endif
                                        <option value="{{ $colour }}" {{ $selected }}>{{ $colour }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row card-body">
                            <div class="col">Text Size</div>             
                            <div class="col">
                                <select name="settings[{{ $id }}][font_style][size]" class="form-select">
                                    @foreach ($sizes as $size)
                                        {{ $selected = false }}
                                        @if ($size === $setting['font_style']->size)
                                            {{ $selected = "selected" }}
                                        @endif
                                        <option value="{{ $size }}" {{ $selected }}>{{ $size }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row card-body">
                            <div class="col">Text Weight</div>               
                            <div class="col">
                                <select name="settings[{{ $id }}][font_style][weight]" class="form-select">
                                    @foreach ($weights as $weight)
                                        {{ $selected = false }}
                                        @if ($weight === $setting['font_style']->weight)
                                            {{ $selected = "selected" }}
                                        @endif
                                        <option value="{{ $weight }}" {{ $selected }}>{{ $weight }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <input type="submit" value="Save Settings" class="btn btn-primary col-sm-3 mb-2" />
                    </div>
                @endforeach
            {{ Form::close() }}
    </div>
    <div class="row">
        <span>
            <a href="{{ route('home') }}">Return To Home Page</a>
        </span>
    </div>
</div>

@endsection