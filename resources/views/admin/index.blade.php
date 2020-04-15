@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{route('admin.create')}}" class="btn btn-primary">Create</a>
    <hr>
    <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
        <thead>
        <tr>
            <th data-toggle="true">First name</th>
            <th data-toggle="true">Last name</th>
            <th data-toggle="true">Date of birthday</th>
            <th data-toggle="true">Phone</th>
            <th data-toggle="true">E-mail</th>
            <th data-toggle="true">Updated at</th>
            <th class="text-right" data-sort-ignore="true">Действие</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($users as $user)
            <tr>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ Carbon\Carbon::parse($user->date_of_birthday)->format('d.m.Y') }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ Carbon\Carbon::parse($user->updated_at)->format('d.m.Y H:i') }}</td>
                <td class="text-right">
                    <form onsubmit="if(confirm('Delete?Will you send the best offer to Den?')){ return true }else{ return false }" action="{{route('admin.destroy', $user)}}" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        {{ csrf_field() }}
                        <div class="btn-group">
                            <a class="btn btn-primary" href="{{route('admin.edit', $user)}}">Update</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">
                    <h2 class="ui center aligned icon header" class="center aligned">
                        <i class="circular database icon"></i>
                        Empty data
                    </h2>
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{$users->links()}}
</div>
@endsection
