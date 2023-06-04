<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Branch Page') }}
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
                                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Branches</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post">
                                    @csrf
                                    <!-- Auther name  -->
                                    <div class="mb-6">
                                        <label for="branchName"> Name<span class="required"
                                                style="color: red;">*</span></label>
                                        <input type="text"
                                            class="form-control form-control-sm  @error('branchName') is-invalid @enderror"
                                            name="branchName" id="branchName" aria-describedby="branchName"
                                            placeholder="  Name">
                                    </div>
                                    {{-- code --}}
                                    <div class="mb-6">
                                        <label for="branchCode"> Code<span class="required"
                                                style="color: red;">*</span></label>
                                        <input type="text"
                                            class="form-control form-control-sm  @error('branchCode') is-invalid @enderror"
                                            name="branchCode" id="branchCode" aria-describedby="branchCode"
                                            placeholder=" Code">
                                    </div>
                                    <!-- Details -->
                                    <div class="mb-6">
                                        <label for="branchDescription">Describption</label>
                                        <textarea type="text" class="form-control form-control-sm  @error('branchDescription') is-invalid @enderror"
                                            name="branchDescription" id="branchDescription" row="3" aria-describedby="branchDescription"
                                            placeholder="Enter Describption"></textarea>

                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button
                                    style="height:55px; background-color: #4CAF50;border: none; border-radius:20px;color: white;padding: 10px 12px;text-align: center;text-decoration: none;display: inline-block;font-size: 20px;with:50px;margin: 4px 2px;cursor: pointer;"
                                    type="submit" class="btn btn-denger">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary float-end mt-2 mx-2" data-bs-target="#exampleModalToggle"
                    data-bs-toggle="modal">Add New Branch</button>
                <h5 class="mt-2 mx-2 fs-3"><b>Branches</b> </h5>
                <hr>

            </div>
            <div class="card-body">
                <table class="table table-success">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"> Name</th>
                            <th scope="col"> Code</th>
                            <th scope="col">Describption</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($b as $key => $pub)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $pub->branchName }}</td>
                                <td>{{ $pub->branchCode }}</td>
                                <td>{{ $pub->branchDescription }}</td>
                                <td>
                                    <a style="color: black" href=" {{ url('/create-branch/edit', $pub->id) }} ">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <a style="color: red" href=" {{ url('/create-branch/delete', $pub->id) }} ">
                                        <button type="submit"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-layout>
