@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Posts Table</h1>
        <p class="mb-4">Below is a list of all posts.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Posts List</h6>
                <button class="btn btn-primary mt-2" data-toggle="modal" data-target="#createPostModal">Add posts</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Owner</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->date }}</td>
                                    <td>{{ $post->username }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editPostModal" data-id="{{ $post->id }}">Edit</button>
                                        <form action="{{ route('admin.posts.destroy', $post->idpost) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure delete?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Modals -->
    @include('admin.post.create')
    @include('admin.post.edit')

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<!-- Initialize DataTables and Modals -->
<script>
$(document).ready(function() {
    $('#dataTable').DataTable();

    // Handle Edit button click
    $('#editAccountModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var username = button.data('id');
        console.log(username); // Pastikan username benar

        $.ajax({
            url: '/admin/account/' + username + '/edit', // Sesuaikan dengan rute di Controller
            method: 'GET',
            success: function(data) {
                var modal = $('#editAccountModal');
                modal.find('#editUsername').val(data.username);
                modal.find('#editName').val(data.name);
                modal.find('#editRole').val(data.role);
                modal.find('#editAccountForm').attr('action', '/admin/account/' + data.username);

                modal.find('#editPassword').val('');
            },
            error: function(xhr, status, error) {
                console.error('Error: ' + error);
                console.log(xhr.responseText);
            }
        });
    });
});

</script>
@endsection
