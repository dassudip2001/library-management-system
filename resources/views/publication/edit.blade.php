<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        <div class="card">
                            <div class="card-title">
                                <h4 class="mt-2 mx-2 fs-3">Edit Publication Details</h4>
                                <hr>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    @method('PUT')
                                    @csrf
                                    <!-- Auther name  -->
                                    <div class="mb-6">
                                        <label for="publicationsName">Auther Name<span class="required"
                                                style="color: red;">*</span></label>
                                        <input type="text"
                                            class="form-control form-control-sm  @error('publicationsName') is-invalid @enderror"
                                            name="publicationsName" id="publicationsName"
                                            value="{{ $project->publicationsName }}" aria-describedby="publicationsName"
                                            placeholder=" Auther Name">
                                    </div>
                                    <!-- Details -->
                                    <div class="mb-6">
                                        <label for="publicationDeatils">Describption<span class="required"
                                                style="color: red;">*</span></label>
                                        <textarea type="text" class="form-control form-control-sm  @error('publicationDeatils') is-invalid @enderror"
                                            name="publicationDeatils" id="publicationDeatils" row="3" value="{{ $project->publicationDeatils }}"
                                            aria-describedby="publicationDeatils" placeholder="Enter Describption">{{ $project->publicationDeatils }}</textarea>
                                        {{-- <input type="text"
                                            class="form-control form-control-sm  @error('publicationDeatils') is-invalid @enderror"
                                            name="publicationDeatils" id="publicationDeatils" row="3"
                                            aria-describedby="publicationDeatils" placeholder="Enter Describption"> --}}
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
    </div>
</x-app-layout>
