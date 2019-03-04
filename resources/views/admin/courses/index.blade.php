@extends('admin.layouts.app')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')

            @slot('title') Список курсов @endslot
            @slot('parent') Главная  @endslot
            @slot('active') Курсы @endslot
        @endcomponent


        <a href="{{route('admin.course.create')}}" class="btn btn-primary pull-right m-2"><i class="fa
        fa-plus-square-o pull-left p-1"></i>Добавить курс</a>
        <table class="table table-striped">
            <thead>
            <th>Названия</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody>
            @forelse($courses as $course)
                <tr>
                    <td>{{$course->title}}</td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Удалить?')){ return true }else{ return false }"
                              action="{{route('admin.course.destroy',$course)}}" method="post">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}

                            <a class="btn" href="{{route('admin.course.edit',$course)}}"><i class="fa fa-edit"></i></a>
                            <a class="btn" href="{{route('admin.course.show',$course)}}"><i class="fa fa-eye"></i></a>
                            <button type="submit" class="btn" ><i class="fa fa-trash-o"></i></button>
                        </form>


                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center"><h2>Данные отсутсвуют</h2></td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination pull-right">
                        {{$courses->links()}}
                    </ul>
                </td>
            </tr>
            </tfoot>

        </table>

    </div>

@endsection