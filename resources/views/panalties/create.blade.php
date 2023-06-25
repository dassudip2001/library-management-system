<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create a Panalties') }}
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
                                    <b>Panalties</b>
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post">
                                    @csrf

                                    {{-- Student ID --}}
                                    <div class="mb-6">
                                        <label for="studentId"> Student Id<span class="required"
                                                style="color: red;">*</span></label>

                                        <div class="input-group mb-3">
                                            {{-- <label class="input-group-text" for="inputGroupSelect01">Options</label> --}}
                                            <select class="form-select" name="studentId" id="inputGroupSelect01">
                                                <option selected>Choose...</option>
                                                @foreach ($st as $publication)
                                                    <option value="{{ $publication->id }}">
                                                        Name:{{ $publication->name }} || StudentId:
                                                        {{ $publication->studentId }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    {{-- panelty Amount --}}
                                    <div class="mb-6">
                                        <label for="price">Panelty Amount<span class="required"
                                                style="color: red;">*</span></label>
                                        <input type="number"
                                            class="form-control form-control-sm  @error('price') is-invalid @enderror"
                                            name="price" id="price" aria-describedby="price"
                                            placeholder="Amount ">
                                    </div>
                                    {{-- Panelty Resign  --}}
                                    <div class="mb-6">
                                        <label for="penaltyResign">Panelty Resign<span class="required"
                                                style="color: red;">*</span></label>
                                        <textarea type="text" class="form-control form-control-sm  @error('penaltyResign') is-invalid @enderror"
                                            name="penaltyResign" id="penaltyResign" row="3" aria-describedby="penaltyResign"
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
                @can('manage_users')
                    
                <button class="btn btn-primary float-end mt-2 mx-2" data-bs-target="#exampleModalToggle"
                    data-bs-toggle="modal">Add New
                    Panalties</button>
                <h5 class="mt-2 mx-2 fs-3"> <b>Panalties</b> </h5>
                <hr>
                @endcan

            </div>
            <div class="card-body">
                <table class="table table-success">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Panelty Resign</th>
                            <th scope="col">Student ID</th>

                            <th scope="col">Amount</th>
                            @can('manage_users')
                            <th scope="col">Action</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pn as $key => $pub)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $pub->penaltyResign }}</td>
                                <td>{{ $pub->studentId }} </td>
                                <td> {{ $pub->price }} </td>
                                @can('manage_users')
                                <td>
                                    <a style="color: black" href=" {{ url('/penalties/edit', $pub->id) }} ">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <a style="color: red" href=" {{ url('/penalties/delete', $pub->id) }} ">
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
    {{-- end  --}}
</x-app-layout>
