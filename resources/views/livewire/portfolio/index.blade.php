<div class="min-h-screen bg-white text-gray-900 dark:bg-slate-900 dark:text-gray-100">

    <!-- Header -->
    <header
        class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 border-b border-gray-200 bg-white/50 backdrop-blur dark:border-gray-800 dark:bg-slate-950/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <div class="flex items-center gap-4">
                    <a href="#" class="text-xl font-semibold text-gray-900 dark:text-indigo-300">MBD</a>
                    <p class="hidden sm:block text-sm text-gray-600 dark:text-gray-400">Développeur web fullstack
                    </p>
                </div>

                <nav class="hidden md:flex items-center space-x-4" aria-label="Main navigation">
                    <a href="#home" data-section="home"
                        class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-300 dark:hover:text-white dark:hover:bg-gray-800/30">Accueil</a>
                    <a href="#about" data-section="about"
                        class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-300 dark:hover:text-white dark:hover:bg-gray-800/30">À
                        propos</a>
                    <a href="#projects" data-section="projects"
                        class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-300 dark:hover:text-white dark:hover:bg-gray-800/30">Projets</a>
                    <a href="#contact" data-section="contact"
                        class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-300 dark:hover:text-white dark:hover:bg-gray-800/30">Contact</a>
                </nav>

                <div class="hidden md:flex items-center gap-4">
                    <flux:radio.group x-data variant="segmented" x-model="$flux.appearance">
                        <flux:radio value="light" icon="sun" />
                        <flux:radio value="dark" icon="moon" />
                        <flux:radio value="system" icon="computer-desktop" />
                    </flux:radio.group>
                </div>

                <div class="flex items-center md:hidden">
                    <button type="button" wire:click="toggleMenu" aria-expanded="{{ $menuOpen ? 'true' : 'false' }}"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-gray-300 dark:hover:bg-gray-800/30">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            @if(!$menuOpen)
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            @else
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                            @endif
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        @if($menuOpen)
        <div class="md:hidden border-t border-gray-200 dark:border-gray-800">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#home" data-section="home"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-300 dark:hover:text-white dark:hover:bg-gray-800/30"
                    onclick="Livewire.emit('closeMobileMenu')">Accueil</a>
                <a href="#about" data-section="about"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-300 dark:hover:text-white dark:hover:bg-gray-800/30"
                    onclick="Livewire.emit('closeMobileMenu')">À propos</a>
                <a href="#projects" data-section="projects"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-300 dark:hover:text-white dark:hover:bg-gray-800/30"
                    onclick="Livewire.emit('closeMobileMenu')">Projets</a>
                <a href="#contact" data-section="contact"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-300 dark:hover:text-white dark:hover:bg-gray-800/30"
                    onclick="Livewire.emit('closeMobileMenu')">Contact</a>
            </div>
            <div class="px-3 py-3 sm:px-3 border-t border-gray-200 dark:border-gray-800">
                <flux:radio.group x-data variant="segmented" x-model="$flux.appearance">
                    <flux:radio value="light" icon="sun" />
                    <flux:radio value="dark" icon="moon" />
                    <flux:radio value="system" icon="computer-desktop" />
                </flux:radio.group>
            </div>
        </div>
        @endif
    </header>

    <!-- Main content -->
    <main class="py-10">
        {{-- HOME --}}
        <section id="home" data-section class="py-24">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div>
                    <h1 class="text-4xl sm:text-5xl font-extrabold leading-tight text-gray-900 dark:text-white">Mamadou
                        Bobo DIALLO</h1>
                    <p class="mt-4 text-lg text-gray-700 dark:text-gray-300 max-w-prose">Passionné par la création
                        d'expériences numériques exceptionnelles, je développe des applications web modernes et
                        performantes avec un souci constant de la qualité et de l'innovation.
                    </p>

                    <div class="mt-8 flex flex-wrap gap-4">
                        <button wire:click.prevent="navigate('projects')"
                            class="inline-flex items-center px-4 py-2 bg-gray-900 hover:bg-gray-800 text-white rounded-md shadow dark:bg-indigo-600 dark:hover:bg-indigo-700">Télécharger mon CV</button>
                        <a href="#contact" data-section="contact"
                            class="inline-flex items-center px-4 py-2 bg-transparent border border-gray-700 text-gray-700 rounded-md hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-800/30">Me
                            contacter</a>
                    </div>
                </div>

                <div class="flex justify-center lg:justify-end">
                    <div
                        class="w-70 h-70 rounded-full from-gray-700 to-gray-500 flex items-center justify-center text-4xl font-bold text-white shadow-xl dark:from-indigo-700 dark:to-sky-500">
                        <img src="{{ asset('images/bobo.png') }}" alt="" class="rounded-full">
                    </div>
                </div>
            </div>
        </section>

        {{-- ABOUT --}}
        <section id="about" data-section class="py-16 bg-gray-50 dark:bg-slate-950/50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-8">
                    <h2 class="text-3xl md:text-4xl mb-4 text-gray-900 dark:text-white">À propos</h2>
                    <p>Je suis développeur full-stack avec une préférence pour les stacks PHP modernes. J'apprécie la
                        simplicité, les interfaces réactives et une UX soignée.</p>
                    <p>Compétences : Laravel, Livewire, Tailwind CSS, JS, tests, déploiement CI/CD.</p>
                </div>
            </div>
        </section>

        {{-- PROJECTS --}}
        <section id="projects" data-section class="py-16 bg-white dark:bg-slate-900">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-8">
                    <h2 class="text-3xl md:text-4xl mb-4 text-gray-900 dark:text-white">Mes Projets</h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">Découvrez une sélection de mes
                        réalisations récentes, alliant innovation technique et design soigné.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                    <!-- Project cards - j'ai harmonisé les couleurs des boutons -->
                    <div
                        class="bg-white border border-gray-200 text-gray-900 flex flex-col gap-6 rounded-xl group overflow-hidden hover:shadow-lg transition-all duration-300 dark:bg-slate-800 dark:border-gray-700 dark:text-gray-100">
                        <div class="aspect-video overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1657812159075-7f0abd98f7b8?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxlLWNvbW1lcmNlJTIwd2Vic2l0ZXxlbnwxfHx8fDE3NTczOTg2NDJ8MA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral"
                                alt="Site E-commerce"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="px-6 pt-6">
                            <h4 class="text-xl font-semibold text-gray-900 dark:text-white">Site E-commerce</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-base mt-2">Plateforme de vente en ligne
                                moderne avec panier, paiement et gestion des commandes.</p>
                        </div>
                        <div class="px-6">
                            <div class="flex flex-wrap gap-2">
                                <span
                                    class="inline-flex items-center rounded-md bg-gray-100 px-2 py-1 text-xs font-medium text-gray-800 dark:bg-gray-700 dark:text-gray-200">React</span>
                                <span
                                    class="inline-flex items-center rounded-md bg-gray-100 px-2 py-1 text-xs font-medium text-gray-800 dark:bg-gray-700 dark:text-gray-200">Node.js</span>
                                <span
                                    class="inline-flex items-center rounded-md bg-gray-100 px-2 py-1 text-xs font-medium text-gray-800 dark:bg-gray-700 dark:text-gray-200">MongoDB</span>
                            </div>
                        </div>
                        <div class="px-6 pb-6 flex gap-2">
                            <a href="#" target="_blank" rel="noopener noreferrer"
                                class="inline-flex items-center justify-center px-3 py-2 text-sm font-medium border border-gray-300 bg-white text-gray-700 rounded-md hover:bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-600 flex-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="mr-2">
                                    <path
                                        d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4">
                                    </path>
                                    <path d="M9 18c-4.51 2-5-2-7-2"></path>
                                </svg>
                                Code
                            </a>
                            <a href="#" target="_blank" rel="noopener noreferrer"
                                class="inline-flex items-center justify-center px-3 py-2 text-sm font-medium bg-gray-900 text-white rounded-md hover:bg-gray-800 dark:bg-indigo-600 dark:hover:bg-indigo-700 flex-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="mr-2">
                                    <path d="M15 3h6v6"></path>
                                    <path d="M10 14 21 3"></path>
                                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                                </svg>
                                Demo
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        {{-- SKILLS --}}
        <section id="skills" class="py-24 bg-white dark:bg-slate-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-8">
                    <h2 class="text-3xl md:text-4xl mb-4 text-gray-900 dark:text-white">Compétences</h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">Voici un aperçu des compétences que j'utilise
                        régulièrement dans mes projets.</p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Skill item -->
                    <div class="p-4 bg-white border border-gray-200 rounded-lg dark:bg-slate-800 dark:border-gray-700">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Laravel</h3>
                                <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">Développement d'APIs,
                                    architecture MVC, Eloquent, queues et tests.</p>
                            </div>
                            <div class="text-sm font-medium text-gray-700 dark:text-gray-200">90%</div>
                        </div>
                        <div class="mt-3 h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-gray-700">
                            <div class="h-2 bg-gray-800 dark:bg-indigo-500" style="width:90%"></div>
                        </div>
                    </div>
                    <!-- Répétez pour les autres compétences -->
                </div>
            </div>
        </section>

        {{-- EXPERIENCE --}}
        <section id="experience" class="py-16 px-6 bg-gray-50 dark:bg-slate-950">
            <div class="max-w-7xl mx-auto">
                <div class="mb-20">
                    <div class="text-center mb-8">
                        <h3 class="text-3xl md:text-4xl mb-4 text-gray-900 dark:text-white">Certifications</h3>
                    </div>
                    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div
                            class="p-6 rounded-xl text-center transition-all hover:-translate-y-1 bg-white border border-gray-200 hover:shadow-xl dark:bg-slate-900 dark:border-gray-800">
                            <h4 class="font-bold mb-2 text-gray-900 dark:text-white">Meta Frontend Developer</h4>
                            <p class="text-gray-700 dark:text-indigo-500 text-sm font-medium mb-1">Coursera</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">2025</p>
                        </div>
                        <div
                            class="p-6 rounded-xl text-center transition-all hover:-translate-y-1 bg-white border border-gray-200 hover:shadow-xl dark:bg-slate-900 dark:border-gray-800">
                            <h4 class="font-bold mb-2 text-gray-900 dark:text-white">Meta Backend Developer</h4>
                            <p class="text-gray-700 dark:text-indigo-500 text-sm font-medium mb-1">Coursera</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">2025</p>
                        </div>
                        <div
                            class="p-6 rounded-xl text-center transition-all hover:-translate-y-1 bg-white border border-gray-200 hover:shadow-xl dark:bg-slate-900 dark:border-gray-800">
                            <h4 class="font-bold mb-2 text-gray-900 dark:text-white">Google Cybersecurity</h4>
                            <p class="text-gray-700 dark:text-indigo-500 text-sm font-medium mb-1">Coursera</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">2025</p>
                        </div>
                        <div
                            class="p-6 rounded-xl text-center transition-all hover:-translate-y-1 bg-white border border-gray-200 hover:shadow-xl dark:bg-slate-900 dark:border-gray-800">
                            <h4 class="font-bold mb-2 text-gray-900 dark:text-white">Hashgraph Developer Course</h4>
                            <p class="text-gray-700 dark:text-indigo-500 text-sm font-medium mb-1">Hedera</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">2025</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- CONTACT --}}
        <section id="contact" data-section class="py-16 bg-white dark:bg-slate-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">Contact</h2>
                <div
                    class="bg-white border border-gray-200 rounded-lg p-6 max-w-7xl dark:bg-slate-800 dark:border-gray-700">
                    @if(session('contact_sent'))
                    <div
                        class="mb-4 p-3 rounded-md bg-green-100 border border-green-200 text-green-800 dark:bg-emerald-600/20 dark:border-emerald-700 dark:text-emerald-200">
                        {{ session('contact_sent') }}
                    </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <form wire:submit.prevent="sendContact">
                                <div class="grid grid-cols-1 gap-4">
                                    <label class="flex flex-col">
                                        <span class="text-sm text-gray-700 dark:text-gray-300">Votre nom</span>
                                        <input wire:model.defer="contact_name" type="text"
                                            class="mt-1 p-2 rounded-md bg-white border border-gray-300 text-gray-900 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-200"
                                            placeholder="Nom" />
                                        @error('contact_name') <span
                                            class="text-xs text-red-600 dark:text-rose-400 mt-1">{{ $message }}</span>
                                        @enderror
                                    </label>

                                    <label class="flex flex-col">
                                        <span class="text-sm text-gray-700 dark:text-gray-300">Email</span>
                                        <input wire:model.defer="contact_email" type="email"
                                            class="mt-1 p-2 rounded-md bg-white border border-gray-300 text-gray-900 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-200"
                                            placeholder="email@exemple.com" />
                                        @error('contact_email') <span
                                            class="text-xs text-red-600 dark:text-rose-400 mt-1">{{ $message }}</span>
                                        @enderror
                                    </label>

                                    <label class="flex flex-col">
                                        <span class="text-sm text-gray-700 dark:text-gray-300">Message</span>
                                        <textarea wire:model.defer="contact_message"
                                            class="mt-1 p-2 rounded-md bg-white border border-gray-300 text-gray-900 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-200"
                                            rows="5" placeholder="Votre message"></textarea>
                                        @error('contact_message') <span
                                            class="text-xs text-red-600 dark:text-rose-400 mt-1">{{ $message }}</span>
                                        @enderror
                                    </label>

                                    <div class="flex items-center gap-3">
                                        <button type="submit"
                                            class="inline-flex items-center px-4 py-2 bg-gray-900 hover:bg-gray-800 text-white rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700">Envoyer</button>
                                        <button type="button" wire:click.prevent="resetContact"
                                            class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">Effacer</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="space-y-4">
                            <div
                                class="p-4 bg-gray-50 border border-gray-200 rounded-lg dark:bg-slate-900 dark:border-gray-700">
                                <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Réseaux sociaux</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">Vous pouvez aussi me joindre
                                    directement via les informations suivantes :</p>
                                <ul class="mt-3 space-y-4 text-sm text-gray-700 dark:text-gray-300">
                                    <li class="flex items-center gap-3">
                                        <flux:icon.envelope />
                                        <a href="mailto:mbd@example.com"
                                            class="text-gray-900 hover:text-gray-700 dark:text-indigo-400 dark:hover:text-indigo-300">bobobonkon25@gmail.com</a>
                                    </li>
                                    <li class="flex items-center gap-3">
                                        <flux:icon.phone />
                                        <a href="tel:+33123456789"
                                            class="text-gray-900 hover:text-gray-700 dark:text-indigo-400 dark:hover:text-indigo-300">+224
                                            625 08 11 46</a>
                                    </li>
                                    <li class="flex items-center gap-3">
                                        <flux:icon.linkedin />
                                        <a href="https://www.linkedin.com/in/mamadou-bobo-diallo-5a04a3310/"
                                            class="text-gray-900 hover:text-gray-700 dark:text-indigo-400 dark:hover:text-indigo-300">https://www.linkedin.com/in/mamadou-bobo-diallo-5a04a3310/</a>
                                    </li>
                                    <li class="flex items-center gap-3">
                                        <flux:icon.github />
                                        <a href="https://github.com/MBD1236"
                                            class="text-gray-900 hover:text-gray-700 dark:text-indigo-400 dark:hover:text-indigo-300">https://github.com/MBD1236</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    {{-- FOOTER --}}
    <footer class="relative pt-16 pb-8 px-6 bg-gray-50 border-t border-gray-200 dark:bg-slate-950 dark:border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-12 mb-12">
                <div>
                    <h3 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">Mamadou Bobo DIALLO</h3>
                    <p class="text-sm leading-relaxed mb-6 text-gray-600 dark:text-gray-400">Développeur Front-End &
                        Mobile passionné par la création de solutions numériques innovantes et utiles.</p>
                </div>
                <!-- Reste du footer -->
                <div>
                    <h4 class="text-lg font-bold mb-4 text-gray-900 dark:text-white">Navigation</h4>
                    <ul class="space-y-3">
                        <li><a href="#home"
                                class="text-sm transition-colors hover:text-indigo-500 text-gray-600">Accueil</a>
                        </li>
                        <li><a href="#about" class="text-sm transition-colors hover:text-indigo-500 text-gray-600">À
                                propos</a></li>
                        <li><a href="#projects"
                                class="text-sm transition-colors hover:text-indigo-500 text-gray-600">Projets</a>
                        </li>
                        <li><a href="#contact"
                                class="text-sm transition-colors hover:text-indigo-500 text-gray-600">Contact</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-4 text-gray-900 dark:text-white">Me suivre</h4>
                    <div class="flex gap-3"><a href="https://github.com/MBD1236" target="_blank"
                            rel="noopener noreferrer" aria-label="GitHub"
                            class="p-3 rounded-xl transition-all duration-300 hover:-translate-y-1 bg-slate-800 text-gray-200 hover:bg-slate-700 hover:text-white"><svg
                                xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-github ">
                                <path
                                    d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4">
                                </path>
                                <path d="M9 18c-4.51 2-5-2-7-2"></path>
                            </svg></a><a href="https://linkedin.com/in/foula-fofana-1769782a5" target="_blank"
                            rel="noopener noreferrer" aria-label="LinkedIn"
                            class="p-3 rounded-xl transition-all duration-300 hover:-translate-y-1 bg-slate-800 text-gray-400 hover:bg-slate-700 hover:text-white"><svg
                                xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-linkedin ">
                                <path
                                    d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z">
                                </path>
                                <rect width="4" height="12" x="2" y="9"></rect>
                                <circle cx="4" cy="4" r="2"></circle>
                            </svg></a><a href="mailto:fofanafoula70@gmail.com" aria-label="Email"
                            class="p-3 rounded-xl transition-all duration-300 hover:-translate-y-1 bg-slate-800 text-gray-400 hover:bg-slate-700 hover:text-white"><svg
                                xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-mail ">
                                <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                            </svg></a></div>
                </div>
            </div>
            <div class="h-px mb-8 bg-slate-800"></div>
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <p class="text-sm text-gray-600">© {{ date('Y') }} MBD — Tous droits réservés</p>
                <p class="text-sm text-gray-600">Développé avec <span
                        class="text-gray-700 dark:text-indigo-500 font-semibold">Livewire</span> &amp; <span
                        class="text-gray-700 dark:text-indigo-500 font-semibold">Tailwind CSS</span></p>
            </div>
        </div>
    </footer>

   <script>
        try {
            document.documentElement.style.scrollBehavior = 'smooth';

            const navLinks = document.querySelectorAll('a[data-section]');
            const sections = document.querySelectorAll('section[data-section]');

            const activateLink = (id) => {
                navLinks.forEach(a => {
                    if (a.getAttribute('href') === `#${id}`) {
                        a.classList.add('text-indigo-300', 'bg-indigo-900/20');
                    } else {
                        a.classList.remove('text-indigo-300', 'bg-indigo-900/20');
                    }
                });
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        activateLink(entry.target.id);
                    }
                });
            }, { root: null, threshold: 0.5 });

            sections.forEach(s => observer.observe(s));

            // Close mobile menu when clicking an anchor (for non-Livewire clicks)
            navLinks.forEach(a => a.addEventListener('click', () => {
                if (window.Livewire) Livewire.emit('closeMobileMenu');
            }));


        } catch (e) {
            // silent fallback
            console.warn('One-page script failed', e);
        }
    </script>
</div>








