@extends('layouts.main')

@section('container')
    <h1 class="text-2xl font-bold">About Author</h1>
    <hr class="w-[10rem] mt-2 mb-4" />

    <div class="w-[60rem] bg-[#E2DFD0] dark:bg-[#0C0C0C] shadow-xl rounded-xl h-fit border-2 flex p-5">
        <img class="w-[9rem] h-[9rem] rounded-full object-cover" src="/assets/tama.jpg" alt="Tama">
        <div class="ml-5 flex flex-col mr-6">
            <h1 class="font-semibold text-xl">Atama Cahya El-Firdausy</h1>
            <p class="font-medium text-sm text-gray-500 mb-2">Writter, Author, and Ngabers</p>
            <p class="text-justify">Atama Cahya, a <span class="underline font-bold decoration-sky-500">20-year-old</span>
                avid cyclist and passionate <span class="underline font-bold decoration-sky-500">blogger</span>, has carved
                out a niche in the digital world
                with his engaging content on biking adventures and lifestyle. Born and raised in a bustling city, Atama
                discovered his love for cycling at a young age, finding freedom and exhilaration in the open roads and
                scenic trails. His hobby has since evolved into a lifestyle, influencing much of his daily routine and
                content creation process.</p>
            <p class="mt-2 text-justify">Atama&#39;s blog, a vibrant collection of <span class="underline font-bold decoration-sky-500">personal anecdotes</span>, cycling tips, and gear
                reviews, has garnered a
                loyal following of fellow enthusiasts and readers interested in active living. He combines his knack for
                storytelling with practical advice, making his blog a go-to resource for both novice and experienced
                cyclists. Through detailed posts and <span class="underline font-bold decoration-sky-500">stunning
                    photography</span>, Atama captures the essence of each ride, sharing
                the beauty of the landscapes he traverses and the thrill of the journey.</p>
        </div>
    </div>
@endsection
