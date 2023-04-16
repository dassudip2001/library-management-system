<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Books Page') }}
        </h2>
    </x-slot>

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
                                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Books</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('books.create') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <!-- Auther name  -->
                                    <div class="mb-6">
                                        <label for="name"> Name<span class="required"
                                                style="color: red;">*</span></label>
                                        <input type="text"
                                            class="form-control form-control-sm  @error('name') is-invalid @enderror"
                                            name="name" id="name" aria-describedby="name"
                                            placeholder=" Books Name">
                                    </div>
                                    {{--  number of copy --}}
                                    <div class="mb-6">
                                        <label for="copyNumber">Copy <span class="required"
                                                style="color: red;">*</span></label>
                                        <input type="text"
                                            class="form-control form-control-sm  @error('copyNumber') is-invalid @enderror"
                                            name="copyNumber" id="copyNumber" aria-describedby="copyNumber"
                                            placeholder="Numbrt of Copy ">
                                    </div>
                                    {{-- Auther name --}}
                                    <div class="mb-6">
                                        <label for="publicationId"> Auther<span class="required"
                                                style="color: red;">*</span></label>
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                            <select class="form-select" name="publicationId" id="inputGroupSelect01">
                                                <option selected>Choose...</option>
                                                @foreach ($pub as $publication)
                                                    <option value="{{ $publication->id }}">
                                                        {{ $publication->publicationsName }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{-- img --}}
                                    <div class="mb-6">
                                        <label for="image">Image<span class="required"
                                                style="color: red;">*</span></label>
                                        <div class="form-group">
                                            <input type="file" name="image" class="form-control"
                                                placeholder="image">
                                        </div>
                                    </div>
                                    <!-- Details -->
                                    <div class="mb-6">
                                        <label for="description">Describption</label>
                                        <textarea type="text" class="form-control form-control-sm  @error('description') is-invalid @enderror"
                                            name="description" id="description" row="3" aria-describedby="description" placeholder="Enter Describption"></textarea>
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
                    data-bs-toggle="modal">Add New Books</button>
                <h5 class="mt-2 mx-2">Books</h5>
                <hr>
            </div>
            <div class="card-body">
                <table class="table table-success">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Books Name</th>
                            <th scope="col">Describption</th>
                            <th scope="col">Books Auther</th>
                            <th scope="col">Books Image</th>
                            <th scope="col">Number Of Copy</th>
                            <th scope="col">Created Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($book as $key => $pub)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $pub->name }}</td>
                                <td>{{ $pub->description }}</td>
                                <td>{{ $pub->publicationsName }}</td>
                                <td><img src="/images/{{ $pub->image }}" width="100px" alt=""
                                        srcset=""></td>
                                <td>{{ $pub->copyNumber }}</td>
                                <td>{{ $pub->created_at }}</td>
                                <td>
                                    <a style="color: black" href=" {{ url('/books/edit', $pub->id) }} ">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <a style="color: red" href=" {{ url('/books/delete', $pub->id) }} ">
                                        <button type="submit"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $book->onEachSide(3)->links() }}
            </div>
        </div>

    </div>
</x-app-layout>
