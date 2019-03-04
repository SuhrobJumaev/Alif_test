@extends('admin.layouts.app')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')

            @slot('title') Список студентов @endslot
            @slot('parent') Главная  @endslot
            @slot('active') Студенты @endslot
        @endcomponent

        <a href="{{route('admin.user_managment.student.create')}}" class="btn btn-primary pull-right m-2"><i class="fa
        fa-plus-square-o pull-left p-1"></i>Добавить студента</a>
        <table class="table table-striped">
            <thead>
            <th>Фамилия</th>
            <th>Имя </th>
            <th>Отчество</th>
            <th>День рождения</th>
            <th>Телефон</th>
            <th>Адресс</th>
            <th>Email-адресс</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody>
            @forelse($students as $student)
                <tr>

                    <td>{{$student->surname}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->father_name}}</td>
                    <td>{{$student->date_of_birth}}</td>
                    <td>{{$student->phone}}</td>
                    <td>{{$student->address}}</td>
                    <td>{{$student->email}}</td>


                    <td class="text-right">
                        <form onsubmit="if(confirm('Удалить?')){ return true }else{ return false }"
                              action="{{route('admin.user_managment.student.destroy',$student)}}" method="post">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}

                            <a class="btn btn-default" href="{{route('admin.user_managment.student.edit',$student)}}">
                                <i class="fa fa-edit"></i></a>
                            <a class="btn btn-default" href="{{route('admin.user_managment.student.show',$student)}}">
                                <i class="fa fa-eye"></i></a>
                            <button type="submit" class="btn" ><i class="fa fa-trash-o"></i></button>
                        </form>


                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="12" class="text-center"><h2>Данные отсутсвуют</h2></td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination pull-right">
                        {{$students->links()}}
                    </ul>
                </td>
            </tr>
            </tfoot>

        </table>

    </div>

@endsection