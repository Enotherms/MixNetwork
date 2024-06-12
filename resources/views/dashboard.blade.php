<x-app-layout>
    <div class="w-full h-full ml-[20.5em] space-y-[2em] font-din">
        <div class="mt-[2em]">                    
            <a href="{{ route('carousel.index') }}" class="hover:bg-FooterBlue hover:text-WhiteCol duration-200 p-[1em] rounded-md">Change Home Carousel</a>
        </div>
        <div>                    
            <a href="{{ route('tags.index') }}" class="hover:bg-FooterBlue hover:text-WhiteCol duration-200 p-[1em] rounded-md">Add tags</a>
        </div>
        <div>                    
            <a href="{{ route('projects.index') }}" class="hover:bg-FooterBlue hover:text-WhiteCol duration-200 p-[1em] rounded-md">Add Projects</a>
        </div>
        <div>                    
            <a href="{{ route('portfolios.index') }}" class="hover:bg-FooterBlue hover:text-WhiteCol duration-200 p-[1em] rounded-md">Add Portfolio</a>
        </div>
        <div>                    
            <a href="{{ route('partners.index') }}" class="hover:bg-FooterBlue hover:text-WhiteCol duration-200 p-[1em] rounded-md">Add partners</a>
        </div>
        <div>                    
            <a href="{{ route('homepage.edit') }}" class="hover:bg-FooterBlue hover:text-WhiteCol duration-200 p-[1em] rounded-md">edit services and about us</a>
        </div>
    </div>
</x-app-layout>