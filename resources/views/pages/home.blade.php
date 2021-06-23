@extends('layouts.app')

@section('content')
<div class="container">
    <div class="table-responsive row">
        <h3>Dynamic Text Placement</h3>
        <table class="table table-striped table-bordered" id="table">
            <tbody>
                @for ($rowIndex = 1; $rowIndex <= $rows; $rowIndex++)
                    <tr id="{{ $rowIndex }}">
                        @for ($columnIndex = 1; $columnIndex <= $rows; $columnIndex++)
                            <td class="text-center">
                                @foreach ($settings as $setting)
                                    @if (
                                        $setting['positioning']->row == $rowIndex
                                        && $setting['positioning']->column == $columnIndex
                                    )
                                        <span
                                            style="
                                                font-weight: {{ $setting['font_style']->weight }};
                                                color: {{ $setting['font_style']->colour }};
                                                font-size: {{ $setting['font_style']->size }};
                                            "
                                        >
                                            {{ $setting['element_name'] }}
                                        </span>
                                    @endif
                                @endforeach
                            </td>
                        @endfor
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
    <div class="row">
        <span>
            Click <a href="{{ route('manage') }}">here</a> to change the placement and styling of the keywords
        </span>
    </div>
</div>

@endsection