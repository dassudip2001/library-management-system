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
                                <form action="" method="post">
                                    @csrf
                                    <!-- Auther name  -->
                                    <div class="mb-6">
                                        <label for="publicationsName"> Name<span class="required"
                                                style="color: red;">*</span></label>
                                        <input type="text"
                                            class="form-control form-control-sm  @error('publicationsName') is-invalid @enderror"
                                            name="publicationsName" id="publicationsName"
                                            aria-describedby="publicationsName" placeholder=" Books Name">
                                    </div>
                                    {{-- Auther name --}}
                                    <div class="mb-6">
                                        <label for="publicationsName"> Auther<span class="required"
                                                style="color: red;">*</span></label>

                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                            <select class="form-select" id="inputGroupSelect01">
                                                <option selected>Choose...</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{-- img --}}
                                    <div class="mb-6">
                                        <label for="publicationDeatils">Image<span class="required"
                                                style="color: red;">*</span></label>
                                        <input type="file" class="form-control form-control-sm" id="inputGroupFile04"
                                            aria-describedby="inputGroupFileAddon04" aria-label="Upload">

                                    </div>
                                    <!-- Details -->
                                    <div class="mb-6">
                                        <label for="publicationDeatils">Describption</label>
                                        <textarea type="text" class="form-control form-control-sm  @error('publicationDeatils') is-invalid @enderror"
                                            name="publicationDeatils" id="publicationDeatils" row="3" aria-describedby="publicationDeatils"
                                            placeholder="Enter Describption"></textarea>

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

                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($publication as $key => $pub)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $pub->publicationsName }}</td>
                                <td>{{ $pub->publicationDeatils }}</td>
                                <td>
                                    <a style="color: black" href=" {{ url('/publications/edit', $pub->id) }} ">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <a style="color: red" href=" {{ url('/publications/delete', $pub->id) }} ">
                                        <button type="submit"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-layout>
