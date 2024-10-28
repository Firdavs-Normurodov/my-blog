<div class=" pb-32" id="blog">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-2xl py-10 sm:py-16 lg:max-w-none lg:py-2">
      <h2 class="text-2xl font-bold text-my-light pb-8">All blog posts</h2>

      <div class="mt-6 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0">

        @foreach ($posts as $post)
        <div class="group relative mb-8">
          <div class="relative h-80 w-full overflow-hidden  bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 group-hover:opacity-75 sm:h-64">
            <!-- <img src="https://tailwindui.com/plus/img/ecommerce-images/home-page-02-edition-01.jpg" alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug." class="h-full w-full object-cover object-center"> -->
            <a href="{{  route('components.layouts.show', ['id' => $post->id])}}">

              <img src="{{ asset('storage/posts_images/' . $post->image) }}" alt="{{ $post->title }}" class="h-full w-full object-cover object-center">
            </a>


          </div>
          <p class="mt-6 text-sm  text-time-color font-bold">
            {{ $post->created_at->format('l  d M Y') }}
          </p>
          <h1 class="text-lg font-semibold py-4 text-my-light">{{ $post->title }}</h1>
          <p class=" text-base text-color-dark">
            {{$post->short_content}}
          </p>
          <div class="buttons ">
            <button class="btn bg-my-light py-1.5 px-4 mt-3 text-my_pink font-medium rounded-full">{{$post->category}}</button>
            <!-- <button class="btn bg-my-light py-1.5 px-4 mt-3 text-my_green font-medium rounded-full">Research</button> -->
            <!-- <button class="btn bg-my-light py-1.5 px-4 mt-3 text-my_blue font-medium rounded-full">Presentation</button> -->
          </div>
        </div>
        @endforeach
      </div>
      <!-- pagination -->
      <nav class="flex mt-10 justify-between items-center gap-x-1" aria-label="Pagination">
        <button type="button" class="min-h-[38px] min-w-[38px] py-2 px-2.5 inline-flex jusify-center items-center gap-x-2 text-sm rounded-lg transition-all   text-my-light hover:bg-my-light hover:text-my-color  disabled:opacity-50 disabled:pointer-events-none  aria-label=" Previous">
          <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m15 18-6-6 6-6"></path>
          </svg>
          <span aria-hidden="true" class="hidden sm:block">Previous</span>
        </button>
        <div class="flex items-center gap-x-6">
          <button type="button" class="min-h-[38px] min-w-[38px] transition-all  flex justify-center items-center text-my-light hover:bg-my-light hover:text-my-color py-2 px-3 text-sm rounded-lg  ">1</button>
          <button type="button" class="min-h-[38px] min-w-[38px]  transition-all flex justify-center items-center  text-my-light hover:bg-my-light hover:text-my-color py-2 px-3 text-sm rounded-lg  ">2</button>
          <button type="button" class="min-h-[38px] min-w-[38px] transition-all  flex justify-center items-center  text-my-light hover:bg-my-light hover:text-my-color py-2 px-3 text-sm rounded-lg  ">3</button>
          <p class="min-h-[38px] min-w-[38px] flex justify-center transition-all  items-center  text-my-light  py-2 px-3 text-sm rounded-lg  ">...</p>

          <button type="button" class="min-h-[38px] min-w-[38px]  transition-all flex justify-center items-center  text-my-light hover:bg-my-light hover:text-my-color py-2 px-3 text-sm rounded-lg  ">8</button>
          <button type="button" class="min-h-[38px] min-w-[38px]  transition-all flex justify-center items-center  text-my-light hover:bg-my-light hover:text-my-color py-2 px-3 text-sm rounded-lg  ">9</button>

          <button type="button" class="min-h-[38px] min-w-[38px] transition-all flex justify-center items-center  text-my-light hover:bg-my-light hover:text-my-color py-2 px-3 text-sm rounded-lg  ">10</button>
        </div>
        <button type="button" class="min-h-[38px] min-w-[38px] py-2 px-2.5 inline-flex jusify-center items-center gap-x-2 text-sm rounded-lg transition-all   text-my-light hover:bg-my-light hover:text-my-color  disabled:opacity-50 disabled:pointer-events-none ">
          <span aria-hidden="true" class="hidden sm:block">Next</span>
          <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m9 18 6-6-6-6"></path>
          </svg>
        </button>
      </nav>
      <!-- End Pagination -->
    </div>
  </div>
</div>