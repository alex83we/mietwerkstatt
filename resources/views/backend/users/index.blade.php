@extends('backend.layouts.main')

@section('titel', 'User Übersicht ')

@section('content')
    <section class="content">

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Users</div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>E-Mail</th>
                                        <th>Rolle</th>
                                        <th>Status</th>
                                        <th>Aktion</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr class="align-middle">
                                            <td class="align-middle">{{ $user->id }}</td>
                                            <td class="align-middle"><a href="{{ route('profil.index', $user->id) }}"> {{ $user->vorname.' '.$user->name }}</a></td>
                                            <td class="align-middle">{{ $user->username }}</td>
                                            <td class="align-middle">{{ $user->email }}</td>
                                            <td class="align-middle">{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                                            <td class="align-middle">
                                                @if(Cache::has('user-is-online-' . $user->id))
                                                    <span class="text-success">Online</span>
                                                @else
                                                    <span class="text-secondary">Offline</span>
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                @can('edit-users')
                                                    <a href="{{ route('backend.users.edit', $user->id) }}" class="btn btn-orange"><i class="fas fa-edit"></i></a>
                                                @endcan
                                                @can('delete-users')
                                                    <form action="{{ route('backend.users.destroy', $user->id) }}" method="post" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-warning"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
