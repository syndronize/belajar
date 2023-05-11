@extends('backend.template')
@section('title','User')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">Data Users</h5>

        <div class="table-responsive text-nowrap">
            <table class="table">
            <thead>
                <tr>
                <th>Username</th>
                <th>Fullname</th>
                <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <tr>
                    <td>Albert Cook</td>
                    <td>albertcook</td>
                    <td>
                        <div>
                            <button type="button" class="btn btn-icon btn-primary">
                              <span class="tf-icons bx bx-book"></span>
                            </button>
                            <button type="button" class="btn btn-icon btn-warning">
                              <span class="tf-icons bx bx-edit-alt"></span>
                            </button>
                            <button type="button" class="btn btn-icon btn-danger">
                              <span class="tf-icons bx bx-trash"></span>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
</div>
@endsection