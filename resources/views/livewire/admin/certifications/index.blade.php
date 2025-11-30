<div class="space-y-6">

    <!-- HEADER + BREADCRUMBS -->
    <div class="flex justify-between items-center pb-2">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">
            Certification
        </h2>

        <div class="p-3 bg-neutral-secondary-medium border border-default-medium rounded-base">
            <flux:breadcrumbs>
                <flux:breadcrumbs.item href="{{ route('dashboard') }}">
                    Dashboard
                </flux:breadcrumbs.item>
                <flux:breadcrumbs.item>
                    Certification
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

        <flux:modal.trigger name="ajout-certification">
            <flux:button icon="plus" wire:click='resetForm'>Ajouter une certification</flux:button>
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
                        Institution
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Date
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Url Certification
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Fichier
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($certifications as $certification)
                <tr
                    class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">

                    <th scope="row" class="px-6 py-2 font-medium text-heading whitespace-nowrap">
                        {{ $certification->title }}
                    </th>
                    <td class="px-6 py-2">
                        {{ $certification->institution }}
                    </td>
                    <td class="px-6 py-2">
                        {{ $certification->date_obtained }}
                    </td>
                    <td class="px-6 py-2">
                        {{ $certification->credential_url }}
                    </td>
                    <td class="px-6 py-2">
                        <a href="/storage/{{ $certification->file_path }}" target="_blank"
                            class="text-primary underline text-sm">
                            Voir le Certificat
                        </a>
                    </td>

                    <td class="px-6 py-2 flex justify-start gap-1">
                        <flux:modal.trigger name="editer-certification">
                            <flux:button icon="pencil-square" size="sm" wire:click="edit({{ $certification }})" />
                        </flux:modal.trigger>
                        <flux:button icon="trash" size="sm" wire:click="delete({{ $certification->id }})" />
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-4 text-center text-gray-500 dark:text-gray-300">
                        Aucune certification enregistrée.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>





    <flux:modal name="ajout-certification" class="md:w-150" wire:ignore.self>
        <form wire:submit="save" class="space-y-6">
            <div>
                <flux:heading size="lg">Ajouter une certification</flux:heading>
            </div>
            <flux:input wire:model='title' label="Titre" placeholder="Titre" />
            <flux:textarea wire:model='institution' label="Institution" placeholder="Institution" />
            <flux:input wire:model='credential_url' label="Url Certification" placeholder="Certification url" />
            <flux:input type="date" wire:model='date_obtained' label="Date d'obtention" placeholder="Date d'obtention" />
            <flux:input type="file" wire:model='file_path' label="Fichier du certificat" placeholder="Fichier" />
            <div class="flex">
                <flux:spacer />
                <flux:button type="submit" variant="primary">Ajouter</flux:button>
            </div>
        </form>
    </flux:modal>
    <flux:modal name="editer-certification" class="md:w-150" wire:ignore.self>
        <form wire:submit="update" class="space-y-6">
            <div>
                <flux:heading size="lg">Editer une certification</flux:heading>
            </div>
            <flux:input wire:model='title' label="Titre" placeholder="Titre" />
            <flux:textarea wire:model='institution' label="Institution" placeholder="Institution" />
            <flux:input wire:model='credential_url' label="Url Certification" placeholder="Certification url" />
            <flux:input type="date" wire:model='date_obtained' label="Date d'obtention" placeholder="Date d'obtention" />
            <flux:input type="file" wire:model='file_path' label="Fichier du certificat" placeholder="Fichier" />
            <div class="flex">
                <flux:spacer />
                <flux:button type="submit" variant="primary">Editer</flux:button>
            </div>
        </form>
    </flux:modal>
</div>