@extends('layouts.app')

@section('content')
<div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
  <div class="mb-10 border-t border-b divide-y">
    @forelse ($posts as $post)
      <div class="grid py-8 sm:grid-cols-4">
          <div class="mb-4 sm:mb-0">
            <div class="space-y-1 text-xs  font-semibold tracking-wide uppercase">
              <a href="/" class="transition-colors duration-200 text-deep-purple-accent-400 hover:text-deep-purple-800" aria-label="Category">{{$post->category->title}}</a>
              <p class="text-gray-600">{{ $post->created_at }}</p>
            </div>
          </div>
          <div class="sm:col-span-3 lg:col-span-2">
            <div class="mb-3">
              <a href="{{ route('posts.show',$post->id) }}" aria-label="Article" class="inline-block text-black transition-colors duration-200 hover:text-deep-purple-accent-700">
                <p class="text-3xl font-extrabold leading-none sm:text-4xl xl:text-4xl hover:text-indigo-600">
                  {{$post->title}}
                </p>
              </a>
            </div>
            <p class="text-gray-700">
              {{ strip_tags($post->content) }}
            </p>
          </div>
        </div>
    @empty
    <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
    no posts found ...
    </div>
    @endforelse


  </div>
  <div class="text-center">
    <span>
    <span>{{$posts->links('vendor.pagination.tailwind')}}</span>
    </span>
  </div>
</div>
@endsection
