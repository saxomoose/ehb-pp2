<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Behind the scenes') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mx-auto px-4 content-center"> 
                    <section class="py-12 px-4 text-center">
                      <h2 class="text-4xl mb-2 leading-tight font-semibold font-heading">InsuraQuest Team</h2>
                      <img class="w-1/4 mx-auto mb-2 " src="/pictures/ehb.png" alt="">
                      <p class="text-2xl max-w-xl mx-auto font-semibold mb-12 text-gray-400">Programming Project II</p>
                      <div class="flex flex-wrap -mx-8">
                        <div class="md:w-1/3 p-8">
                          <img class="w-1/3 mx-auto mb-4 rounded-full" src="/pictures/olivier.jpg" alt="">
                          <h3 class="text-xl mb-1 font-semibold font-heading">Olivier Thas</h3>
                          <span>Product Owner</span>
                          <p class="mt-4 text-gray-400 leading-relaxed">Student 2Ba TI Werktraject<br>Business IT</p>
                        </div>
                        <div class="md:w-1/3 p-8 md:border-l">
                          <img class="w-1/3 mx-auto mb-4 rounded-full" src="/pictures/bart.jpeg" alt="">
                          <h3 class="text-xl mb-1 font-semibold font-heading">Bart Tassignon</h3>
                          <span>Front-end</span>
                          <p class="mt-4 text-gray-400 leading-relaxed">Student 2Ba TI Werktraject<br>Network & Security</p>
                        </div>
                        <div class="md:w-1/3 p-8 md:border-l">
                          <img class="w-1/3 mx-auto mb-4 rounded-full" src="/pictures/maaike.jpg" alt="">
                          <h3 class="text-xl mb-1 font-semibold font-heading">Maaike Dupont</h3>
                          <span>Front-end</span>
                          <p class="mt-4 text-gray-400 leading-relaxed">Student 2Ba TI Werktraject<br>Software Engineering</p>
                        </div>
                    </section>
                    <section class="py-12 px-4 text-center content-center">
                        <div class="flex flex-wrap -mx-8 justify-center">
                            <div class="md:w-1/3 p-8 ">
                                <img class="w-1/3 mx-auto mb-4 rounded-full" src="/pictures/elias.jpeg" alt="">
                                <h3 class="text-xl mb-1 font-semibold font-heading">Elias Joostens</h3>
                                <span>Back-end</span>
                                <p class="mt-4 text-gray-400 leading-relaxed">Student 2Ba TI Werktraject<br>Software Engineering</p>
                            </div>
                            <div class="md:w-1/3 p-8 md:border-l">
                                <img class="w-1/3 mx-auto mb-4 rounded-full" src="/pictures/mathieu.JPG" alt="">
                                <h3 class="text-xl mb-1 font-semibold font-heading">Mathieu Tulpinck</h3>
                                <span>Back-end</span>
                                <p class="mt-4 text-gray-400 leading-relaxed">Student 2Ba TI Werktraject<br>Software Engineering</p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
