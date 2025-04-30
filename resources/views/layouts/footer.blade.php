<!-- resources/views/components/footer.blade.php -->
<footer id="contacte" class="mt-16 rounded-2xl bg-slate-500  m-2 sm:m-10 flex flex-col items-center text-light" data-aos="fade-up"
data-aos-anchor-placement="top-bottom">
    <h3 class="mt-16 font-medium text-center capitalize text-2xl sm:text-3xl lg:text-4xl px-4">
        Histoires intéressantes | Mises à jour | Guides
    </h3>
    <p class="mt-5 px-4 text-center w-full sm:w-3/5 font-light text-sm sm:text-base">
        Abonnez-vous pour en savoir plus sur les nouvelles technologies et les mises à jour.
    </p>

    <form method="POST" action=""
          class="mt-6 w-fit sm:min-w-[384px] flex items-stretch bg-light p-1 sm:p-2 rounded mx04">
        @csrf
        <input
            type="email"
            name="email"
            placeholder="Enter your email"
            class="w-full text bg-transparent pl-2 sm:pl-0 focus:border-black focus:ring-0 border-0 border-b mr-2 pb-1"
            required maxlength="80"
        />

        <input
            type="submit"
            class="bg-dark text-light cursor-pointer font-medium rounded px-3 sm:px-5 py-1"
        />
    </form>
    <div class="flex items-center mt-8">
        <a href="" class="inline-block w-6 h-6 mr-4" aria-label="Reach out to me via LinkedIn" target="_blank" rel="noopener noreferrer">
            {{-- <x-linkedin-icon class="hover:scale-125 transition-all ease duration-200" /> --}}
        </a>
        <a href="" class="inline-block w-6 h-6 mr-4" aria-label="Reach out to me via Twitter" target="_blank" rel="noopener noreferrer">
            {{-- <x-twitter-icon class="hover:scale-125 transition-all ease duration-200" /> --}}
        </a>
        <a href="" class="inline-block w-6 h-6 mr-4 fill-light" aria-label="Check my profile on Github" target="_blank" rel="noopener noreferrer">
            {{-- <x-github-icon class="fill-light hover:scale-125 transition-all ease duration-200" /> --}}
        </a>
        <a href="" class="inline-block w-6 h-6 mr-4" aria-label="Check my profile on Dribbble" target="_blank" rel="noopener noreferrer">
            {{-- <x-dribbble-icon class="hover:scale-125 transition-all ease duration-200" /> --}}
        </a>
    </div>

    <div class="w-full mt-16 md:mt-24 relative font-medium border-t border-solid border-light py-6 px-8 flex flex-col md:flex-row items-center justify-between">
        <span class="text-center">
            &copy;2024 ICODE. Tous droits réservés.
        </span>
        <a href="/sitemap.xml" class="text-center underline my-4 md:my-0">ICODE</a>
        <div class="text-center">
            Fabriqué par <a href="https://devdreaming.com" class="underline" target="_blank">Andy</a>
        </div>
    </div>
</footer>
