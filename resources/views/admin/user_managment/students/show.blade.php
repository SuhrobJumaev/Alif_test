@extends('admin.layouts.app')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')

            @slot('title'){{$student->surname}} {{$student->name}}@endslot
            @slot('parent')Главная@endslot
            @slot('active') {{$student->surname}} {{$student->name}} @endslot
        @endcomponent
        <table class="table">

            <h1 class="text-center">Список курсов</h1>
            <tbody>
            @forelse($student->courses as $course)
                <tr>
                    <td>{{$course->title}}</td>
                    <td class="text-right">
                        <form action="{{route('admin.course.show',$course)}}" method="post">
                            <a class="btn" href="{{route('admin.course.show',$course)}}"><i class="fa fa-eye"></i></a>
                        </form>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center"><h2>Данные отсутсвуют</h2></td>
                </tr>
            @endforelse
            </tbody>

        </table>

    </div>

@endsection