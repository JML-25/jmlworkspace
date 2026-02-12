<x-layout>
 {{--  <ul>
    @forelse($jobs as $job)
    <li>{{ $job }}</li>
    @empty
    <li>No jobs found</li>
    @endforelse
  </ul> --}}
 
  <h1 class="text-5xl font-bold underline">{{$message ?? 'welcome'}}</h1>
 </x-layout>