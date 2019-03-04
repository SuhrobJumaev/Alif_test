@extends('admin.layouts.app')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')

            @slot('title') Список преподователей @endslot
            @slot('parent') Главная  @endslot
            @slot('active') Преподователи @endslot
        @endcomponent

        <a href="{{route('admin.user_managment.user.create')}}" class="btn btn-primary pull-right m-2"><i class="fa
        fa-plus-square-o pull-left p-1"></i>Добавить преподователя</a>
        <table class="table table-striped">
            <thead class="text-center">
            <th>Имя </th>
            <th>Фамилия</th>
            <th>Email-адресс</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody class="text-center">
            @forelse($users as $user)
                <tr>
                    <td class="text-center">{{$user->name}}</td>
                    <td>{{$user->surname}}</td>
                    <td>{{$user->email}}</td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Удалить?')){ return true }else{ return false }"
                              action="{{route('admin.user_managment.user.destroy',$user)}}" method="post">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}

                            <a class="btn " href="{{route('admin.user_managment.user.edit',$user)}}">
                                <i class="fa fa-edit"></i></a>
                            <a class="btn " href="{{route('admin.user_managment.user.show',$user)}}">
                                <i class="fa fa-eye"></i></a>
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
                        {{$users->links()}}
                    </ul>
                </td>
            </tr>
            </tfoot>

        </table>

    </div>

@endsection