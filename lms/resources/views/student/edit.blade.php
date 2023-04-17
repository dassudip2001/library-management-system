<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Student Page') }}
        </h2>
    </x-slot>

    {{-- start --}}
    <div class="container mt-4 overflow-auto">
        <div class="card">
            <div class="card-title">
                <h4 class="mt-2 mx-2 fs-3">Edit Student</h4>
                <hr>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!--  name  -->
                    <div class="mb-6">
                        <label for="name"> Name<span class="required" style="color: red;">*</span></label>
                        <input type="text" class="form-control form-control-sm  @error('name') is-invalid @enderror"
                            name="name" id="name" aria-describedby="name" placeholder="  Name"
                            value="{{ $createUser->user->name }}">
                    </div>

                    <!--  email  -->
                    <div class="mb-6">
                        <label for="email"> Email<span class="required" style="color: red;">*</span></label>
                        <input type="email" class="form-control form-control-sm  @error('email') is-invalid @enderror"
                            name="email" id="email" aria-describedby="email" placeholder=" Email"
                            value="{{ $createUser->user->email }}">
                    </div>

                    {{-- IdNo --}}

                    <div class="mb-6">
                        <label for="studentId"> ID<span class="required" style="color: red;">*</span></label>
                        <input type="text"
                            class="form-control form-control-sm  @error('studentId') is-invalid @enderror"
                            name="studentId" id="studentId" aria-describedby="idNumber" placeholder="Enter your ID No"
                            value="{{ $createUser->studentId }}">
                    </div>

                    {{-- Phone No --}}

                    <div class="mb-6">
                        <label for="phone">Phone Number<span class="required" style="color: red;">*</span></label>
                        <input type="number" class="form-control form-control-sm  @error('phone') is-invalid @enderror"
                            name="phone" id="phone" aria-describedby="Phone Number"
                            placeholder="Enter Phone number" value="{{ $createUser->phone }}">
                    </div>
                    {{-- stream --}}
                    <div class="mb-6">
                        <label for="stream">Stream<span class="required" style="color: red;">*</span></label>

                        <div class="input-group mb-3">
                            {{-- <label class="input-group-text" for="inputGroupSelect01">Options</label> --}}
                            <select class="form-select" name="branchId" id="inputGroupSelect01">
                                <option selected>Choose...</option>
                                @foreach ($showDept as $publication)
                                    <option value="{{ $publication->id }}"
                                        {{ $publication->id == $createUser->branch->id ? 'selected' : '' }}>


                                        {{ $publication->branchName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    {{--  Password --}}

                    <div class="mb-6">
                        <label for="phone"> Password<span class="required" style="color: red;">*</span></label>
                        <input type="password"
                            class="form-control form-control-sm  @error('password') is-invalid @enderror"
                            name="password" id="password" aria-describedby="passwerd Number"
                            placeholder="Enter Password " value="{{ $createUser->user->password }}">
                    </div>
                    {{-- password confirm --}}
                    <div class="mb-6">
                        <label for="password_confirmation"> password confirm<span class="required"
                                style="color: red;">*</span></label>
                        <input type="password"
                            class="form-control form-control-sm  @error('password_confirmation') is-invalid @enderror"
                            name="password_confirmation" id="password_confirmation" aria-describedby="passwerd Number"
                            placeholder="Enter confirm Password "
                            value="{{ $createUser->user->password_confirmation }}">
                    </div>

            </div>
            <hr>
            <div class="modal-footer">
                <button type="submit" class="btn btn-denger">Save</button>
                </form>
            </div>
        </div>
    </div>
    {{-- end --}}
</x-app-layout>
