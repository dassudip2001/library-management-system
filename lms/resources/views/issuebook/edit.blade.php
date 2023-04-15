<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- start --}}
    <div class="container mt-4">
        <div class="card">
            <div class="card-title">
                <h4 class="mt-2 mx-2">Edit Issue Books Page</h4>
                <hr>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- studentId --}}
                    <div class="mb-6">
                        <label for="studentId"> Student Id<span class="required" style="color: red;">*</span></label>
                        <select class="form-select" name="studentId" id="inputGroupSelect01">
                            <option selected>Choose...</option>
                            {{-- @foreach ($st as $publication)
                                                <option value="{{ $publication->id }}">
                                                    Name: {{ $publication->name }} || Student ID
                                                    {{ $publication->studentId }}
                                                </option>
                                            @endforeach --}}
                        </select>
                    </div>
                    {{-- branch  --}}
                    <div class="mb-6">
                        <label for="booksId"> Books<span class="required" style="color: red;">*</span></label>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Options</label>
                            <select class="form-select" name="booksId" id="inputGroupSelect01">
                                <option selected>Choose...</option>
                                {{-- @foreach ($br as $publication)
                                                    <option value="{{ $publication->id }}">
                                                        {{ $publication->name }}
                                                    </option>
                                                @endforeach --}}
                            </select>
                        </div>
                    </div>
                    {{-- status --}}
                    <div class="mb-6">
                        <label for="status">Return Status<span class="required" style="color: red;">*</span></label>
                        <select class="form-select" name="status" id="inputGroupSelect01">
                            <option selected>Choose...</option>
                            <option>Return</option>
                            <option>Pending</option>
                        </select>
                    </div>


            </div>
            <hr>
            <div class="modal-footer">
                <button type="submit" class="btn btn-denger">Update</button>
                </form>
            </div>
        </div>
    </div>
    {{-- end --}}
</x-app-layout>
