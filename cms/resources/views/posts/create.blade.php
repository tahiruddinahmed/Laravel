@extends('layouts.blog')

@section('title', 'Create a post');

@section('content')
    <main class="container mx-auto mt-6 flex justify-center">
    <!-- Blog Article Section -->
    <section class="w-3/5 bg-white p-6 shadow-md rounded-lg">
        <h1 class="text-2xl font-bold mb-4">Create a Post</h1>
        
        <form action="{{ route('post.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <x-form-label for='title' class="text-back">Title</x-form-label>
                <x-form-input type='text' name='title' :value="old('title')" placeholder='Enter post title'/>

                <x-form-error name='title'/>
            </div>
            <div class="mb-4">
                <x-form-label for='content' class="text-back">Content</x-form-label>
                <textarea name="content" id="content" rows="10" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here...">
                    {{ old('content') }}
                </textarea>
                
                <x-form-error name='content'/>
            </div>
            
            <div class="mb-4">
                <x-form-label for='category' class="text-black">Category</x-form-label>
                
                <select id="category" name="categories_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" {{ old('categories_id') ? '' : 'selected' }} >Choose a category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('categories_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach

                    <x-form-error name='categories_id'/>
                </select>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                    Post
                </button>
            </div>
        </form>
    </section>
</main>
@endsection