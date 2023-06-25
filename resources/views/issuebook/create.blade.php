<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Issue Books For Studenet') }}
        </h2>
    </x-slot>

    {{-- start --}}

    <div class="container mt-4">
        <div class="card">
            <div class="card-title">
                @if (session('success'))
                    <div class="alert alert-primary" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="modal fade" id="exampleModalToggle" aria-hidden="true"
                    aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">
                                    <b>Issue Book</b>
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post">
                                    @csrf
                                    {{-- studentId --}}
                                    <div class="mb-6">
                                        <label for="studentId"> Student Id<span class="required"
                                                style="color: red;">*</span></label>
                                        @if (Auth::check())
                                            Welcome, {{ Auth::user()->name }}
                                        @endif
                                    </div>
                                    {{-- branch  --}}
                                    <div class="mb-6">
                                        <label for="booksId"> Books<span class="required"
                                                style="color: red;">*</span></label>
                                        <div class="input-group mb-3">
                                            {{-- <label class="input-group-text" for="inputGroupSelect01">Options</label> --}}
                                            <select class="form-select" name="booksId" id="inputGroupSelect01">
                                                <option selected>Choose...</option>
                                                @foreach ($br as $publication)
                                                    <option value="{{ $publication->id }}">
                                                        {{ $publication->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{-- status --}}
                                    <div class="mb-6">
                                        <label for="status">Return Status<span class="required"
                                                style="color: red;">*</span></label>
                                        <select class="form-select" name="status" id="inputGroupSelect01">
                                            <option selected>Choose...</option>
                                            <option>Pending</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-denger">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary float-end mt-2 mx-2" data-bs-target="#exampleModalToggle"
                    data-bs-toggle="modal">Add New
                    Issue Book</button>
                <h5 class="mt-2 mx-2 fs-3"> <b>Issue Book</b> </h5>
                <hr>

            </div>
            <div class="card-body">
                <table class="table table-success">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Student id | Name</th>
                            <th scope="col">Books</th>
                            <th scope="col">Return Books Status</th>
                            @can('manage_users')
                            <th scope="col">Action</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bi as $key => $pub)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $pub->studentId }}</td>
                                <td> {{ $pub->name }} </td>
                                @if ($pub->status != 'Return')
                                    <td style="color: green">{{ $pub->status }}</td>
                                @else
                                    <td style="color: red">{{ $pub->status }}</td>
                                @endif
                                @can('manage_users')
                                <td>
                                    <a style="color: black" href=" {{ url('/book-issue/edit', $pub->id) }} ">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <a style="color: red" href=" {{ url('/book-issue/delete', $pub->id) }} ">
                                        <button type="submit"><i class="fa-solid fa-trash"></i></button>
                                </td>
                                @endcan
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    {{-- end --}}
</x-app-layout>
