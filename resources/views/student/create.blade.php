<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Student') }}
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
                                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">
                                    Students</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post">
                                    @csrf
                                    <!--  name  -->
                                    <div class="mb-6">
                                        <label for="name"> Name<span class="required"
                                                style="color: red;">*</span></label>
                                        <input type="text"
                                            class="form-control form-control-sm  @error('name') is-invalid @enderror"
                                            name="name" id="name" aria-describedby="name" placeholder="Name">
                                    </div>
                                    {{-- email --}}
                                    <div class="mb-6">
                                        <label for="email"> Email<span class="required"
                                                style="color: red;">*</span></label>
                                        <input type="email"
                                            class="form-control form-control-sm  @error('email') is-invalid @enderror"
                                            name="email" id="email" aria-describedby="email" placeholder="Email">
                                    </div>
                                    {{-- phone --}}
                                    <div class="mb-6">
                                        <label for="phone"> Phone<span class="required"
                                                style="color: red;">*</span></label>
                                        <input type="number"
                                            class="form-control form-control-sm  @error('phone') is-invalid @enderror"
                                            name="phone" id="phone" aria-describedby="phone" placeholder=" phone">
                                    </div>
                                    {{-- studentId --}}
                                    <div class="mb-6">
                                        <label for="studentId"> Student Id<span class="required"
                                                style="color: red;">*</span></label>
                                        <input type="text"
                                            class="form-control form-control-sm  @error('studentId') is-invalid @enderror"
                                            name="studentId" id="studentId" aria-describedby="studentId"
                                            placeholder=" Student Id">
                                    </div>
                                    {{-- branch  --}}
                                    <div class="mb-6">
                                        <label for="branchId"> Branch<span class="required"
                                                style="color: red;">*</span></label>

                                        <div class="input-group mb-3">
                                            {{-- <label class="input-group-text" for="inputGroupSelect01">Options</label> --}}
                                            <select class="form-select" name="branchId" id="inputGroupSelect01">
                                                <option selected>Choose...</option>
                                                @foreach ($br as $publication)
                                                    <option value="{{ $publication->id }}">
                                                        {{ $publication->branchName }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{-- password --}}
                                    <div class="mb-6">
                                        <label for="password"> Password<span class="required"
                                                style="color: red;">*</span></label>
                                        <input type="password"
                                            class="form-control form-control-sm  @error('password') is-invalid @enderror"
                                            name="password" id="password" aria-describedby="password"
                                            placeholder=" Password">
                                    </div>
                                    {{-- password confermation --}}
                                    <div class="mb-6">
                                        <label for="password_confirmation">Conferm Password<span class="required"
                                                style="color: red;">*</span></label>
                                        <input type="password"
                                            class="form-control form-control-sm  @error('password_confirmation') is-invalid @enderror"
                                            name="password_confirmation" id="password" aria-describedby="password"
                                            placeholder="Confirm Password">
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
                    Student</button>
                <h5 class="mt-2 mx-2 fs-3"><b>Students</b> </h5>
                <hr>

            </div>
            <div class="card-body overflow-auto">
                <table class="table table-success overflow-auto">
                    <thead class="table-dark overflow-auto">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Student ID</th>

                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($student as $key => $pub)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $pub->name }}</td>
                                <td> {{ $pub->studentId }} </td>
                                <td>{{ $pub->email }}</td>
                                <td>
                                    <a style="color: black" href=" {{ url('/create-student/edit', $pub->id) }} ">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <a style="color: red" href=" {{ url('/create-student/delete', $pub->id) }} ">
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
