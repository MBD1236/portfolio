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

        <flux:modal.trigger name="ajout-experience">
            <flux:button icon="plus" wire:click='resetForm'>Ajouter une expérience</flux:button>
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
                        Entréprise
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Lieu
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Type expérience
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Date début
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Date fin
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($experiences as $experience)
                <tr
                    class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">

                    <th scope="row" class="px-6 py-2 font-medium text-heading whitespace-nowrap">
                        {{ $experience->title }}
                    </th>
                    <td class="px-6 py-2">
                        {{ $experience->company }}
                    </td>
                    <td class="px-6 py-2">
                        {{ $experience->location }}
                    </td>
                    <td class="px-6 py-2">
                        {{ $experience->experience_type }}
                    </td>
                    <td class="px-6 py-2">
                        @if ($experience->is_current)
                            Terminé
                        @else
                            En cours
                        @endif
                    </td>
                    <td class="px-6 py-2">
                        {{ $experience->start_date }}
                    </td>
                    <td class="px-6 py-2">
                        {{ $experience->end_date }}
                    </td>
                    <td class="px-6 py-2">
                        {{ Str::limit($experience->description, 30) }}
                    </td>

                    <td class="px-6 py-2 flex justify-start gap-1">
                        <flux:modal.trigger name="editer-experience">
                            <flux:button icon="pencil-square" size="sm" wire:click="edit({{ $experience }})" />
                        </flux:modal.trigger>
                        <flux:button icon="trash" size="sm" wire:click="delete({{ $experience->id }})" />
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-4 text-center text-gray-500 dark:text-gray-300">
                        Aucune experience enregistrée.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>





    <flux:modal name="ajout-experience" class="md:w-150" wire:ignore.self>
        <form wire:submit="save" class="space-y-6">
            <div>
                <flux:heading size="lg">Ajouter une expérience</flux:heading>
            </div>
            <flux:input wire:model='title' label="Titre" placeholder="Titre" />
            <flux:input wire:model='company' label="Entréprise" placeholder="Entréprise" />
            <flux:input wire:model='location' label="Lieu" placeholder="Lieu" />
            <flux:input wire:model='experience_type' label="Type d'expérience" placeholder="Type d'expérience" />
            <flux:input type="date" wire:model='start_date' label="Date de début" placeholder="Date de début" />
            <flux:input type="date" wire:model='end_date' label="Date de fin" placeholder="Date de fin" />
            <flux:checkbox wire:model='is_current' label="En cours" placeholder="En cours"/>
            <flux:textarea wire:model='description' label="Description" placeholder="Description" />
            <div class="flex">
                <flux:spacer />
                <flux:button type="submit" variant="primary">Ajouter</flux:button>
            </div>
        </form>
    </flux:modal>
    <flux:modal name="editer-experience" class="md:w-150" wire:ignore.self>
        <form wire:submit="update" class="space-y-6">
            <div>
                <flux:heading size="lg">Editer une expérience</flux:heading>
            </div>
            <flux:input wire:model='title' label="Titre" placeholder="Titre" />
            <flux:input wire:model='company' label="Entréprise" placeholder="Entréprise" />
            <flux:input wire:model='location' label="Lieu" placeholder="Lieu" />
            <flux:input wire:model='experience_type' label="Type d'expérience" placeholder="Type d'expérience" />
            <flux:input type="date" wire:model='start_date' label="Date de début" placeholder="Date de début" />
            <flux:input type="date" wire:model='end_date' label="Date de fin" placeholder="Date de fin" />
            <flux:checkbox wire:model='is_current' label="En cours" placeholder="En cours" />
            <flux:textarea wire:model='description' label="Description" placeholder="Description" />
            <div class="flex">
                <flux:spacer />
                <flux:button type="submit" variant="primary">Editer</flux:button>
            </div>
        </form>
    </flux:modal>
</div>