<div class="space-y-6">

    <!-- HEADER + BREADCRUMBS -->
    <div class="flex justify-between items-center pb-2">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">
            Expérience
        </h2>

        <div class="p-3 bg-neutral-secondary-medium border border-default-medium rounded-base">
            <flux:breadcrumbs>
                <flux:breadcrumbs.item href="{{ route('dashboard') }}">
                    Dashboard
                </flux:breadcrumbs.item>
                <flux:breadcrumbs.item>
                    Expérience
                </flux:breadcrumbs.item>
            </flux:breadcrumbs>
        </div>
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


    <div class="flex justify-between items-center">
        <div>
            <flux:input placeholder="Rechercher…" wire:model.live="search" class="w-64" />
        </div>

        <flux:modal.trigger name="ajout-projet">
            <flux:button icon="plus" wire:click='resetForm'>Ajouter un projet</flux:button>
        </flux:modal.trigger>
    </div>



    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
        <table class="w-full text-sm text-left rtl:text-right text-body">
            <thead class="text-sm text-body bg-neutral-secondary-medium border-b border-default-medium">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Titre
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Github url
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Demo url
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Photo
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($projets as $projet)
                <tr
                    class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">

                    <th scope="row" class="px-6 py-2 font-medium text-heading whitespace-nowrap">
                        {{ $projet->title }}
                    </th>
                    <td class="px-6 py-2">
                        {{ Str::limit($projet->description, 30) }}
                    </td>
                    <td class="px-6 py-2">
                        {{ $projet->github_url }}
                    </td>
                    <td class="px-6 py-2">
                        {{ $projet->demo_url }}
                    </td>
                    <td class="px-6 py-2">
                        {{ $projet->status }}
                    </td>
                    <td class="px-6 py-2">
                        <img src="/storage/{{ $projet->thimbnail }}" alt="Photo du projet" class="w-10 h-10 object-cover">
                    </td>

                    <td class="px-6 py-2 flex justify-start gap-1">
                        <flux:modal.trigger name="associer-techno">
                            <flux:button icon="plus" size="sm" wire:click="bindProject({{ $projet }})" />
                        </flux:modal.trigger>
                        <flux:modal.trigger name="editer-projet">
                            <flux:button icon="pencil-square" size="sm" wire:click="edit({{ $projet }})" />
                        </flux:modal.trigger>
                        <flux:button icon="trash" size="sm" wire:click="delete({{ $projet->id }})" />
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-4 text-center text-gray-500 dark:text-gray-300">
                        Aucun projet enregistré.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>





    <flux:modal name="associer-techno" class="md:w-150" wire:ignore.self>
        <form wire:submit="addTechno" class="space-y-6">
            <div>
                <flux:heading size="lg">Associer à une techno</flux:heading>
            </div>
            <flux:input wire:model='project_id' label="Projet" placeholder="Projet" value="{{ $projet->id ?? '' }}" />
            <flux:select wire:model='technology_id' label="Technologie">
                @foreach ($technologies as $technologie)
                <flux:select.option value="0"> Choisir une techno </flux:select.option>
                <flux:select.option wire:key='{{ $technologie->id }}' value="{{ $technologie->id }}"> {{ $technologie->name }} </flux:select.option>
                @endforeach
            </flux:select>
            <div class="flex">
                <flux:spacer />
                <flux:button type="submit" variant="primary">Ajouter</flux:button>
            </div>
        </form>
    </flux:modal>
    <flux:modal name="ajout-projet" class="md:w-150" wire:ignore.self>
        <form wire:submit="save" class="space-y-6">
            <div>
                <flux:heading size="lg">Ajouter un projet</flux:heading>
            </div>
            <flux:input wire:model='title' label="Titre" placeholder="Titre" />
            <flux:textarea wire:model='description' label="Description" placeholder="Description" />
            <flux:input type="file" wire:model='thimbnail' label="Photo" placeholder="Photo" />
            <flux:input wire:model='github_url' label="Github" placeholder="Github" />
            <flux:input wire:model='demo_url' label="Demo url" placeholder="Demo url" />
            <flux:input wire:model='status' label="Status" placeholder="Status" />
            <div class="flex">
                <flux:spacer />
                <flux:button type="submit" variant="primary">Ajouter</flux:button>
            </div>
        </form>
    </flux:modal>
    <flux:modal name="editer-projet" class="md:w-150" wire:ignore.self>
        <form wire:submit="update" class="space-y-6">
            <div>
                <flux:heading size="lg">Editer un projet</flux:heading>
            </div>
            <flux:input wire:model='title' label="Titre" placeholder="Titre" />
            <flux:textarea wire:model='description' label="Description" placeholder="Description" />
            <flux:input type="file" wire:model='thimbnail' label="Photo" placeholder="Photo" />
            <flux:input wire:model='github_url' label="Github" placeholder="Github" />
            <flux:input wire:model='demo_url' label="Demo url" placeholder="Demo url" />
            <flux:input wire:model='status' label="Status" placeholder="Status" />
            <div class="flex">
                <flux:spacer />
                <flux:button type="submit" variant="primary">Editer</flux:button>
            </div>
        </form>
    </flux:modal>
</div>