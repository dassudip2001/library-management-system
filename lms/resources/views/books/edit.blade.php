<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Books Edit Page') }}
        </h2>
    </x-slot>

    <div class="container mt-4">
        <div class="card">
            <div class="card-title">
                <h4 class="mt-2 mx-2 fs-3">Edit Books</h4>
                <hr>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Auther name  -->
                    <div class="mb-6">
                        <label for="name"> Name<span class="required" style="color: red;">*</span></label>
                        <input type="text" class="form-control form-control-sm  @error('name') is-invalid @enderror"
                            name="name" id="name" aria-describedby="name" placeholder=" Books Name">
                    </div>
                    {{-- Auther name --}}
                    <div class="mb-6">
                        <label for="publicationId"> Auther<span class="required" style="color: red;">*</span></label>

                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Options</label>
                            <select class="form-select" name="publicationId" id="inputGroupSelect01">
                                <option selected>Choose...</option>
                                {{-- @foreach ($pub as $publication)
                                    <option value="{{ $publication->id }}">
                                        {{ $publication->publicationsName }}
                                    </option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>
                    {{-- img --}}
                    <div class="mb-6">
                        <label for="image">Image<span class="required" style="color: red;">*</span></label>
                        <div class="form-group">
                            <input type="file" name="image" class="form-control" placeholder="image">
                        </div>
                    </div>
                    <!-- Details -->
                    <div class="mb-6">
                        <label for="description">Describption</label>
                        <textarea type="text" class="form-control form-control-sm  @error('description') is-invalid @enderror"
                            name="description" id="description" row="3" aria-describedby="description" placeholder="Enter Describption">  </textarea>
                    </div>
            </div>
            <hr>
            <div class="modal-footer">
                <button type="submit" style="border: 1px soild;" class="btn btn-denger">Save</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
