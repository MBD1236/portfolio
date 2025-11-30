<div class="space-y-6">

    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-semibold">À propos</h2>
        </div>

        <flux:breadcrumbs
            class="p-3 bg-zinc-100 dark:bg-zinc-800 rounded-lg border border-zinc-300 dark:border-zinc-700">
            <flux:breadcrumbs.item href="{{ route('dashboard') }}">Accueil</flux:breadcrumbs.item>
            <flux:breadcrumbs.item>À propos</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>


    @if(session()->has('success'))
    <div class="flex justify-center">
        <div id="toast-success"
            class="flex items-center w-full max-w-sm p-4 text-body bg-neutral-primary-soft rounded-base shadow-xs border border-default"
            role="alert">
            <div
                class="inline-flex items-center justify-center shrink-0 w-7 h-7 text-fg-success bg-success-soft rounded">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 11.917 9.724 16.5 19 7.5" />
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
            <button type="button"
                class="ms-auto flex items-center justify-center text-body hover:text-heading bg-transparent box-border border border-transparent hover:bg-neutral-secondary-medium focus:ring-4 focus:ring-neutral-tertiary font-medium leading-5 rounded text-sm h-8 w-8 focus:outline-none"
                data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18 17.94 6M18 18 6.06 6" />
                </svg>
            </button>
        </div>
    </div>
    @endif
    @if (session()->has('danger'))
    <div class="flex justify-center">
        <div id="toast-danger"
            class="flex items-center w-full max-w-sm p-4 text-body bg-neutral-primary-soft rounded-base shadow-xs border border-default"
            role="alert">
            <div class="inline-flex items-center justify-center shrink-0 w-7 h-7 text-fg-danger bg-danger-soft rounded">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18 17.94 6M18 18 6.06 6" />
                </svg>
                <span class="sr-only">Error icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ session('danger') }}</div>
            <button type="button"
                class="ms-auto flex items-center justify-center text-body hover:text-heading bg-transparent box-border border border-transparent hover:bg-neutral-secondary-medium focus:ring-4 focus:ring-neutral-tertiary font-medium leading-5 rounded text-sm h-8 w-8 focus:outline-none"
                data-dismiss-target="#toast-danger" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18 17.94 6M18 18 6.06 6" />
                </svg>
            </button>
        </div>

    </div>
    @endif

    <div class="flex justify-end gap-2">
        <flux:modal.trigger name="ajout-info">
            <flux:button icon="plus" wire:click='resetForm' size="sm">Ajouter</flux:button>
        </flux:modal.trigger>
    </div>

    @foreach ($abouts as $about)
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">


        @if ($about->profile_image) 
        <!-- Photo -->
        <div class="">
            <img src="/storage/{{ $about->profile_image }}"
                class="w-40 h-40 rounded-xl shadow-sm object-cover border border-zinc-300 dark:border-zinc-700">
        </div>
        @endif

        <!-- Information -->
        <div class="md:col-span-2 bg-white dark:bg-zinc-900 p-6 rounded-xl border border-zinc-200 dark:border-zinc-700">

            <div class="flex justify-between items-center mb-4 gap-1">
                <h3 class="text-xl font-semibold">Informations personnelles</h3>
                <flux:modal.trigger name="editer-info">
                    <flux:button icon="pencil-square" wire:click='edit({{ $about }})' size="sm">Modifier</flux:button>
                </flux:modal.trigger>
            </div>

            <div class="space-y-3 text-zinc-700 dark:text-zinc-300">
                
            
                <p><strong>Nom :</strong> {{ $about->name ?? '—' }}</p>
                <p><strong>Titre :</strong> {{ $about->title ?? '—' }}</p>

                <p class="flex gap-2 items-start">
                    <strong>Bio :</strong>
                    <span class="text-zinc-600 dark:text-zinc-400">
                        {{ $about->bio ?? 'Aucune biographie enregistrée.' }}
                    </span>
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-3">

                    <div>
                        <strong>Email :</strong>
                        <p class="text-sm text-zinc-600">{{ $about->email ?? '—' }}</p>
                    </div>

                    <div>
                        <strong>Téléphone :</strong>
                        <p class="text-sm text-zinc-600">{{ $about->phone ?? '—' }}</p>
                    </div>

                    <div>
                        <strong>Localisation :</strong>
                        <p class="text-sm text-zinc-600">{{ $about->location ?? '—' }}</p>
                    </div>

                    <div>
                        <strong>CV :</strong>
                        @if($about?->cv_file)
                        <a href="/storage/{{ $about->cv_file }}" target="_blank"
                            class="text-primary underline text-sm">
                            Voir le CV
                        </a>
                        @else
                        <span class="text-sm text-zinc-500">Aucun fichier</span>
                        @endif
                    </div>

                </div>

                <div class="pt-4 border-t border-zinc-200 dark:border-zinc-700 mt-4">
                    <h4 class="font-medium mb-3">Réseaux sociaux</h4>

                    <div class="space-y-2 text-sm text-zinc-600 dark:text-zinc-400">

                        <p><strong>GitHub :</strong> {{ $about->github_url ?? '—' }}</p>
                        <p><strong>LinkedIn :</strong> {{ $about->linkedin_url ?? '—' }}</p>
                        <p><strong>Facebook :</strong> {{ $about->facebook_url ?? '—' }}</p>

                    </div>
                </div>
                
            </div>
        </div>
    </div>
    @endforeach


    <flux:modal name="ajout-info" class="md:w-150" wire:ignore.self>
        <form wire:submit="save" class="space-y-6">
            <div>
                <flux:heading size="lg">Ajouter une information</flux:heading>
            </div>
            <flux:input wire:model='name' label="Nom" placeholder="Nom" />
            <flux:input wire:model='title' label="Titre" placeholder="Titre" />
            <flux:input wire:model='bio' label="Biographie" placeholder="Biographie" />
            <flux:input wire:model='location' label="Lieu" placeholder="Lieu" />
            <flux:input type="email" wire:model='email' label="Email" placeholder="Email" />
            <flux:input wire:model='phone' label="Téléphone" placeholder="Téléphone" />
            <flux:input wire:model='github_url' label="Github" placeholder="Github" />
            <flux:input wire:model='facebook_url' label="Facebook" placeholder="Facebook" />
            <flux:input wire:model='linkedin_url' label="Linkedin" placeholder="Linkedin" />
            <flux:input type="file" wire:model='profile_image' label="Photo" placeholder="Photo" />
            <flux:input type="file" wire:model='cv_file' label="CV" placeholder="CV" />
            <div class="flex">
                <flux:spacer />
                <flux:button type="submit" variant="primary">Ajouter</flux:button>
            </div>
        </form>
    </flux:modal>
    <flux:modal name="editer-info" class="md:w-150" wire:ignore.self>
        <form wire:submit="update" class="space-y-6">
            <div>
                <flux:heading size="lg">Editer une information</flux:heading>
            </div>
            <flux:input wire:model='name' label="Nom" placeholder="Nom" />
            <flux:input wire:model='title' label="Titre" placeholder="Titre" />
            <flux:input wire:model='bio' label="Biographie" placeholder="Biographie" />
            <flux:input wire:model='location' label="Lieu" placeholder="Lieu" />
            <flux:input type="email" wire:model='email' label="Email" placeholder="Email" />
            <flux:input wire:model='phone' label="Téléphone" placeholder="Téléphone" />
            <flux:input wire:model='github_url' label="Github" placeholder="Github" />
            <flux:input wire:model='facebook_url' label="Facebook" placeholder="Facebook" />
            <flux:input wire:model='linkedin_url' label="Linkedin" placeholder="Linkedin" />
            <flux:input type="file" wire:model='profile_image' label="Photo" placeholder="Photo" />
            <flux:input type="file" wire:model='cv_file' label="CV" placeholder="CV" />
            <div class="flex">
                <flux:spacer />
                <flux:button type="submit" variant="primary">Editer</flux:button>
            </div>
        </form>
    </flux:modal>
</div>