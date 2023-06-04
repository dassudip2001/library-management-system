<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Branch ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        <div class="card">
                            <div class="card-title">
                                <h4 class="mt-2 mx-2 fs-3">Edit Branch Details</h4>
                                <hr>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    @method('PUT')
                                    @csrf
                                    <!-- Auther name  -->
                                    <div class="mb-6">
                                        <label for="branchName"> Name<span class="required"
                                                style="color: red;">*</span></label>
                                        <input type="text"
                                            class="form-control form-control-sm  @error('branchName') is-invalid @enderror"
                                            name="branchName" id="branchName" value="{{ $b->branchName }}"
                                            aria-describedby="branchName" placeholder="  Name">
                                    </div>
                                    {{-- code --}}
                                    <div class="mb-6">
                                        <label for="branchCode"> Code<span class="required"
                                                style="color: red;">*</span></label>
                                        <input type="text"
                                            class="form-control form-control-sm  @error('branchCode') is-invalid @enderror"
                                            name="branchCode" id="branchCode" value="{{ $b->branchCode }}"
                                            aria-describedby="branchCode" placeholder="Code">
                                    </div>
                                    <!-- Details -->
                                    <div class="mb-6">
                                        <label for="branchDescription">Describption<span class="required"
                                                style="color: red;">*</span></label>
                                        <textarea type="text" class="form-control form-control-sm  @error('publicationDeatils') is-invalid @enderror"
                                            name="branchDescription" id="branchDescription" row="3" aria-describedby="publicationDeatils"
                                            placeholder="Enter Describption">{{ $b->branchDescription }}</textarea>
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-denger">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
