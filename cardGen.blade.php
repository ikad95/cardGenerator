@extends('layouts.layout')
@section('content')
    <style>
        .circle {
            border-radius: 50%;
        }
    </style>
    @php
        function createGrid($item) {
            if (empty($item)) {
                return null;
            }
            $tag = !empty($item['type']) ? $item['type'] : 'div';
            $classNames = !empty($item['classNames']) ? 'class="' . $item['classNames'] . '"' : null ;
            $content = !empty($item['content']) ? $item['content'] : null;
            $style = !empty($item['style']) ? 'style="' . $item['style'] . '"' : null;
            $children = !empty($item['children']) ? $item['children'] : [];
            $childrenHTML = "";
            foreach ($children as $child) {
                $childrenHTML .= createGrid($child);
            }
            return "<$tag $classNames $style>" .
                $content . $childrenHTML
            . "</$tag>";
        }
    @endphp
    @if (!empty($grid))
        @php echo createGrid($grid) @endphp
    @endif
@endsection